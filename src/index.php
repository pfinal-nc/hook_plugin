<?php

use Src\BaseModel;
use Src\PluginController;
require '../vendor/autoload.php';
//获取用户配置的插件
$member_plugins = BaseModel::select('select name from `plugins`');
//获取系统提供的插件
$system_plugins = PluginController::getPlugins('../plugin');
//读取插件目录
$data = [];
if(count($system_plugins)>0) {
    foreach ($system_plugins as $k=>$plugin) {
        $config = include '../plugin/'.$plugin.'/config.php';
        $data[$k]['title'] = $config['title'];
        $data[$k]['name'] = $plugin;
    }
    $system_plugins = $data;
}

include './template/index.php';