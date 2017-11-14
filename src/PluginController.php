<?php
/**
 * Created by PhpStorm.
 * User: 运营部
 * Date: 2017/11/14
 * Time: 13:05
 */

namespace Src;

class PluginController
{
    public static function getPlugins($dir) {
        $plugis = scandir($dir);
        foreach ($plugis as $k => $v) {
            if ($v=='.' || $v=='..' || $v=='init.php') {
                unset($plugis[$k]);
            }
        }
        return $plugis;
    }

    public static function plugins($name) {
        include '../plugin/init.php';
        HookController::add($name,function(){
            echo   '差价已经开启,并且正在运行<br/>'; //这里是回调函数
        });
       HookController::run($name);
    }
}