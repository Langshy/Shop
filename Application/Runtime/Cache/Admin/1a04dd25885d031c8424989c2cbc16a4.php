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
                    <h4 class="example-title">库存管理</h4>
                    <table id="exampleTableEvents" data-height="550" data-mobile-responsive="true">
                        <thead>
                        <tr>
                            <th data-field="id">ID</th>
                            <th data-field="name">商品名</th>
                            <th data-field="type">类型</th>
                            <th data-field="number" width="160px">库存</th>
                        </tr>
                        </thead>

                        <!--商品循环-->
                        <?php if(is_array($invent)): $i = 0; $__LIST__ = $invent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><tr>
                                <td data-field="id"><?php echo ($in["pid"]); ?></td>
                                <td data-field="name"><?php echo ($in["pname"]); ?></td>
                                <td data-field="type"><?php echo ($in["tname"]); ?></td>
                                <td data-field="number">
                                    <form onsubmit="return changeSort(this)">
                                        <input type="hidden" value="<?php echo ($in["pid"]); ?>">
                                        <input type="text" value="<?php echo ($in["number"]); ?>">
                                    </form>
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
<script>
    function changeSort(e) {
        let id = e.firstElementChild.value;
        let number = e.lastElementChild.value;
        $.post(
            "<?php echo U('Admin/Inventory/changeNumber');?>",
            {id:id,number:number},
            function (msg) {
                if(msg){
                    location.reload();
                }else {
                    alert("请联系系统管理员！");
                }
            }
        );
        return false;
    }
</script>