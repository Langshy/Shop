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
                    <h4 class="example-title">商品列表</h4>
                    <div class="example">
                        <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                            <button type="button" class="btn btn-outline btn-default add" title="添加">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default put-up" title="上架">
                                <i class="glyphicon glyphicon-arrow-up" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default put-down" title="下架">
                                <i class="glyphicon glyphicon-arrow-down" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default rcommend-yes" title="推荐">
                                <i class="glyphicon glyphicon-star" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default rcommend-no" title="不推荐">
                                <i class="glyphicon glyphicon-star-empty" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default" id="del" title="删除">
                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                        <table id="exampleTableEvents" data-height="550" data-mobile-responsive="true">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true" width="5%"></th>
                                <th data-field="id" width="10%">ID</th>
                                <th data-field="name" width="15%">商品名</th>
                                <th data-field="type" width="10">类型</th>
                                <th data-field="number" width="5%">库存</th>
                                <th data-field="price" width="10">价格</th>
                                <th data-field="isShow" width="10">是否上架</th>
                                <th data-field="Recommend" width="10">是否推荐</th>
                                <th data-field="option" width="25%">操作</th>
                            </tr>
                            </thead>

                            <!--商品循环-->
                            <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><tr>
                                    <td data-field="state" data-checkbox="true"></td>
                                    <td data-field="id" class="pid"><?php echo ($p["pid"]); ?></td>
                                    <td data-field="name"><?php echo ($p["pname"]); ?></td>
                                    <td data-field="type">
                                        <input type="hidden" value="<?php echo ($p["tid"]); ?>">
                                        <?php echo ($p["tname"]); ?>
                                    </td>
                                    <td data-field="number"><?php echo ($p["number"]); ?></td>
                                    <td data-field="price"><?php echo ($p["price"]); ?></td>
                                    <td data-field="isShow">
                                        <?php if($p["isshow"] == 0): ?><i class="glyphicon glyphicon-arrow-down isShow" aria-hidden="true"></i>
                                            <?php elseif($p["isshow"] == 1): ?>
                                            <i class="glyphicon glyphicon-arrow-up isShow" aria-hidden="true"></i><?php endif; ?>
                                    </td>
                                    <td data-field="Recommend">
                                        <?php if($p["recommend"] == 0): ?><i class="glyphicon glyphicon-star-empty Recommend" aria-hidden="true"></i>
                                            <?php elseif($p["recommend"] == 1): ?>
                                            <i class="glyphicon glyphicon-star Recommend" aria-hidden="true"></i><?php endif; ?>
                                    </td>
                                    <td data-field="option">
                                        <button type="button" class="btn btn-outline btn-default part" title="详情" name="part">
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i>
                                        </button>
                                        <button type="button" class="btn btn-outline btn-default change" title="修改" name="change">
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
        $('#del').click(function () {
            swal({
                title: "您确定要删除这条信息吗",
                text: "删除后将无法恢复，请谨慎操作！",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "删除",
                closeOnConfirm: false
            }, function () {
                $('.selected').remove();
                swal("删除成功！", "您已经永久删除了这条信息。", "success");
            });
        });

        $('.put-up').click(function () {
            swal({
                title: "您确定要上架这些商品吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "上架",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.pid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                console.log(data);
                window.location.href="<?php echo U('Admin/Product/productShow');?>?data="+data;
            });
        });

        $('.put-down').click(function () {
            swal({
                title: "您确定要下架这些商品吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "下架",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.pid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                console.log(data);
                window.location.href="<?php echo U('Admin/Product/productBlank');?>?data="+data;
            });
        });

        $('.rcommend-yes').click(function () {
            swal({
                title: "您确定要推荐这些商品吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "推荐",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.pid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                console.log(data);
                window.location.href="<?php echo U('Admin/Product/getRecommend');?>?data="+data;
            });
        });

        $('.rcommend-no').click(function () {
            swal({
                title: "您确定要撤销推荐这些商品吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "撤销",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.pid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                console.log(data);
                window.location.href="<?php echo U('Admin/Product/getNoRecommend');?>?data="+data;
            });
        });

        $('.add').click(function () {
            window.location.href="<?php echo U('Admin/Product/add');?>";
        });

        $('.change').click(function () {
            let tr = $(this).parent().parent();
            let id = tr.find('.pid').text();
            window.location.href="<?php echo U('Admin/Product/mod');?>?id="+id;
        });

        $('.part').click(function () {
            let tr = $(this).parent().parent();
            let id = tr.find('.pid').text();
            window.location.href="<?php echo U('Admin/Product/part');?>?id="+id;
        });
    });
</script>