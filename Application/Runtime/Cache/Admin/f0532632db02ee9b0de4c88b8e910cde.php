<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>title</title>

    <link rel="shortcut icon" href="../favicon.ico"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/plugins/webuploader/webuploader.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/demo/webuploader-demo.min.css">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品列表 > <small>产品详情</small></h5>
                </div>
                <div class="ibox-content">
                   <a class="list-group-item">
                       <p>商品编号</p>
                       <h3><?php echo ($product["pid"]); ?></h3>
                   </a>
                    <a class="list-group-item">
                        <p>商品类型</p>
                        <h3><?php echo ($product["tname"]); ?></h3>
                    </a>
                    <a class="list-group-item">
                        <p>商品名</p>
                        <h3><?php echo ($product["pname"]); ?></h3>
                    </a>
                    <a class="list-group-item">
                        <p>商品详情</p>
                        <h3><?php echo ($product["note"]); ?></h3>
                    </a>
                    <a class="list-group-item">
                        <p>商品图片</p>
                        <img src="<?php echo ($product["photoaddress"]); ?>" width="10%">
                    </a>
                    <a class="list-group-item">
                        <p>商品价格</p>
                        <h3>￥<?php echo ($product["price"]); ?></h3>
                    </a>
                    <div class="hr-line-dashed"></div>
                    <button class="btn btn-white" type="button" id="cancel">返回首页</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
<script src="/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor/kindeditor-all.js"></script>
<script charset="utf-8" src="/Public/Admin/kindeditor/lang/zh-CN.js"></script>
<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
    KindEditor.ready(function(K) {
        window.editor = K.create('#editor_id');
    });
</script>
</body>

</html>
<script type="text/javascript">
    $(function () {
        $('#cancel').click(function () {
            window.location.href="<?php echo U('Admin/Product/index');?>";
        });
    });
</script>