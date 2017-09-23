<?php
/**
 * db.php
 *
 * ...
 *
 * Copyright (c)2017 http://note.hanfu8.top
 *
 * 修改历史
 * ----------------------------------------
 * 2017/9/23, 作者:大乐乐, 操作:创建
 **/
namespace lib\db;
class db extends \PDO
{
    public function __construct()
    {
        $CONFIG = C();
        try
        {
            //初始化数据库
            parent::__construct("mysql:host={$CONFIG['host']};dbname={$CONFIG['dbname']};charset={$CONFIG['charset']}",$CONFIG['username'],$CONFIG['password']);
        }catch (\PDOException $e)//获取异常
        {
            //打印异常
            p($e->getMessage());die;
        }
        //再次设置数据库编码
        $this->exec("set names {$CONFIG['charset']}");
    }

    public function add($sql)
    {
        $MYSQL = $this->exec($sql);
        if($MYSQL)
        {
            return $this->lastInsertId();
        }else
        {
            return false;
        }
    }
    public function del($sql)
    {
        $MYSQL = $this->exec($sql);
        if($MYSQL)
        {
            return $this->lastInsertId();
        }else
        {
            return false;
        }
    }
    public function save($sql)
    {
        $MYSQL = $this->exec($sql);
        if($MYSQL)
        {
            return $this->lastInsertId();
        }else
        {
            return false;
        }
    }
    public function select($sql)
    {
        $MYSQL = $this->query($sql);
        if($MYSQL)
        {
                return $MYSQL->fetchAll(\PDO::FETCH_ASSOC);
        }else
        {
            return false;
        }
    }

}
