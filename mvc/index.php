<?php
    //项目定义路径
    define('APP_PATH',realpath(dirname(__FILE__)));
    //适应Windows或Linux
    define('DS',DIRECTORY_SEPARATOR);
    define('STATIC',APP_PATH.DS.'static'.DS);
    //主配置文件
    define('LIB',APP_PATH.DS.'lib'.DS);
    //视图
    define('VIEWS',APP_PATH.DS.'views'.DS);
    //缓存文件
    define('RUNTIME',APP_PATH.DS.'runtime'.DS);
    //加载配置文件
    $config=require(APP_PATH.DS.'config'.DS.'config.php');
    //实现自动加载
    require (LIB.'AutoLoader.class.php');
    new AutoLoader($config);
    //print_r(APP_PATH);
?>