<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>H+ 后台主题UI框架 - 基本表单</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link rel="shortcut icon" href="../favicon.ico"> <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">

</head>

<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>商品列表 > <small>添加商品</small></h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" action="<?php echo U('Admin/Product/addProduct');?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品类型</label>
                            <div class="col-sm-10">
                                <select class="form-control m-b" name="types" value="0">
                                    <option value="0">请选择</option>
                                    <?php if(is_array($types)): $i = 0; $__LIST__ = $types;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?><option value="<?php echo ($t["tid"]); ?>"><?php echo ($t["tname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品详情</label>
                            <div class="col-sm-10">
                                <textarea id="editor_id" name="content" style="width:100%;height:300px;"></textarea>
                            </div>
                        </div>

                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品图片</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="upFile">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">商品价格</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="price">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否显示</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="0" name="isShow">
                                <span class="help-block m-b-none">0为不显示，1位显示，默认为0</span>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否推荐</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="0" name="Recommend">
                                <span class="help-block m-b-none">0为不推荐，1位推荐，默认为0</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-primary" type="button" id="save">保存内容</button>
                                <button class="btn btn-white" type="button" id="cancel">取消</button>
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
    function addAction() {
        let name = $('input[name=name]').val();

        if(name==null || name==''){
            alert('商品名不能为空！');
            return false;
        }
    }

    $(function () {
        $('#cancel').click(function () {
            window.location.href="<?php echo U('Admin/Product/index');?>";
        });

        $('#save').click(function () {
            addAction();
            let name = $('input[name=name]').val();
            let tid = $('select[name=types] option:selected').val();
            editor.sync();
            let note = $('textarea[name=content]').val();
            let File = $('input[name=upFile]')[0].files[0];
            let price = $('input[name=price]').val();
            let isShow = $('input[name=isShow]').val();
            let Recommend = $('input[name=Recommend]').val();
            let data = new FormData();
            data.append('name',name);
            data.append('types',tid);
            data.append('note',note);
            data.append('upFile', File);
            data.append('Price',price);
            data.append('isShow',isShow);
            data.append('Recommend',Recommend);

            $.ajax({
                url:"<?php echo U('Admin/Product/addProduct');?>",
                type:"POST",
                processData:false,
                contentType: false,
                // data:{"name":name,"types":tid,"note":note,"upFile":upFile,"Price":price,"isShow":isShow,"Recommend":Recommend},
                data:data,
                success:function (msg) {
                    if(msg){
                        alert('添加成功！');
                        window.location.href="<?php echo U('Admin/Product/index');?>";
                    }else{
                        alert('该商品已存在！');
                        $('input[name=name]').val('');
                    }
                },
                error:function (msg) {
                    alert(msg);
                }

            })
        });
    });
</script>