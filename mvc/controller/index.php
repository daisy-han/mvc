<?php

/**
 * index.php
 *
 * ...
 *
 * Copyright (c)2017 http://note.hanfu8.top
 *
 * 修改历史
 * ----------------------------------------
 * 2017/9/23, 作者:大乐乐, 操作:创建
 **/
namespace controller;
class index
{
    public function index()
    {

//        $sql="select * from worker";
//        $data=D()->select($sql);
//        var_dump($data);
//        $data=C();
//        print_r($data);die;
        view('index/index',['contents'=>'2222']);
         //view('index');
        echo "默认访问路径";
    }
    public function test()
    {
        echo "这不是默认访问路径";
    }
}

