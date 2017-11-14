<?php

namespace Src;
require '../vendor/autoload.php';
class ActionController
{
    public function mount($tmp)
    {
        $name = $tmp['name'];
        $files = '../plugin/'.$name;
        if(!file_exists($files)){
            return false;
        }
        $data['name']=$name;
        $data['add_time']=time();
        $check = BaseModel::select("select `name` from `plugins` WHERE `name`='".$data['name']."'");
        if($check) {
            return ['code'=>0,'msg'=>'已经添加过了'];
        }
        $res = BaseModel::create($data);
        return ['code'=>1,'msg'=>'添加成功'];
    }

    public function newPl($tmp) {
        $name = $tmp['name'];
        $files = '../plugin/'.$name;
        if(file_exists($files)){
            return false;
        }
        mkdir($files);
        // 获取到配置项
        $config=include '../data/exp/config.php';
        $config['title'] = $tmp['title'];
        // 将更改后的配置项写入到文件中
        $str="<?php  return ".var_export($config,true).';';
        file_put_contents($files.'/config.php', $str);
    }
}
$a = $_GET['a'];
$action = new ActionController();
$action->$a($_POST);