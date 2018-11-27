<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>H+ 后台主题UI框架 - Bootstrap Table</title>
    <link rel="shortcut icon" href="../favicon.ico"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/bootstrap-table/bootstrap-table.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <base target="_blank">
    <script src="/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="ibox-content">
        <div class="row row-lg">
            <div class="col-sm-12">
                <!-- Example Events -->
                <div class="example-wrap">
                    <h4 class="example-title">事件</h4>
                    <div class="example">
                        <table id="exampleTableEvents" data-height="400" data-mobile-responsive="true">
                            <thead>
                            <tr>
                                <th data-field="id">编号</th>
                                <th data-field="product">商品名</th>
                                <th data-field="username">用户名</th>
                                <th data-field="number">数量</th>
                            </tr>
                            </thead>

                            <!--购物车循环-->
                            <?php if(is_array($cart)): $i = 0; $__LIST__ = $cart;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cart): $mod = ($i % 2 );++$i;?><tr>
                                <td><?php echo ($cart["sid"]); ?></td>
                                <td data-field="product"><?php echo ($cart["pname"]); ?>
                                    <input type="hidden" value="<?php echo ($cart["pid"]); ?>"></td>
                                <td data-field="username"><?php echo ($cart["uid"]); ?>
                                    <input type="hidden" value="<?php echo ($cart["id"]); ?>"></td>
                                <td data-field="number"><?php echo ($cart["number"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                    </div>
                </div>
                <!-- End Example Events -->
            </div>
        </div>
    </div>
</div>
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
<script src="/Public/Admin/js/plugins/bootstrap-table/bootstrap-table.min.js"></script>
<script src="/Public/Admin/js/plugins/bootstrap-table/bootstrap-table-mobile.min.js"></script>
<script src="/Public/Admin/js/plugins/bootstrap-table/locale/bootstrap-table-zh-CN.min.js"></script>
<script src="/Public/Admin/js/demo/bootstrap-table-demo.min.js"></script>
</body>

</html>