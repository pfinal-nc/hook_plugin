<?php
use Src\HookController;
HookController::add('msg',function(){
    echo '差价已经开启,并且正在运行<br />';
});