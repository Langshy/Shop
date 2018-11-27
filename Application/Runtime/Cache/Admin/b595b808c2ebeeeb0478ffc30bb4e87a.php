<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>商城后台管理</title>
    <!--[if lt IE 8]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="/Public/Admin/img/logo.icon.png">
    <link href="/Public/Admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/Public/Admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/Public/Admin/css/animate.min.css" rel="stylesheet">
    <link href="/Public/Admin/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <!--头像设置-->
                        <span><img alt="image" class="img-circle" src="/Public/Admin/img/profile_small.jpg" /></span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <!--管理员名称-->
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo ($Aname); ?></strong></span>
                                <span class="text-muted text-xs block">超级管理员</span>
                                </span>
                        </a>
                    </div>
                    <div class="logo-element">H+
                    </div>
                </li>

                <li>
                    <a class="J_menuItem" href="<?php echo U('Admin/Index/main');?>">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">后台首页</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">商品管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/Product/index');?>" data-index="0">商品列表</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/Product/add');?>">添加商品</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/ProductType/index');?>">商品分类</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/Inventory/index');?>">库存管理</a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span class="nav-label">会员管理</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/User/index');?>" data-index="0">会员列表</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/Order/index');?>">订单管理</a>
                        </li>
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/ShopCart/index');?>">购物车</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-gear"></i>
                        <span class="nav-label">网站设置</span>
                        <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a class="J_menuItem" href="<?php echo U('Admin/Admin/index');?>" data-index="0">管理员列表</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo U('Admin/Login/loginOut');?>">
                        <i class="fa fa-sign-out"></i>
                        <span class="nav-label">退出</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->

    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe0" width="100%" height="100%" src="<?php echo U('Admin/Index/main');?>" frameborder="0" data-id="index_v2.html" seamless></iframe>
        </div>
        <div class="footer">
            <div class="pull-right">&copy; 2016-2018 <a href="http://www.chenrq.cc" target="_blank">YF商城</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->

</div>
<script src="/Public/Admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/Public/Admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/Public/Admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/Public/Admin/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/Public/Admin/js/plugins/layer/layer.min.js"></script>
<script src="/Public/Admin/js/hplus.min.js?v=4.0.0"></script>
<script type="text/javascript" src="/Public/Admin/js/contabs.min.js"></script>
<script src="/Public/Admin/js/plugins/pace/pace.min.js"></script>
</body>

</html>