<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>订单详情</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/userInfo.css">
    <link rel="stylesheet" href="/Public/Home/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="/Public/Home/css/address.css">
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
        <div class="title-heater clear">
            <ul class="title-btn">
                <li class=""><a href="">所有订单</a><span style="margin-left: 20px;color: #ccc;">|</span></li>
                <li><a href="">已完成订单</a><span style="margin-left: 20px;color: #ccc;">|</span></li>
                <li><a href="">待付款</a><span style="margin-left: 20px;color: #ccc;">|</span></li>
                <li><a href="">待发货</a><span style="margin-left: 20px;color: #ccc;">|</span></li>
                <li><a href="">待评价</a><span style="margin-left: 20px;color: #ccc;">|</span></li>
            </ul>
        </div>
        <HR width="100%" color=#987cb9 SIZE=3 >
        <div class="orders-content">
            <span style="color: #858585;margin-left: 130px;">宝贝</span>
            <span style="color: #858585;margin-left: 140px;">单价(元)</span>
            <span style="color: #858585;margin-left: 70px;">数量</span>
            <span style="color: #858585;margin-left: 90px;">商品操作</span>
            <span style="color: #858585;margin-left: 60px;">实付款(元)</span>
            <span style="color: #858585;margin-left: 45px;">交易状态</span>
            <span style="color: #858585;margin-left: 55px;">操作</span>
        </div>
        <div style="width: 100%;height: 20px;padding: 10px;">
            <button class="button-all outline">全选</button>
            <div style="float: right;margin-right: 20px;">
                <input type="button"  class="left-btn outline">
                <input type="button" class="left-btn1 outline">
            </div>
        </div>
        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><div class="orders">
                <div class="orders-header">
                    <input type="checkbox" class="checkbox">
                    <span ><?php echo ($re["ordertime"]); ?></span>
                    <span style="margin-left: 20px;">订单号：YF-<span><?php echo ($re["oid"]); ?></span></span>
                    <span style="margin-left: 110px;">
                    <a href="">
                        <i class="fa fa-commenting" style="color:blue" aria-hidden="true"></i>
                        <span>和我联系</span>
                    </a>
                </span>
                </div>
                <div class="orders-centre">
                    <div class="orders-content-goods">
                        <dl class="orders-content-name">
                            <?php if(is_array($re['product'])): $i = 0; $__LIST__ = $re['product'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><div class="content-list">
                                    <span class="p-name "><?php echo ($p["name"]); ?></span>
                                    <span class="p-price "><?php echo ($p["price"]); ?></span>
                                    <span class="p-number "><?php echo ($p["number"]); ?></span>
                                </div>
                                 <br><?php endforeach; endif; else: echo "" ;endif; ?>
                        </dl>

                        <dl class="orders-content-refund"><a href="">退款/退货</a>
                            <br /><a href="">投诉卖家</a>
                            <br><a href="">退运保险</a>

                        </dl>
                    </div>
                    <div class="orders-content-right">
                        <div class="insurance">保险服务</div>
                        <div class="insurance-price">￥0.00</div>
                        <span style="margin-left: 80px;">1</span>
                    </div>
                </div>
                <div class="orders-pay">
                    <span style="font-weight: bold;margin-top: 30px;display: block;">￥<?php echo ($re["price"]); ?></span>
                    <dl>(含运费:0.00)</dl>
                </div>
                <div class="orders-state">
                    <dl style="margin-top: 30px;"><a href="">卖家已发货</a></dl>
                    <dl><a href="">订单详情</a></dl>
                    <dl><a href="">查看物流</a></dl>
                </div>
                <div class="orders-operation">

                    <button class="orders-operation-btn">确认收货</button>
                    <dl >还有9天10时4分</dl>
                    <dl><a href="">取消订单</a></dl>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>

</body>
</html>