<?php


    //用于打印整个日历
    function __toString($url,$year=null,$month=null,$uid){
        $year =  $year ? $year : date("Y"); //如果用户没有设置所份数，则使用当前系统时间的年份
        $month = $month ? $month : date("m");  //如果用户没有设置月份数，则使用当前系统时间的月份
        $start_weekday = date("w",mktime(0,0,0,$month,1,$year));//通过具体的年份和月份，利用date()函数的w参数获取当月第一天对应的是周几
        $days = date("t",mktime(0,0,0,$month,1,$year)); //通过具体的年份和月份，利用date()函数的t参数获取当月的天数
        $out='';
        $out .='<table align="center">';
        $out .=chageDate($url,$year,$month);        //用户自己设置日期
        $out .=weeksList();        //调用内部私有方法打印周列表
        $result = daysList($start_weekday,$days,$year,$month,$uid); //调用内部私有方法打印日列表
        $out .=$result['out'];
        $out .='</table>';
        $list['out'] = $out;
        $list['tasks'] = $result['tasks'];
        return $list;          //返回整个日历输需要的全部字符串
    }

    //内部调用的私有方法，用于输出周列表
     function weeksList(){
        $week = array('日','一','二','三','四','五','六');
        $out = '';
        $out .= '<tr>';
        for ($i = 0; $i<count($week); $i++)
            $out .= '<th class="fontb">'.$week[$i].'</th>';         //第一行以表格<th>输出周列表
        $out .= '</tr>';
        return $out;          //返回周列表字符串
    }

    //内部调用的私有方法，用于输出周列表
   function daysList($start_weekday,$days,$year,$month,$uid){
        $out = '';
        $out .= '<tr>';
        //输出空格（当前一月第一天前面要空出来）
        for ($j = 0; $j<$start_weekday; $j++)
            $out .= '<td> </td>';
        //将当月的所有日期循环遍历出来，如果是当前日期，为其设置深色背景
        for ($k = 1; $k<=$days; $k++){
            $j++;
            //获取任务$year,$month，$k
            $time = $year.'-'.$month.'-'.$k;
            $tasks[$time] = model('task','logic')->get_task_by_day_and_uid($time,$uid);
            if(count( $tasks[$time])){
                if ($k == date('d')){
                    $out .= '<td class="today" ><a class="show_task" href="javascript:void();" id="'.$time.'">'.$k.'*</a></td>';
                }else {
                    $out .='<td><a class="show_task" href="javascript:void();" id="'.$time.'">'.$k.'*</a></td>';
                }
            }
            else{
                if ($k == date('d')){
                    $out .= '<td class="today"><a class="show_task" href="javascript:void();" id="'.$time.'">'.$k.'</a></td>';
                }else {
                    $out .='<td><a class="show_task" href="javascript:void();" id="'.$time.'">'.$k.'</a></td>';
                }
            }


            if ($j%7 == 0)                   //每输出7个日期，就换一行
                $out .= '</tr><tr>';        //输出行结束和下一行开始
        }

        //遍历完日期后，将后面用空格补齐
        while ($j%7 !== 0){
            $out .= '<td> </td>';
            $j++;
        }

        $out .= '</tr>';
        $result['out'] = $out;
        $result['tasks'] = $tasks;
        return $result;                      //返回当月日期列表
    }

    //内部调用的私有方法，用于处理当前年份的上一年需要的数据
    function prevYear($year,$month){
        $year = $year-1;          //上一年是当前年减1

        if($year < 2016)          //年份设置最小值是2016年
            $year = 2016;

        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前月份的上一月份需要的数据
    function prevMonth($year,$month){

        if ($month == 1){
            $year = $year-1;          //上一年是当前年减1

            if($year < 2016)          //年份设置最小值是2016年
                $year =2016;
            $month = 12;           //如果是1月，上一月就是上一年的最后一月
        }else {
            $month--;              //上一月份是当前月减1
        }
        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前年份的下一年份的数据
     function nextYear($year,$month){
        $year = $year+1;          //下一年是当前年加1

        if($year > 2048)          //年份设置最大值是2048年
            $year =2048;

        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于处理当前月份的下一月份需要的数据
    function nextMonth($year,$month){

        if ($month == 12){
            $year++;

            if($year > 2048)         //年份设置最大值是2048年
                $year =2048;
            $month = 1;           //如果是1月，上一月就是上一年的最后一月
        }else {
            $month++;              //上一月份是当前月减1
        }
        return "year={$year}&month={$month}";        //返回最终的年份和月份设置参数
    }

    //内部调用的私有方法，用于用户操作去调整年份和月份的设置
    function chageDate($url,$year,$month){
        $out = '';
        $out .= '<tr>';
        $out .= '<td><a href="'.$url.'?'.prevYear($year,$month).'">'.'<<'.'</a></td>';
        $out .= '<td><a href="'.$url.'?'.prevMonth($year,$month).'">'.'<<'.'</a></td>';

        $out .= '<td colspan="3">';
        $out .= '<form>';
        $out .= '<select name="year" onchange="window.location=\''.$url.
            '?year=\'+this.options[selectedIndex].value+\'&month='.$month.'\'">';
        for ($sy=2016; $sy<=2048;$sy++){
            $selected = ($sy ==$year) ? "selected" : "";
            $out .= '<option '.$selected.' value="'.$sy.'">'.$sy.'</option>';
        }
        $out .= '</select>';
        $out .= '<select name="month" onchange="window.location=\''.$url.

            '?year='.$year.'&month=\'+this.options[selectedIndex].value">';
        for ($sm=1; $sm<=12;$sm++){
            $selected1 = ($sm == $month) ? "selected" : "";
            $out .= '<option '.$selected1.' value="'.$sm.'">'.$sm.'</option>';
        }
        $out .= '</select>';
        $out .= '</form>';
        $out .= '</td>';
        $out .= '<td><a href="'.$url.'?'.nextMonth($year,$month).'">'.'>>'.'</a></td>';
        $out .= '<td><a href="'.$url.'?'.nextYear($year,$month).'">'.'>>'.'</a></td>';

        $out .= '</tr>';
        return $out;                //返回日期表单
    }

