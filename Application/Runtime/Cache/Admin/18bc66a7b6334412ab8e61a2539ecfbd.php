<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>title</title>
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
                                <th data-field="id">ID</th>
                                <th data-field="ids">商品编号及数量</th>
                                <th data-field="name">姓名</th>
                                <th data-field="addressID">地址</th>
                                <th data-field="phone">电话</th>
                                <th data-field="price">价格</th>
                                <th data-field="orderime">下单时间</th>
                                <th data-field="disposeTime">处理时间</th>
                                <th data-field="isPay">是否付款</th>
                                <th data-field="isDispose">是否处理</th>
                                <th data-field="option">操作</th>
                            </tr>
                            </thead>

                            <!--商品循环-->

                            <?php if(is_array($order)): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($i % 2 );++$i;?><tr>
                                    <td data-field="id" class="oid"><?php echo ($order["oid"]); ?></td>
                                    <td data-field="ids"><?php echo ($order["pids"]); ?></td>
                                    <td data-field="name"><?php echo ($order["name"]); ?></td>
                                    <td data-field="addressID"><?php echo ($order["addressid"]); ?></td>
                                    <td data-field="phone"><?php echo ($order["phone"]); ?></td>
                                    <td data-field="price"><?php echo ($order["price"]); ?></td>
                                    <td data-field="orderime"><?php echo ($order["ordertime"]); ?></td>
                                    <td data-field="disposeTime"><?php echo ($order["disposetime"]); ?></td>
                                    <td data-field="isPay">
                                        <?php if($order["ispay"] == 0): ?><i class="glyphicon glyphicon-remove isPay" aria-hidden="true"></i>
                                            <?php elseif($order["ispay"] == 1): ?>
                                            <i class="glyphicon glyphicon-ok isPay" aria-hidden="true"></i><?php endif; ?>
                                    </td>
                                    <td data-field="isDispose">
                                        <?php if($order["isdispose"] == 0): ?><i class="glyphicon glyphicon-remove isDispose" aria-hidden="true"></i>
                                            <?php elseif($order["isdispose"] == 1): ?>
                                            <i class="glyphicon glyphicon-ok isDispose" aria-hidden="true"></i><?php endif; ?>
                                    </td>
                                    <td data-field="option">
                                        <button type="button" class="btn btn-outline btn-default part" title="详情">
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default" title="处理订单">
                                            <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>
                                        </button>
                                    </td>
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

<script type="text/javascript">
$(function () {
    $('.part').click(function () {
        let tr = $(this).parent().parent();
        let id = tr.find('.oid').text();
        window.location.href="<?php echo U('Admin/Order/part');?>?id="+id;
    });
});
</script>