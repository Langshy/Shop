<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>收货地址</title>
    <link rel="stylesheet" href="/YFShop/Public/Home/css/userInfo.css">
    <link rel="stylesheet" href="/YFShop/Public/Home/css/address.css">
    <link rel="stylesheet" href="/YFShop/Public/Home/font-awesome-4.7.0/css/font-awesome.css">
    <script src="/YFShop/Public/Home/js/jsAddress.js"></script>
    <script src="/YFShop/Public/Home/js/jquery-3.3.1.min.js"></script>

</head>
<body>
<div class="content">
    <div class="content-left">
        <ul>
            <a href="<?php echo U('Home/User/information');?>" target="main"><li>个人信息</li></a>
            <a href="<?php echo U('Home/User/order');?>" target="main"><li>我的订单</li></a>
            <a href="<?php echo U('Home/User/management');?>" target="main"><li>送货地址</li></a>
            <li>我的卡券</li>
            <li>在线客服</li>
        </ul>
    </div>
    <div class="content-right">
        <div class="content-right-header">收货地址</div>
        <div  class="address-add">修改收货地址</div>
        <div class="address-main">
            <ul>
                <li>
                    <span class="column"><span class="note">*&nbsp;</span>地址信息：</span>
                    <span>
                    <select id="cmbProvince" name="cmbProvince" class="address-frame" style="width:113px;"></select>
                    <select id="cmbCity" name="cmbCity" class="address-frame" style="width:140px;"></select>
                    <select id="cmbArea" name="cmbArea" class="address-frame" style="width:140px;"></select>
                </span>
                </li>
                <li>
                    <span class="column float-left"><span class="note">*&nbsp;</span>详细地址：</span>
                    <div class="float-left">
                        <textarea cols="20" id="mydes" class="address-main-text" placeholder="请输入详细的地址信息，如道路、门牌号、小区、楼栋号、单元等信息"></textarea>
                    </div>
                    <div id="mydestext" class="nametext"></div>
                </li>
                <li>
                    <span class="column">邮政编码：</span>
                    <input type="text" class="address-text" placeholder="请填写邮政编码">
                    <div id="code" class="nametext"></div>
                </li>
                <li>
                    <span class="column"><span class="note">*&nbsp;</span>收货人姓名：</span>
                    <input id="myname" type="text" class="address-text" placeholder="长度不超过25个字符">
                    <div id="nametext" class="nametext"></div>
                </li>
                <li>
                    <span class="column"><span class="note">*&nbsp;</span>手机号码：</span>
                    <input type="text" id="phone" class="address-text" placeholder="电话号码或手机号码必须填一项">
                    <div id="phonetext" class="nametext"></div>
                </li>
            </ul>
            <div class="address-give"><input type="checkbox"  class="address-give-box">设置为默认收货地址</div>
            <button class="address-give-btn" >保存</button>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    addressInit('cmbProvince', 'cmbCity', 'cmbArea');
</script>
<script>
    $(function(){
        $("#myname").blur(function(){
            var myname = /^[\u4e00-\u9fa5\w]{2,25}$/;
            console.log($("#myname").val())
            if(!myname.test($("#myname").val())){
                $("#nametext").text("只能输入中文、英文还有数字,且收货人姓名应为2-25个字符。");
            }else{
                $("#nametext").text("");
            }
        });
        $("#phone").blur(function(){
            var myphone = /^1\d{10}$/;
            console.log($("#phone").val())
            if(!myphone.test($("#phone").val())){
                $("#phonetext").text("手机号码格式不正确，请重新输入");
            }else{
                $("#phonetext").text("");
            }
        });
        $("#mydes").blur(function(){
            var mydes = /^\w{5,50}$/;
            console.log($("#mydes").val())
            if(!mydes.test($("#mydes").val())){
                $("#mydestext").text("请填写详细地址");
            }else{
                $("#mydestext").text("");
            }
        });
    })



</script>