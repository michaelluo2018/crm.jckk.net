<?php

namespace  app\index\controller;

use think\Request;

class Announcement extends  Base{

    public function __construct(Request $request = null)
    {
        parent::__construct($request);

        $mid = $this->get_mid_by_url("index/announcement/announcement_list");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    public function announcement_add(){


    }



    public function  announcement_edit(){


    }


    public  function  announcement_list(){



    }






































}
