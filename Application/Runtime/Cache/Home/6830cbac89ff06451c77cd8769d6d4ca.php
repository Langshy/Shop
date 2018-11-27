<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>用户中心</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/userInfo.css">
    <link rel="stylesheet" href='/Public/Home/css/home.css'>
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/style.css">
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/main.css">
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="container">
    <div class="word" style="display: none">
        <a href="">装修</a> ●  <a href="">购物</a> ●  <a href="">生活</a>
    </div>
    <div class="header_nav">
        <div class="left"><img src="/Public/Home/images/logo.png" height="68" width="257"/></div>
        <div class="centre">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    <a href="<?php echo U('Home/Index/index');?>">关于我们</a>
                    <a href="<?php echo U('Home/Shop/index');?>">在线商城</a>
                    <a href="<?php echo U('Home/Index/index');?>">联系我们</a>
                    <a href="<?php echo U('Home/Index/index');?>">新闻动态</a>
                    <a href="#">下载app</a>
                </li>
            </ul>
        </div>
        <div class="right">
            <i class="icon-search"></i>
            <?php if(empty($userName) == true): ?><i class="icon-login getLogin"></i>
                <i class="icon-bug getLogin"></i>
                <?php else: ?>
                <a href="<?php echo U('Home/User/index');?>"><i class="icon-user"></i></a>
                <a href="<?php echo U('Home/User/cart');?>"><i class="icon-bug">
                    <span class="circle-num"><?php echo ($num); ?></span>
                </i></a>
                <div class="user-btn">
                    <a href="<?php echo U('Home/Index/loginOut');?>">退出登入</a>
                </div><?php endif; ?>
        </div>
    </div>
    <div class="content">
        <iframe src="<?php echo U('Home/User/information');?>" name="main" frameborder="0" class="content-iframe" scrolling="no">
        </iframe>
    </div>
</div>
</body>
</html>
<script>
    $(function() {
        $(".icon-user").hover(
            function () {
                $(".user-btn").slideDown(100);
            },
            function () {
                $(".user-btn").hide();
            });
        $('.user-btn').hover(function () {
            $(this).show();
        },function () {
            $(this).slideUp(100);
        });
    })
</script>