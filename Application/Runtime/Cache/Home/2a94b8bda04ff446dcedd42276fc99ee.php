<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>一方家具</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href='/Public/Home/css/home.css'>
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/style.css">
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/main.css">
    <link rel="stylesheet" href="/Public/Home/css/about.css">
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/function.js"></script>
</head>
<body>
<header class="hom-h">
    <div class="bg">
        <img src="/Public/Home/images/Christmas New Arrivals.png" width="100%">
    </div>
    <div class="word" style="display: none">
        <a href="">装修</a> ●  <a href="">购物</a> ●  <a href="">生活</a>
    </div>
    <div class="header_nav nav-fix">
        <div class="left"><img src="/Public/Home/images/logo.png" height="68" width="257"/></div>
        <div class="centre">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Home/index');?>" target="iFrameContent" class="check-this">首页</a>
                    <a href="<?php echo U('Home/About/index');?>" target="iFrameContent">关于我们</a>
                    <a href="<?php echo U('Home/Shop/index');?>">在线商城</a>
                    <a href="<?php echo U('Home/Contact/index');?>" target="iFrameContent">联系我们</a>
                    <a href="<?php echo U('Home/News/index');?>" target="iFrameContent">新闻动态</a>
                    <a href="#">下载app</a>
                </li>
            </ul>
        </div>
        <div class="right">
            <!--<ul>-->
                <!--<li>-->
                    <!--<span><img src="/Public/Home/images/search.png"></span>-->
                    <!--<?php if(empty($userName) == true): ?>-->
                        <!--<span><img src="/Public/Home/images/log in.png" class="getLogin"></span>-->
                        <!--<?php else: ?>-->
                        <!--<span><img src="/Public/Home/images/login.png"></span>-->
                    <!--<?php endif; ?>-->
                    <!--<span><img src="/Public/Home/images/12.png"></span>-->
                <!--</li>-->
            <!--</ul>-->
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
<div class="iframe">
    <iframe src="<?php echo U('Home/Home/index');?>" scrolling="no" frameborder="0" id="frameContent" onload="this.height=350" name="iFrameContent"></iframe>
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
            <form  action="<?php echo U('Home/Index/register');?>" method="post"  onsubmit="return isRead();">
                <ul>
                    <li><img src="/Public/Home/images/用户名.png"><input type="text" name="userName" placeholder="输入用户名"></li>
                    <li><img src="/Public/Home/images/手机.png"><input type="text" name="phone" placeholder="输入手机号"></li>
                    <li class="vecode"><img src="/Public/Home/images/验证码.png"><input type="text" name="vecode" placeholder="输入验证码"><button style="position: absolute;top: 255px;right: 0;width:100px;height: 38px;background: #138b8b;color: white;border: 0;border-radius: 5px;outline:0;cursor: pointer" class="vecodes">获取验证码</button></li>
                    <li><img src="/Public/Home/images/密码.png"><input type="password" name="password" placeholder="输入6-32位数字或字母"></li>
                    <li><input type="submit" value="注册" class="button"></li>
                    <span>
                        <input type="checkbox" value="checked" id="clause">
                        我已经同意了<a href="javascript:;">《一方家具服务条款》</a>
                    </span>
                </ul>
            </form>
        </div>
    </div>
