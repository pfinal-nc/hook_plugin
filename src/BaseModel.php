<?php

namespace Src;


class BaseModel
{
    private static $model = null;
    private static $table = null;
    private function __construct()
    {
    }

    public static function getModel()
    {
        if (is_null(self::$model)) {
            self::$model = new \PDO('mysql:host=localhost;dbname=plugin', 'root', 'root');
        }
        return self::$model;
    }

    public static function select($sql) {
        $result = self::getModel()->query($sql);
        $list = $result->fetchAll(2);
        return $list;
    }

    public static function create( $data ) {
        if(empty($data)) {
            return '不能为空';
        }
        $keys ='`'.trim(implode('`,`',array_keys($data)),',').'`';
        $values ="'".trim(implode("','",array_values($data)),',')."'";
        $sql = "INSERT INTO `plugins`(".$keys.")values(".$values.")";
        $res = self::getModel()->exec($sql);
        return $res;
    }
}