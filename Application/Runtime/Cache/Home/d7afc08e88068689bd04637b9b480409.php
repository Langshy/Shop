<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" href="/Public/Home/css/home.css">
    <script type="text/javascript" src="/Public/Home/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<div class="main">
    <div class="mains">
        <div class="mains_top">
            <div style="margin-bottom: 50px;height: 300px">
                <div class="left"><img src="/Public/Home/images/pic1.png" width="100%" height="100%"></div>
                <div class="right">
                    <h1 style="color: #333333;font-size: 30px;margin-top: 80px">相约圣诞，轻松庆祝</h1>
                    <p style="color: #333333;font-size: 14px;margin-top: 10px">全新圣诞装饰，轻松庆祝节日盛典</p>
                    <div class="button">给冬天更多可能 ＞</div>
                </div>
            </div>
            <div style="height: 300px">
                <div class="left_b" style="text-align: left">
                    <h1 style="color: #333333;font-size: 30px;margin-top: 80px">自然质朴，风格百搭</h1>
                    <p style="color: #333333;font-size: 14px;margin-top: 10px">全新vessad维萨德系列，自然百搭，重温工业之美</p>
                    <div class="button">追忆经典 ＞</div>
                </div>
                <div class="right_b"><img src="/Public/Home/images/pic2.png" width="100%" height="100%"></div>
            </div>
        </div>
        <div class="mains_bottom" style="margin-top:100px ">
            <div style="height: 30px">
                <p style="float: left;font-size:15px;color:#333333;font-weight: bold">&nbsp;新品上市</p>
                <a href="javascript:;" style="float: right;font-size: 8px;color:#666666" id="more">更多商品 》&nbsp;</a>
            </div>
            <div style="width: 100%;height: 560px">
                <ul>
                    <?php if(is_array($recommend)): $i = 0; $__LIST__ = $recommend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$re): $mod = ($i % 2 );++$i;?><li>
                        <div class="mains_bottom_shop">
                            <div><img src="<?php echo ($re["photoaddress"]); ?>" width="80%"></div>
                            <input type="hidden" value="<?php echo ($re["pid"]); ?>" name="pid">
                            <input type="hidden" value="<?php echo ($re["tid"]); ?>" name="tid">
                            <p style="font-size: 9px;color: #666666"><?php echo ($re["pname"]); ?></p>
                            <p style="font-size: 9px">￥ <?php echo ($re["price"]); ?></p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script type="text/javascript">
    $(function () {
        $('.mains_bottom_shop').on('click',function () {
            let pid = $(this).find('input[name=pid]').val();
            let tid = $(this).find('input[name=tid]').val();
            window.open("<?php echo U('Home/Particulars/index');?>?pid="+pid+"&tid="+tid);
        });

        $('#more').click(function () {
            window.open("<?php echo U('Home/Shop/index');?>");
        });
    });
</script>