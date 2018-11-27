<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>管理员登录</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>if(window.top !== window.self){ window.top.location = window.location;}</script>
    <link href="/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">YF</h1>

        </div>
        <h3>一方商城后台管理</h3>

        <form class="m-t" role="form" method="post" action="">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="登录名" name="adminID">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="密码" name="password">
            </div>
            <button type="button" class="btn btn-primary block full-width m-b">登 录</button>
        </form>
    </div>
</div>
<script src="/Public/Admin/js/jquery-3.3.1.js"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
</body>

</html>
<script type="text/javascript">
    $(function () {
        $('button').click(function () {
            let ID = $('input[name=adminID]').val();
            let password = $('input[name=password]').val();

            $.ajax({
                url:"<?php echo U('Admin/Login/loginAction');?>",
                type:"POST",
                data:{"ID":ID,"password":password},
                success:function (msg) {
                    if (msg){
                        console.log(msg);
                        window.location.href="<?php echo U('Admin/Index/index');?>";
                    } else {
                        swal('账号或密码错误！','','error')
                    }
                },
                error:function (msg) {
                    console.log(msg);
                }
            }) ;

        });
    });
</script>