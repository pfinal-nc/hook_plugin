<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>插件列表</title>
    <link rel="stylesheet" href="../assert/css/amazeui.min.css">
    <script src="https://cdn.bootcss.com/jquery/2.2.0/jquery.min.js"></script>
    <script src="../assert/js/amazeui.min.js"></script>
</head>
<body>
<div class="container" style="width:80%;margin: 10rem auto">
    <section class="am-panel am-panel-default">
        <header class="am-panel-hd">
            <h3 class="am-panel-title">系统插件列表</h3>
        </header>
        <div class="am-panel-bd">
            <div id="doc-dropdown-justify">
                <div class="am-dropdown" data-am-dropdown="{justify: '#doc-dropdown-justify'}">
                    <button class="am-btn am-btn-success am-dropdown-toggle">添加插件 <span
                                class="am-icon-caret-down"></span></button>
                    <div class="am-dropdown-content">
                        <h2>I am what I am</h2>
                            <form class="am-form" action="./ActionController.php?a=newPl" method="post">
                                <fieldset>
                                    <legend>添加插件</legend>
                                    <div class="am-form-group">
                                        <label for="doc-ipt-email-1">名称</label>
                                        <input type="text" name="name" class=""  placeholder="请输入插件名称">
                                        <br>
                                        <label for="doc-ipt-email-1">标题</label>
                                        <input type="text" name="title" class=""  placeholder="请输入插件">
                                    </div>
                                    <p><button type="submit" class="am-btn am-btn-default">提交</button></p>
                                </fieldset>
                            </form>
                    </div>
            </div>
        </div>
        <br>
        <?php if (count($system_plugins) > 0): ?>
            <?php foreach ($system_plugins as $plugin): ?>
                    <button type="button" onclick="add_mount_plugins(this,'<?php echo $plugin['name']?>')" class="am-btn am-btn-default"><?php echo $plugin['title']; ?></button>
            <?php endforeach; ?>
        <?php endif; ?>
</div>
</section>
<section class="am-panel am-panel-default">
    <header class="am-panel-hd">
        <h3 class="am-panel-title">用户插件列表</h3>
    </header>
    <div class="am-panel-bd">
        <?php if (count($member_plugins) > 0): ?>
            <?php foreach ($member_plugins as $plugin): ?>
                <?php $config = include '../plugin/' . $plugin['name'] . '/config.php'; ?>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <div class="caption">
                                <h3>插件: <?php echo $plugin['name']; ?></h3>
                                <p><?php
                                    if ($config['status'] == 1) {
                                       \Src\PluginController::plugins($plugin['name']);
                                    } ?></p>
                                <p><?php $word = $config['status'] == 1 ? '点击关闭' : '点击开启';
                                    echo '<a href="./index.php?change=' . $plugin['name'] . '">' . $word . '</a><br />';
                                    ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</section>
</div>
</body>
</html>
<script>
    function add_mount_plugins(obj,name) {
        $.ajax({
            type: "POST",
            url: "./ActionController.php?a=mount",
            data: "name="+ name,
            dataType:"json",
            success: function(msg){
                if(msg>=0) {

                }
            }
        });
    }
</script>