<?php
/**
 * function.php
 *
 * ...
 *
 * Copyright (c)2017 http://note.hanfu8.top
 *
 * 修改历史
 * ----------------------------------------
 * 2017/9/23, 作者:大乐乐, 操作:创建
 **/
//数据库方法
function D()
{
    return new lib\db\db();
}
//获取配置文件内容
function C($CONFIG_NAME = false)
{
    //获取框架配置信息
    $CONFIG = include APP_PATH.DS.'config/config.php';
    if($CONFIG_NAME)
    {
        if(isset($CONFIG[$CONFIG_NAME]))
        {
            return $CONFIG[$CONFIG_NAME];
        }else
        {
            return false;
        }
    }else
    {
        return $CONFIG;
    }

}

//视图层
function view($view,$contents=false,$charset = 'utf-8',$contentType = 'text/html')
{
    //解析变量
    if($contents) $VALUES = extract($contents);
    $view=explode('/',$view);
    //var_dump($view);die;
    //控制器目录
    $VIEW_FILE = APP_PATH.DS.'view/'.strtolower($view[0]).'/'.strtolower($view[1]).'.php';
    // 网页字符编码
    header("content-type:{$contentType};charset={$charset}");
    if(is_file($VIEW_FILE))
    {
        include_once $VIEW_FILE;
    }else
    {
        die("<h3>视图层文件不存在:</h3>$VIEW_FILE");
    }
}
