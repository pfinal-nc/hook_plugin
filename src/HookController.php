<?php
/**
 * Created by PhpStorm.
 * User: 运营部
 * Date: 2017/11/14
 * Time: 13:22
 */

namespace Src;


class HookController
{
    public static function add($name,$func){
        $GLOBALS['hookList'][$name][]=$func;
    }
    // 执行插件
    public static function run($name,$params=null){
        foreach ($GLOBALS['hookList'][$name] as $k => $v) {
            call_user_func($v,$params);
        }
    }
}