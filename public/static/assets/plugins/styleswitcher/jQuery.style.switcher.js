// Theme color settings


$(document).ready(function(){


    $("*[data-theme]").click(function(e){
      e.preventDefault();
        var currentStyle = $(this).attr('data-theme');
        var theme_path = '/static/css/colors/'+currentStyle+'.css';
        $('#theme').attr({href:theme_path});

        //存库
        $.ajax({
            url:"/index/system/ajax_setting_save",
            method:'post',
            data:{system_theme:theme_path},
            success:function () {

            },
            dataType:'json'
        });

    });


    // color selector
    $('#themecolors').on('click', 'a', function(){

            $('#themecolors li a').removeClass('working');

            $(this).addClass('working');
          });
    });
