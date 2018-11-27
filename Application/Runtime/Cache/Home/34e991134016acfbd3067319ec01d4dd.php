<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link rel="stylesheet" href="/Public/Home/css/cart.css">
    <link type="text/css" rel="stylesheet" href="/Public/Home/css/main.css">
    <script src="/Public/Home/js/jquery-3.3.1.min.js"></script>
</head>
<body>
<header>
    <div class="header_nav">
        <div class="left"><img src="/Public/Home/images/logo.png" height="68" width="257"/></div>
        <div class="centre">
            <ul>
                <li>
                    <a href="<?php echo U('Home/Index/index');?>">首页</a>
                    <a href="#">关于我们</a>
                    <a href="<?php echo U('Home/Shop/index');?>">在线商城</a>
                    <a href="#">联系我们</a>
                    <a href="news.html">新闻动态</a>
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
    <div class="main">
        <ul>
            <li><span><input type="checkbox" class="checked">全选</span><span style="width: 30%">商品名称</span><span>单价</span><span style="margin: 0 5%">数量</span><span>操作</span></li>
            <?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?><li class="product"><span><input type="checkbox" class="ckbox"></span><span style="width: 30%;text-align: left"><img src="<?php echo ($cart["photoaddress"]); ?>" width="100"/><?php echo ($cart["pname"]); ?></span><span class="price"><?php echo ($cart["price"]); ?></span><span style="margin: 0 5%"><input type="number" value="<?php echo ($cart["number"]); ?>" min="1" style="width: 50px;text-align: center;"></span><span class="del">删除<input type="hidden" value="<?php echo ($cart["sid"]); ?>" class="sid"></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
            <li><span>已选 <b class="b">(0)</b></span><span style="margin-right: 44%" class="pdel">批量删除</span><span>总计：￥<b class="zmoney">0</b></span><span><button class="btn" id="pay">下单</button></span></li>
        </ul>
    </div>
</header>
</body>
</html>
<script>
    $(function () {
        //单个删除
        $(".main li").on("click",".del",function () {
            if(confirm("确定删除吗")){
                let sid = $(this).find('input');
                $.ajax({
                    url:"<?php echo U('Home/User/del');?>",
                    type:"POST",
                    data:{"sid":sid.val()},
                    success:function (msg) {
                        if(msg){
                            sid.parent().parent().remove();
                        }
                    }
                })
            }
        });


        //批量删除
        $(".main li").on("click",".pdel",function () {
            if(confirm("确定删除吗")){
                let sid = $(this).find('input');
                let li = document.getElementsByClassName('product');
                let array =[];
                let result='';
                for(let i=0;i<li.length;i++){
                    if(li[i].firstElementChild.firstElementChild.checked){
                        array.push(li[i].children[4].children[0].value);
                    }
                }
                result = array.join(',');
                $.ajax({
                    url:"<?php echo U('Home/User/del');?>",
                    type:"POST",
                    data:{"sid":result},
                    success:function (msg) {
                        if(msg){
                            location.replace(location);
                        }
                    }
                })
            }
        });

        //下单
        document.getElementById('pay').onclick=function(){
            let money = document.getElementsByClassName('zmoney')[0].innerHTML;
            let li = document.getElementsByClassName('product');
            let array =[];
            let result='';
            for(let i=0;i<li.length;i++){
                if(li[i].firstElementChild.firstElementChild.checked){
                    array.push(li[i].children[4].children[0].value);
                }
            }
            result = array.join(',');
            window.location.href="<?php echo U('Home/Shop/order');?>?id="+result+"&price="+money;
            // $.ajax({
            //     url:"<?php echo U('Home/Shop/order');?>",
            //     type:"POST",
            //     data:{"sid":result,"price":money},
            //     success:function (msg) {
            //         if(msg){
            //
            //         }
            //     }
            // })
        };

        //勾选个数
        $(".main li").on("click",".ckbox",function () {
            $(".b").text("("+$(".ckbox:checked").length+")");
        });

        $(".main li").on("click",".checked",function () {
            var a=$(this).prop("checked");
            if(a){
                var b=$("input[type=checkbox]");
                for (i=0;i<b.length;i++){
                    b[i].checked=true;
                }
                $(".b").text("("+$(".ckbox:checked").length+")");//全选个数
            }else {
                var b=$("input[type=checkbox]");
                for (i=0;i<b.length;i++){
                    b[i].checked=false;
                }
                $(".b").text("("+$(".ckbox:checked").length+")");//取消全选个数
            }//全选
            var money=0;
            $(".ckbox").each(function (index,element) {
                if(element.checked){
                    var price=$(".price").get(index).innerText;
                    var num=$("input[type=number]").get(index).value;
                    money+=parseInt(price)*parseInt(num);
                }
            });
            $(".zmoney").text(money);
        });//全选.价格

        $(".main li").on("click",".ckbox",function () {
            var money=0;
            $(".ckbox").each(function (index,element) {
                if(element.checked){
                    var price=$(".price").get(index).innerText;
                    var num=$("input[type=number]").get(index).value;
                    money+=parseInt(price)*parseInt(num);
                }
            });
            $(".zmoney").text(money);
        }); //价格
    })
</script>