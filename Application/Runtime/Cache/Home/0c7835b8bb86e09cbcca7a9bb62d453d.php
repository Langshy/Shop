<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/userInfo.css">
    <script src="/Public/Home/js/jquery-3.3.1.min.js"></script>
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
        <div class="user-form">
            <form>
                <div class="form-item">
                    <div class="form-item-label float-left">头像</div>
                    <span class="user-info-avatar" id="label">

                        <!--<img src="../images/柴犬1.jpg" width="80px"/>-->
                        <a class="input-file input-fileup" href="javascript:;">
                            <div class="user-info-mask ">更改头像<input size="100" type="file" name="file" id="file"></div>
                        </a>
                    </span>
                </div>
                <div class="form-item">
                    <label class="form-item-label">昵称</label>
                    <input type='text' id="myname" class="user-info-input" value="<?php echo ($result["uname"]); ?>"/>
                    <div id="nametext" class="nametext"></div>
                </div>
                <div class="form-item">
                    <label class="form-item-label">性别</label>
                    <?php if($result["sex"] == '男'): ?><input type='radio' name='sex' value="男" checked/>
                        <label>男</label>
                        <input type='radio' name='sex' value="女"/>
                        <label>女</label>
                        <?php else: ?>
                        <input type='radio' name='sex' value="男"/>
                        <label>男</label>
                        <input type='radio' name='sex' value="女" checked/>
                        <label>女</label><?php endif; ?>
                </div>
                <div class="form-item">
                    <label class="form-item-label">邮箱</label>
                    <input type='text' id="myemail" class="user-info-input" value="<?php echo ($result["email"]); ?>"/>
                    <div id="myemail-ver" class="nametext"></div>
                </div>
                <div class="form-item">
                    <label class="form-item-label">手机</label>
                    <input type='text' id="phone" class="user-info-input" value="<?php echo ($result["phone"]); ?>"/>
                    <div id="phonetext" class="nametext"></div>
                </div>
                <div class="form-item">
                    <input type='button' class="form-btn" value="保存" />
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<script>
    $(function() {
        $("#myname").blur(function () {
            var myname = /^[\u4e00-\u9fa5\w]{2,25}$/;
            console.log($("#myname").val())
            if (!myname.test($("#myname").val())) {
                $("#nametext").text("只能输入中文、英文还有数字,且昵称应为2-25个字符。");
            } else {
                $("#nametext").text("");
            }
        });
        $("#myemail").blur(function(){
            var myemail = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
            console.log($("#myemail").val())
            if(!myemail.test($("#myemail").val())){
                $("#myemail-ver").text("邮箱格式不正确，请重新输入");
            }else{
                $("#myemail-ver").text("");
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

        $("#label").hover(
            function(){
                $(".user-info-mask").css("display","block")
            },
            function(){
                $(".user-info-mask").css("display","none")
            });

        $('.form-btn').click(function () {
            let name = $('#myname').val();
            let sex = $('input[name=sex]:checked').val();
            let mail = $('#myemail').val();
            let phone = $('#phone').val();

            $.ajax({
                url:"<?php echo U('Home/User/informationChange');?>",
                type:"POST",
                data:{"name":name,"sex":sex,"mail":mail,"phone":phone},
                success:function (msg) {
                    if(msg){
                        alert('修改成功！');
                        window.location.reload();
                    }
                }
            })
        });
    })

</script>