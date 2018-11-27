<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>类型添加</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="../favicon.ico"> <link href="/YFShop/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/YFShop/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/YFShop/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/YFShop/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/YFShop/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
    <link href="/YFShop/Public/Admin/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="/YFShop/Public/Admin/js/plugins/sweetalert/sweetalert.min.js"></script>
</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品分类 > <small>添加商品类别</small></h5>
                </div>
                <div class="ibox-content">
                    <form method="get" class="form-horizontal">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">类型名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="typename">
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="0" name="isshow">
                                <span class="help-block m-b-none">0为显示，1位显示，默认为0</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="sort">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary add" type="button">保存内容</button>
                                <button class="btn btn-white cancel" type="button">取消</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/YFShop/Public/Admin/js/jquery-3.3.1.js"></script>
<script src="/YFShop/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/YFShop/Public/Admin/js/content.min.js?v=1.0.0"></script>
<script src="/YFShop/Public/Admin/js/plugins/iCheck/icheck.min.js"></script>

<script>
    $(document).ready(function(){$(".i-checks").iCheck({checkboxClass:"icheckbox_square-green",radioClass:"iradio_square-green",})});
</script>
</body>

</html>
<script type="text/javascript">
    $(function () {
       $('.add').on('click',function () {
               swal({
                   title:"您确定要添加这个类别吗",
                   type:"warning",
                   showCancelButton:true,
                   confirmButtonColor:"#DD6B55",
                   confirmButtonText:"是的，我要添加！",
                   cancelButtonText:"让我再考虑一下",
                   closeOnConfirm:false,closeOnCancel:false
                   },function(isConfirm){
                   if(isConfirm){
                        let type = $('input[name=typename]').val();
                        let isshow = $('input[name=isshow]').val();
                        let sort = $('input[name=sort]').val();

                        if(type==null || type==''){
                            swal("错误","类型名称不能为空！","error");
                            return;
                        }else {
                            $.ajax({
                                url:"<?php echo U('Admin/ProductType/addAction');?>",
                                type:'POST',
                                dataType:"json",
                                data:{"type":type,"isshow":isshow,"sort":sort},
                                success:function (msg) {
                                    if(msg.result){
                                        swal({
                                            title:"添加成功！",
                                            type:"success",
                                            showCancelButton:false,
                                            confirmButtonText:"好的！",
                                        },function (isConfirm) {
                                            window.location.href="<?php echo U('Admin/ProductType/index');?>";
                                        })
                                    }else {
                                        swal("添加失败！","该商品类型已存在。","error")
                                    }
                                }
                            });
                        }
                   }else{
                       swal("已取消","您取消了添加操作！","error")
                   }
               })
           });
       
       $('.cancel').click(function () {
           window.location.href="<?php echo U('Admin/ProductType/index');?>"
       });
    });
</script>