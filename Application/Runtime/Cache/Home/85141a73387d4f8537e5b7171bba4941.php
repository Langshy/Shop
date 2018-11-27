<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收货地址</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/userInfo.css">
    <link rel="stylesheet" href="/Public/Home/css/address.css">
    <link rel="stylesheet" href="/Public/Home/font-awesome-4.7.0/css/font-awesome.css">
    <script src="/Public/Home/jsAddress.js"></script>
    <script src="/Public/Home/jquery-1.9.0.min.js"></script>

</head>
<body>
<div class="content">
    <div class="content-left">
        <ul>
            <a href="information.html" target="main"><li>个人信息</li></a>
            <a href="order.html" target="main"><li>我的订单</li></a>
            <a href="management.html" target="main"><li>送货地址</li></a>
            <a href="" target="main"><li>我的卡券</li></a>
            <a href="" target="main"><li>在线客服</li></a>
        </ul>
    </div>
    <div class="content-right">
        <div class="content-right-header">收货地址</div>
        <a href="<?php echo U('Home/User/address');?>" target="main"><div  class="address-add">修改收货地址</div></a>
        <div class="address">
            <dl class="address-info">您已添加4个地址，你还可以添加16个地址</dl>
            <table class="address-details"  border="1px"  cellspacing="0" >
                <tr class="address-details-title">
                    <th>收货人</th>
                    <th>所在地区</th>
                    <th>收货地址</th>
                    <th>邮编</th>
                    <th>电话/手机</th>
                    <th>操作</th>
                    <th></th>
                </tr>
                <tr>
                    <td>张晓晓</td>
                    <td>北京 北京市 东城区  安定门街道</td>
                    <td>北京市海淀区上地三街80号</td>
                    <td>100000</td>
                    <td>198******90</td>
                    <td style="color: #007AFF;">修改&nbsp;|&nbsp;删除</td>
                    <td ><span class="default">默认地址</span></td>
                </tr>
            </table>

        </div>
    </div>
</div>


</body>
</html>