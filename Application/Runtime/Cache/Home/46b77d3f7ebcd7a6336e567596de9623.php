<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>详情页</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/home.css">
    <link rel="stylesheet" href="/Public/Home/css/details.css">
    <link rel="stylesheet" href="/Public/Home/css/style.css">
    <link rel="stylesheet" href="/Public/Home/css/shop.css">
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/main.css">
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
    <div class="header_nav nav-ab">
        <div class="left"><img src="/Public/Home/images/logo.png" height="68" width="257"/></div>
        <div class="centre">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    <a href="<?php echo U('Home/Index/index');?>">关于我们</a>
                    <a href="<?php echo U('Home/Shop/index');?>" class="check-this">在线商城</a>
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
                </i></a><?php endif; ?>
        </div>
    </div>
</header>
<div class="type">
    <ul>
        <?php if($id =='all'): ?><li><a href="<?php echo U('Home/Shop/part');?>?id=all" class="type-this">全部</a></li>
            <?php else: ?>
            <li><a href="<?php echo U('Home/Shop/part');?>?id=all">全部</a></li><?php endif; ?>
        <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i; if($t["tid"] == $id): ?><li><a href="<?php echo U('Home/Shop/part');?>?id=<?php echo ($t["tid"]); ?>" class="type-this"><?php echo ($t["tname"]); ?></a></li>
                <?php else: ?>
                <li><a href="<?php echo U('Home/Shop/part');?>?id=<?php echo ($t["tid"]); ?>"><?php echo ($t["tname"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
<div class="main height-auto">
    <div class="main_shop">
        <ul>
            <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><li>
                    <input type="hidden" value="<?php echo ($a["pid"]); ?>" name="pid">
                    <input type="hidden" value="<?php echo ($a["tid"]); ?>" name="tid">
                    <div><img src="<?php echo ($a["photoaddress"]); ?>"  width="300px"/></div>
                    <p><?php echo ($a["pname"]); ?></p>
                    <p>￥<?php echo ($a["price"]); ?></p>
                </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
<div id="l-Sin" style="display: none">
    <div class="close">
        <img src="/Public/Home/images/close.png">
    </div>
    <div class="l-SinContent">
        <div class="l-Sin">
            <div class="choose-text show" id="login">登录</div>
            <div class="choose-text" id="register">注册</div>
        </div>
        <div class="login">
            <form action="<?php echo U('Home/Index/login');?>" method="post">
                <ul>
                    <li><img src="/Public/Home/images/用户名.png"><input type="text" name="userName" placeholder="输入用户名"></li>
                    <li><img src="/Public/Home/images/密码.png"><input type="password" name="password" placeholder="输入6-32位数字或字母"></li>
                    <li><input type="submit" value="登录" class="button"></li>
                </ul>
            </form>
        </div>
        <div class="register"  style="display: none">
            <form>
                <ul>
                    <li><img src="/Public/Home/images/用户名.png"><input type="text" name="userName" placeholder="输入用户名"></li>
                    <li><img src="/Public/Home/images/手机.png"><input type="text" name="phone" placeholder="输入手机号"></li>
                    <li class="vecode"><img src="/Public/Home/images/验证码.png"><input type="text" name="vecode" placeholder="输入验证码"></li>
                    <li><img src="/Public/Home/images/密码.png"><input type="password" name="password" placeholder="输入6-32位数字或字母"></li>
                    <li><input type="submit" value="登录" class="button"></li>
                    <span>
                        <input type="checkbox" value="checked">
                        我已经同意了<a href="javascript:;">《一方家具服务条款》</a>
                    </span>
                </ul>
            </form>
        </div>
    </div>
</div>
<div class="return">
    <a href="#">返回顶部</a>
</div>
<footer>
    <div class="footer_img"><img src="/Public/Home/images/世界很大，寻一方静土.png" width="100%" height="100%"/></div>
    <div class="footer_bottom">
        <div class="footer_bottom_a">
            <ul>
                <li style="margin-left: 6%">
                    <h1 style="font-size: 15px;color:#333333;font-weight: bold;margin-top: 30px">联系我们 -</h1><br>
                    <p style="color:#333333;font-size: 6px">XiaoYi Dong</p>
                    <p style="color:#333333;font-size: 6px">1021517054@qq.com</p>
                </li>
                <li style="margin-left: 14%">
                    <h1 style="font-size: 15px;color:#333333;font-weight: bold;margin-top: 30px">客服热线 -</h1><br>
                    <p style="color:#333333;font-size: 6px">400-123-1234</p>
                    <p style="color:#333333;font-size: 6px">+61 433 679 520</p>
                </li>
                <li style="margin-left: 14%">
                    <h1 style="font-size: 15px;color:#333333;font-weight: bold;margin-top: 30px">关于我们 -</h1><br>
                    <p style="color:#333333;font-size: 6px">weibo：yifang-home</p>
                    <p style="color:#333333;font-size: 6px">WeChat：yifang-home</p>
                </li>
                <li style="margin-left: 14%">
                    <img src="/Public/Home/images/QR CODE.png">
                    <p style="color:#333333;font-size: 6px;text-align: center">扫一扫下载客户端</p>
                </li>
            </ul>
        </div>
        <div class="footer_bottom_b">
            <p>Copyright © 2017 yifanghome.com Inc.All Rights Reserved. 厦门一方家居有限公司</p><br>
            <p>版权所有 京ICP备14049645号-0 增值电信业务经营许可证：京ICP证123456号</p>
        </div>
    </div>
</footer>
</body>
</html>
<script>
    $(function () {
        $('.type>ul>li>a').on('click',function () {
            $('.type>ul>li').children().removeClass('type-this');
            $(this).addClass('type-this');
        });

        //login&&register
        let login = $('#login');
        let register = $('#register');

        login.on('click',function () {
            login.addClass('show');
            register.removeClass('show');
            $('.login').show();
            $('.register').hide();
        });
        register.on('click',function () {
            register.addClass('show');
            login.removeClass('show');
            $('.login').hide();
            $('.register').show();
        });

        $('.close').on('click',function () {
            $('#l-Sin').hide();
        });

        $('.getLogin').on('click',function () {
            $('#l-Sin').show();
        });

        $('.main_shop>ul').find('li').click(function () {
            let pid = $(this).find('input[name=pid]').val();
            let tid = $(this).find('input[name=tid]').val();
            window.location.href="<?php echo U('Home/Particulars/index');?>?pid="+pid+"&tid="+tid;
        });
    });
</script>