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
                    <h5>商品列表 > <small>修改商品</small></h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品名称</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="pid" value="<?php echo ($product["pid"]); ?>">
                                <input type="text" class="form-control" name="name" value="<?php echo ($product["pname"]); ?>" readonly>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品类型</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="types" value="<?php echo ($product["tid"]); ?>">
                                    <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option value="<?php echo ($t["tid"]); ?>"><?php echo ($t["tname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品详情</label>
                            <div class="col-sm-10">
                                <textarea id="editor_id" name="content" style="width:100%;height:300px;"><?php echo ($product["note"]); ?></textarea>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品图片</label>
                            <div class="col-sm-10">
                                <img src="<?php echo ($product["photoaddress"]); ?>" width="100px">
                                <input type="file" class="form-control" name="upFile">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品价格</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price" value="<?php echo ($product["price"]); ?>">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" id="change">保存内容</button>
                                <button class="btn btn-white" id="cancel" type="button">取消</button>
                            </div>
                        </div>
                    </form>
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

        $('#change').click(function () {
            let pid = $('input[name=pid]').val();
            let tid = $('select[name=types] option:selected').val();
            editor.sync();
            let note = $('textarea[name=content]').val();
            let File = $('input[name=upFile]')[0].files[0];
            let price = $('input[name=price]').val();
            let data = new FormData();
            data.append('pid',pid);
            data.append('types',tid);
            data.append('note',note);
            data.append('upFile', File);
            data.append('Price',price);

            $.ajax({
                url:"<?php echo U('Admin/Product/modAction');?>",
                type:"POST",
                processData:false,
                contentType: false,
                // data:{"name":name,"types":tid,"note":note,"upFile":upFile,"Price":price,"isShow":isShow,"Recommend":Recommend},
                data:data,
                success:function (msg) {
                    if(msg){
                        alert('修改成功！');
                        window.location.href="<?php echo U('Admin/Product/index');?>";
                    }else{
                        alert('修改失败！');
                    }
                },
                error:function (msg) {
                    alert(msg);
                }

            })
        });
    });


</script>