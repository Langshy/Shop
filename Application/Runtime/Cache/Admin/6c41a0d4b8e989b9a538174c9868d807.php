<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>title</title>

    <link rel="shortcut icon" href="favicon.ico"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">

    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">

    <div class="row">
        <div class="col-sm-12">
            <div class="ibox-content p-xl">
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <h4>单据编号：</h4>
                        <h4 class="text-navy">YF-<?php echo ($order["oid"]); ?></h4>
                        <address>
                            <strong><?php echo ($order["name"]); ?></strong><br>
                            <?php echo ($order["addressid"]); ?><br>
                            <abbr title="Phone">电话：</abbr> (86) <?php echo ($order["phone"]); ?>
                        </address>
                        <p>
                            <span><strong>日期：</strong> <?php echo ($order["ordertime"]); ?></span>
                        </p>
                    </div>
                </div>

                <div class="table-responsive m-t">
                    <table class="table invoice-table">
                        <thead>
                        <tr>
                            <th>清单</th>
                            <th>数量</th>
                            <th>单价</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pro): $mod = ($i % 2 );++$i;?><tr>
                                <td>
                                    <div><strong><?php echo ($pro["pname"]); ?></strong>
                                    </div>
                                </td>
                                <td><?php echo ($pro["number"]); ?></td>
                                <td>&yen;<?php echo ($pro["price"]); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /table-responsive -->

                <table class="table invoice-total">
                    <tbody>
                    <tr>
                        <td><strong>总价：</strong>
                        </td>
                        <td>&yen;<?php echo ($order["price"]); ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/Public/Admin/js/content.min.js?v=1.0.0"></script>
</body>

</html>