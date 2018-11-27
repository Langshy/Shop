<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/order.css">
    <link rel="stylesheet" href="/Public/Home/css/home.css">
    <link rel="stylesheet" href="/Public/Home/css/details.css">
    <link rel="stylesheet" href="/Public/Home/css/style.css">
    <link rel="stylesheet" href="/Public/Home/css/shop.css">
    <link rel="stylesheet" href="/Public/Home/css/address.css">
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/main.css">
    <link rel="stylesheet" href="/Public/Home/font-awesome-4.7.0/css/font-awesome.css">
    <script src="/Public/Home/js/jsAddress.js"></script>
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
<div class="order_details address-main">
    <ul>
        <li><p>订单编号：YF-<span id="oid"><?php echo ($oid); ?></span></p></li>
        <li><p>用户名：<?php echo ($userName); ?></p></li>
        <li><span>商品名称</span><span>商品数量</span><span>商品价格</span></li>
        <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><li><span><?php echo ($pro["pname"]); ?></span><span><?php echo ($pro["number"]); ?></span><span>￥<?php echo ($pro["price"]); ?></span></li>
            <input type="hidden" value="<?php echo ($pro["pid"]); ?>:<?php echo ($pro["number"]); ?>:<?php echo ($pro["price"]); ?>" class="pids"><?php endforeach; endif; else: echo "" ;endif; ?>
        <li>
            <span style="width: 8%">地址信息：</span>
            <span style="width: 40%">
                <select id="cmbProvince" name="cmbProvince" class="address-frame" style="width:113px;"></select>
                <select id="cmbCity" name="cmbCity" class="address-frame" style="width:140px;"></select>
                <select id="cmbArea" name="cmbArea" class="address-frame" style="width:140px;"></select>
            </span>
        </li>
        <li><p>收&nbsp;&nbsp;货&nbsp;&nbsp;人：<input type="text" id="name"></p></li>
        <li><p>电话号码：<input type="text" id="phone"></p></li>
        <li><p>总价格：￥<span id="price"><?php echo ($price); ?></span></p></li>
        <li><button id="pay">支付</button></li>
    </ul>
</div>
</body>
</html>
<script type="text/javascript">
    addressInit('cmbProvince', 'cmbCity', 'cmbArea');
</script>
<script type="text/javascript">
    window.onload=function () {
        document.getElementById('pay').onclick=function () {
            let pids = [];
            let cmbProvince = document.getElementById('cmbProvince').value;
            let cmbCity = document.getElementById('cmbCity').value;
            let cmbArea = document.getElementById('cmbArea').value;

            let oid = document.getElementById('oid').innerText;
            let pid = document.getElementsByClassName('pids');
            let address = cmbProvince+cmbCity+cmbArea;
            let name = document.getElementById('name').value;
            let phone = document.getElementById('phone').value;
            let price = document.getElementById('price').innerText;

            for(let i=0;i<pid.length;i++){
                pids.push(pid[i].value);
            }
            pids=pids.join(',');

            $.ajax({
                url:"<?php echo U('Home/Shop/addOrder');?>",
                type:"POST",
                data:{"oid":oid,"pids":pids,"address":address,"name":name,"phone":phone,"price":price},
                success:function (msg) {
                    if(msg){
                        window.location.href="<?php echo U('Home/Shop/paySuccess');?>?oid="+oid;
                    }
                }
            })
        }
    }
</script>