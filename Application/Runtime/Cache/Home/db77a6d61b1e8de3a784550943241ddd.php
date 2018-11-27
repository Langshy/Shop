<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/Public/Home/css/success.css">
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
    <img src="/Public/Home/images/Christmas New Arrivals.png" width="100%" height="100%"/>
    <div class="success">
        <div class="success_top">
            <img src="/Public/Home/images/支付成功.png" height="128" width="128"/>
            <h1>支付成功!</h1>
        </div><hr>
        <div class="success_bottom">
            <p>订单号：FY-<?php echo ($oid); ?></p>
            <p>支付金额：<?php echo ($price); ?>元</p>
            <button class="back">返回</button>
        </div>
    </div>
</header>
</body>
</html>
<script type="text/javascript">
    $(function () {
       $('.back').click(function () {
           window.location.href="<?php echo U('Home/User/index');?>"
       });
    });
</script>