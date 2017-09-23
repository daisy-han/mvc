<?php
/**
 * AutoLoader.class.php
 *
 * ...
 *
 * Copyright (c)2017 http://note.hanfu8.top
 *
 * 修改历史
 * ----------------------------------------
 * 2017/9/23, 作者:大乐乐, 操作:创建
 **/
class AutoLoader
{
    //配置参数
    private $config;
    //已经加载的类
    private $parameter=[];
    public function __construct($config)
    {
        $this->config = $config;
        spl_autoload_register(array($this,"load"));
        //调用报错机制
       // $this->DeBug();
        //加载自定义方法
        $this->HELP();
       $this->Route();
       // new db();
    }
    //路由方法
    protected function Route()
    {
        //接收访问路径中的参数
        $route=trim(isset($_GET['r'])?$_GET['r']:'/');
        unset($_GET['r']);//?
       // var_dump($_GET);
        $new_route= explode('/',$route);
       //var_dump($new_route);
       //判断控制器和方法
        $Controller='controller\\'.strtolower(empty($new_route[0])?$this->config['DefaultController']:$new_route[0]);
        $action=isset($new_route[1])?$new_route[1]:$this->config['DefaultAction'];
        (new $Controller)->$action();
    }

    //加载自定义方法
    protected function HELP()
    {
        foreach($this->config['HELP'] as $v)
        {
            //加载自定义函数库
            include_once APP_PATH.DS.'help/'.$v.'.php';
        }
    }
    //封装加载函数
    public function load($class)
    {
        if(in_array($class,$this->parameter))
        {
            return true;
        }
        else
        {
            //把命名空间转换成目录，加载出来
            $className=str_replace("\\",DS,$class).'.php';
           // echo $className;
            $class_Data=explode('\\',$className);
            //var_dump($class_Data) ;
            //根据命名空间判断一下加载的哪个模块下的哪个类
            $loadfile=APP_PATH.DS.$className;
            //echo $loadfile;
            if(isset($loadfile))
            {
                if(is_file($loadfile))
                {
                    include_once $loadfile;
                    $this->parameter[$class]=$class;
                }
                else
                {
                    return false;
                }
            }

        }
        //$className 形参 //命名空间 use 后边的的东西


    }
}