</div>
<div class="toTop">
    <a href="#"><img src="/Public/Home/images/形状 820.png" width="100%"height="100%"></a>
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
<script type="text/javascript">
    function isRead(){
        let clause = document.getElementById('clause');
        if(!clause.checked){
            alert('请阅读并同意项目条款！');
            return false;
        }
    }
    $(function () {

        //滚动条滚动事件
        window.onscroll=function () {
            let top = document.documentElement.scrollTop || document.body.scrollTop;
            // console.log(top);
            if(top<680){
                $('.header_nav').removeClass('nav-move').addClass('nav-fix');
            }else {
                $('.header_nav').removeClass('nav-fix').addClass('nav-move');
            }
            if(top<800){
                $('.toTop').hide().addClass('top-fix');
            }else if(top>=800 && top <=($('#frameContent').contents().find('body').height() + 490)){
                // console.log($('#frameContent').contents().find('body').height()+460);
                $('.toTop').show().addClass('top-fix');
            }
        };
        //iframe 自适应
        let timer;

        $('#frameContent').on('load',function () {
            if(timer){
                clearInterval(timer);
            }
            let mainHeight,pre_height;
            let frameContent = $(this);
            timer = setInterval(function () {
                mainHeight = frameContent.contents().find('body').height() + 150;
                if(mainHeight != pre_height){
                    pre_height = mainHeight;
                    frameContent.height(Math.max(mainHeight,350));
                }
            },100);
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

        $('.vecodes').click(function (e) {
            e.preventDefault();
            let phone = $('input[name=phone]').val();
            let patten = /0?(13|14|15|18|17)[0-9]{9}/;
            if(phone==null || phone==''){
                alert('请填写手机号！');
                return;
            }else if(!patten.test(phone)){
                alert('请输入正确的手机号！');
                $('input[name=phone]').val('');
                return;
            }
            alert('已发送验证码！');
            $.ajax({
                url:"<?php echo U('Home/Index/code');?>",
                type:"POST",
                data:{"phone":phone},
                success:function (msg) {
                    console.log(msg);
                }
            })
        });
        

        $('.centre>ul>li>a').on('click',function () {
            $('.centre>ul>li').children().removeClass('check-this');
            $(this).addClass('check-this');
            switch ($(this).text()) {
                case '首页':
                    $('.word').hide();
                    $('.header_nav').removeClass('nav-ab').addClass('nav-fix');
                    $('.bg').children().fadeTo(0,0);
                    $('.bg').children().attr('src','/Public/Home/images/Christmas New Arrivals.png');
                    $('.bg').children().fadeTo('slow',1);
                    $('header').removeClass().addClass('hom-h');
                    window.onscroll=function () {
                        let top = document.documentElement.scrollTop || document.body.scrollTop;
                        // console.log(top);
                        if(top<680){
                            $('.header_nav').removeClass('nav-move').addClass('nav-fix');
                        }else {
                            $('.header_nav').removeClass('nav-fix').addClass('nav-move');
                        }
                        if(top<800){
                            $('.toTop').hide().addClass('top-fix');
                        }else if(top>=800 && top <=($('#frameContent').contents().find('body').height() + 490)){
                            // console.log($('#frameContent').contents().find('body').height()+460);
                            $('.toTop').show().addClass('top-fix');
                        }
                    };
                    break;
                case '联系我们':
                    $('.word').hide();
                    $('.header_nav').removeClass('nav-ab').addClass('nav-fix');
                    $('.bg').children().fadeTo(0,0);
                    $('.bg').children().attr('src','/Public/Home/images/关于我们_看图王.png');
                    $('.bg').children().fadeTo('slow',1);
                    $('header').removeClass().addClass('con-h');
                    window.onscroll=function () {
                        let top = document.documentElement.scrollTop || document.body.scrollTop;
                        console.log(top);
                        // console.log(top);
                        if(top<300){
                            $('.header_nav').removeClass('nav-move').addClass('nav-fix');
                        }else {
                            $('.header_nav').removeClass('nav-fix').addClass('nav-move');
                        }
                        if(top<800){
                            $('.toTop').hide().addClass('top-fix');
                        }else if(top>=800 && top <=($('#frameContent').contents().find('body').height() + 490)){
                            // console.log($('#frameContent').contents().find('body').height()+460);
                            $('.toTop').show().addClass('top-fix');
                        }
                    };
                    break;
                case '新闻动态':
                    $('.word').hide();
                    $('.bg').children().attr('src','');
                    $('.header_nav').removeClass('nav-fix').addClass('nav-ab');
                    $('header').removeClass().addClass('new-h');
                    break;
                case '关于我们':
                    $('.word').show();
                    $('.header_nav').removeClass('nav-ab').addClass('nav-fix');
                    $('.bg').children().fadeTo(0,0);
                    $('.bg').children().attr('src','/Public/Home/images/关于我们_看图王3.png');
                    $('.bg').children().fadeTo('slow',1);
                    $('header').removeClass().addClass('abo-h');
                    window.onscroll=function () {
                        let top = document.documentElement.scrollTop || document.body.scrollTop;
                        console.log(top);
                        // console.log(top);
                        if(top<300){
                            $('.header_nav').removeClass('nav-move').addClass('nav-fix');
                        }else {
                            $('.header_nav').removeClass('nav-fix').addClass('nav-move');
                        }
                        if(top<800){
                            $('.toTop').hide().addClass('top-fix');
                        }else if(top>=800 && top <=($('#frameContent').contents().find('body').height() + 490)){
                            // console.log($('#frameContent').contents().find('body').height()+460);
                            $('.toTop').show().addClass('top-fix');
                        }
                    };
            }
        });
    });
</script>