
!function($) {
    "use strict";
    var CalendarApp = function() {
        this.$body = $('body'),
        this.$calendar = $('#calendar'),
        this.$event = ('#calendar-events div.calendar-events'),
        this.$categoryForm = $('#add-new-event form'),
        this.$extEvents = $('#calendar-events'),
        this.$modal = $('#my-event'),
        this.$saveCategoryBtn = $('.save-category'),
        this.$calendarObj = null
    };

    /* on drop */
    CalendarApp.prototype.onDrop = function (eventObj, date) {
        var $this = this;
            // retrieve the dropped element's stored Event Object
            var originalEventObject = eventObj.data('eventObject');
            var $categoryClass = eventObj.attr('data-class');
            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);
            // assign it the date that was reported
            copiedEventObject.start = date;
            if ($categoryClass)
                copiedEventObject['className'] = [$categoryClass];
            // render the event on the calendar
            $this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
                // if so, remove the element from the "Draggable Events" list
                eventObj.remove();
            }
    },
    /* on click on event */
    CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {
        if(confirm('你确定要查看'+calEvent.title+'详情？')){
            window.location.href= '/index/task/task_des.html?id='+calEvent.task_id;
        }
    },
    /* on select */
    CalendarApp.prototype.onSelect = function (start, end, allDay) {
        start = start/1000;
        end = end/1000;
        layer.open({
            type: 2,
            title: '任务列表',
            shadeClose: true,
            shade: 0.8,
            area: ['80%', '90%'],
            content: 'get_start_task?start='+start
        });
    },

    CalendarApp.prototype.enableDrag = function() {
        //init events
        $(this.$event).each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });
    }




    /* Initializing */
    CalendarApp.prototype.init = function(defaultEvents) {
        this.enableDrag();
        /*  Initialize the calendar  */
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        var today = new Date($.now());

        var $this = this;
        $this.$calendarObj = $this.$calendar.fullCalendar({
            slotDuration: '00:15:00', /* If we want to split day time each 15minutes */
            minTime: '00:00:00',
            maxTime: '24:00:00',
            defaultView: 'month',
            handleWindowResize: true,

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: defaultEvents,
            editable: false,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            eventLimit: true, // allow "more" link when too many events
            selectable: true,
            drop: function(date) { $this.onDrop($(this), date); },
            select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },
            eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }

        });

        //on new event
        this.$saveCategoryBtn.on('click', function(){
            var categoryName = $this.$categoryForm.find("input[name='category-name']").val();
            var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();
            if (categoryName !== null && categoryName.length != 0) {
                $this.$extEvents.append('<div class="calendar-events bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')
                $this.enableDrag();
            }

        });

    },

   //init CalendarApp
    $.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp

}(window.jQuery),

//initializing CalendarApp
function($) {
    "use strict";
    $.ajax({
        url: "ajax_calendar_task",
        data: "",
        method:"post",
        success:function(data){
            var defaultEvents=[] ;
            $.each(data,function(i,v){
                var task_start=timestampToTime(v.task_start);
                var task_end=timestampToTime(v.task_end);
                defaultEvents[i] = {
                                task_id: v.id,
                                project_name: v.project_name,
                                create_name: v.create_name,
                                to_name: v.to_name,
                                title: v.task_name,
                                start: new Date(task_start),
                                end:  new Date(task_end),
                                className: task_class_sort(v.task_order)
                };
            });
            $.CalendarApp.init(defaultEvents)
        }
    });

}(window.jQuery);

function timestampToTime(timestamp) {
    var date = new Date(timestamp * 1000);//时间戳为10位需*1000，时间戳为13位的话不需乘1000
    var Y = date.getFullYear() + '-';
    var M = (date.getMonth()+1 < 10 ? '0'+(date.getMonth()+1) : date.getMonth()+1) + '-';
    var D = date.getDate() + ' ';
    var h = date.getHours() + ':';
    var m = date.getMinutes() + ':';
    var s = date.getSeconds();
    return Y+M+D+h+m+s;
}

function task_class_sort(sort){
    var class_array = new Array();
        class_array[1] = 'bg-danger';
        class_array[2] = 'bg-warning';
        class_array[3] = 'bg-primary';
        class_array[4] = 'bg-info';
        class_array[5] = 'bg-success';
        class_array[6] = 'bg-purple';
        class_array[7] = 'bg-pink';
        class_array[8] = 'bg-primary';
        class_array[9] = 'bg-info ';
        class_array[10] = 'bg-success';
        class_array[0] = 'bg-purple';
        return class_array[sort];
}