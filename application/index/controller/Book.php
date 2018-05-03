<?php

namespace  app\index\controller;
use think\Request;

class Book extends Base{


    public function __construct(Request $request = null)
    {
        parent::__construct($request);

        $mid = $this->get_mid_by_url("index/book/book");
        $this->menu_id = $mid;
        $this->assign("mid",$this->menu_id);

    }

    public function book(){

        $books = model("user","logic")->get_book();

        $this->assign("books",$books);
        return view("book");

    }


















}