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
                        <table id="exampleTableEvents" data-height="450" data-mobile-responsive="true">
                            <thead>
                            <tr>
                                <th data-field="id">ID</th>
                                <th data-field="name">会员名</th>
                                <th data-field="sex">用户性别</th>
                                <th data-field="phone">手机号</th>
                                <th data-field="photo">头像地址</th>
                                <th data-field="email">邮箱</th>
                                <th data-field="address">收货地址</th>
                                <th data-field="cardID">卡均编号</th>
                            </tr>
                            </thead>

                            <!--会员循环-->
                            <?php if(is_array($userInfo)): $i = 0; $__LIST__ = $userInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$u): $mod = ($i % 2 );++$i;?><tr>
                                <td data-field="id"><?php echo ($u["id"]); ?></td>
                                <td data-field="name"><?php echo ($u["uid"]); ?></td>
                                <td data-field="sex"><?php echo ($u["sex"]); ?></td>
                                <td data-field="phone"><?php echo ($u["phone"]); ?></td>
                                <td data-field="photo"><?php echo ($u["photoaddress"]); ?></td>
                                <td data-field="email"><?php echo ($u["email"]); ?></td>
                                <td data-field="address"><?php echo ($u["addressids"]); ?></td>
                                <td data-field="cardID"><?php echo ($u["cardids"]); ?></td>
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