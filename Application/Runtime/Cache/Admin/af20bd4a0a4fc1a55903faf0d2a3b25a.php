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
                    <h4 class="example-title">商品分类</h4>
                    <div class="example">
                        <div class="btn-group hidden-xs" id="exampleTableEventsToolbar" role="group">
                            <button type="button" class="btn btn-outline btn-default add" title="添加">
                                <i class="glyphicon glyphicon-plus" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default put-up" title="显示">
                                <i class="glyphicon glyphicon-arrow-up" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default put-down" title="不显示">
                                <i class="glyphicon glyphicon-arrow-down" aria-hidden="true"></i>
                            </button>
                            <button type="button" class="btn btn-outline btn-default" id="del" title="删除">
                                <i class="glyphicon glyphicon-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                        <table id="exampleTableEvents" data-height="550" data-mobile-responsive="true">
                            <thead>
                            <tr>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id">ID</th>
                                <th data-field="number" width="10%">排序</th>
                                <th data-field="name" width="20%">类型名称</th>
                                <th data-field="isShow">是否显示</th>>
                            </tr>
                            </thead>

                            <!--商品循环-->

                            <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><tr>
                                    <td data-field="state" data-checkbox="true"></td>
                                    <td data-field="id" class="tid"><?php echo ($t["tid"]); ?></td>
                                    <td data-field="number">
                                        <form onsubmit="return changeSort(this)">
                                            <input type="hidden" value="<?php echo ($t["tid"]); ?>" name="tid">
                                            <input type="text" value="<?php echo ($t["sort"]); ?>" name="sort">
                                        </form>
                                    </td>
                                    <td data-field="name"><?php echo ($t["tname"]); ?></td>
                                    <td data-field="isShow">
                                        <?php if($t["isshow"] == 0): ?><i class="glyphicon glyphicon-arrow-down isShow" aria-hidden="true"></i>
                                            <?php elseif($t["isshow"] == 1): ?>
                                            <i class="glyphicon glyphicon-arrow-up isShow" aria-hidden="true"></i><?php endif; ?>
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
                let tid=$('.selected').find('.tid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                window.location.href="<?php echo U('Admin/ProductType/del');?>?data="+data;
            });
        });

        $('.put-up').click(function () {
            swal({
                title: "您确定要显示这个类别吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "显示",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.tid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                window.location.href="<?php echo U('Admin/ProductType/show');?>?data="+data;
            });
        });

        $('.put-down').click(function () {
            swal({
                title: "您确定要隐藏这个类别吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "隐藏",
                closeOnConfirm: false
            }, function () {
                let tid=$('.selected').find('.tid');
                let data=new Array();
                for(let i=0;i<tid.length;i++){
                    data[i]=tid[i].innerText;
                }
                data=data.join();
                window.location.href="<?php echo U('Admin/ProductType/blank');?>?data="+data;
            });
        });


        $('.add').click(function () {
            window.location.href="<?php echo U('Admin/ProductType/add');?>";
        });
    });

    function changeSort(e) {
        let id = e.firstElementChild.value;
        let sort = e.lastElementChild.value;
        $.post(
            "<?php echo U('Admin/ProductType/changeSort');?>",
            {tid:id,sort:sort},
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