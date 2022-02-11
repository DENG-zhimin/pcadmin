<?php /*a:4:{s:63:"/var/www/html/compmgmt/application/padmin/view/index/index.html";i:1584611142;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:68:"/var/www/html/compmgmt/application/padmin/view/public/leftmenu2.html";i:1617848143;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <title>AOI IT資信管理</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="renderer" content="webkit">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <!--<link rel="shortcut icon" href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/css/img/favicon.ico" />-->

    <!-- css -->
    <!--<link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/css/bootstrap.min.css" rel="stylesheet" />-->
    <link rel="stylesheet" href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/common/lib/layui/css/layui.css"  media="all">
    <!--<link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/css/fancybox/jquery.fancybox.css" rel="stylesheet">
    <link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/css/jcarousel.css" rel="stylesheet" />
    <link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/css/flexslider.css" rel="stylesheet" />
    <link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/owl-carousel/owl.carousel.css" rel="stylesheet">-->
    <link href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/padmin/css/style.css" rel="stylesheet" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->  


</head>
<body>




<link rel="stylesheet" href="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/common/layui/css/admin.css" media="all">


<!--<body class="layui-layout-body">-->

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="https://dev.web.sscrm.com" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
            </ul>

            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;">
                        <cite><?php echo htmlentities($PAdmin['username']); ?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd layadmin-event="logout" style="text-align: center;"><a href="<?php echo MyUrl('/padmin/adminlogin/logout'); ?>">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>
			<!--左侧菜单-->        
			
<!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo" lay-href="<?php echo MyUrl('padmin/index/computer'); ?>">
                    <span>AOI IT資信管理</span>
                </div>

                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
                    <li data-name="home" class="layui-nav-item">
                        <a href="javascript:;" lay-tips="系统设置" lay-direction="2">
                            <i class="layui-icon layui-icon-home"></i>
                            <cite>基本信息</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <!-- <dd class="layui-this">
                                <a lay-href="home/console.html">基本配置</a>
                            </dd> -->
                            <?php if(in_array(session('PAdmin.username'), ['admin', 'it02'])): ?>
                            <dd>
                                <a lay-href="<?php echo MyUrl('padmin/index/webSiteAdmin'); ?>">管理员</a>
                            </dd>
                            <?php endif; ?>
                            <dd>
                                <a lay-href="<?php echo MyUrl('padmin/index/department'); ?>">部门管理</a>
                            </dd>
                            
                            <dd>
                                <a lay-href="<?php echo MyUrl('padmin/index/staff'); ?>">员工</a>
                            </dd>
                            <dd>
                                <a lay-href="<?php echo MyUrl('padmin/index/software'); ?>">软件</a>
                            </dd>
                           <!-- <dd>
                                <a lay-href="<?php echo MyUrl('portal', 'login', 'loginout'); ?>">退出</a>
                            </dd>-->
                        </dl>
                    </li>
                    <li data-name="nav" class="layui-nav-item  layui-nav-itemed">
                        <a href="javascript:;" lay-tips="资产管理" lay-direction="2">
                            <i class="layui-icon layui-icon-template"></i>
                            <cite>资产管理</cite>
                        </a> 
                        <dl class="layui-nav-child layui-this">
                            <dd><a lay-href="<?php echo MyUrl('padmin/index/computer'); ?>">电脑管理</a></dd>
                        </dl>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="<?php echo MyUrl('padmin/index/printer'); ?>">打印机管理</a></dd>
                        </dl>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="<?php echo MyUrl('padmin/index/maintain'); ?>">维护管理</a></dd>
                        </dl>
                    </li>
                    
                </ul>
            </div>
        </div>
        

        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                    <li class="layui-nav-item" lay-unselect>
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein">
                            <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <!-- <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li> -->
                    <li lay-id="<?php echo MyUrl('padmin/index/computer'); ?>" lay-attr="<?php echo MyUrl('padmin/index/computer'); ?>" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                </ul>
            </div>
        </div>


        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <!-- <iframe src="<?php echo MyUrl('padmin/index/panel'); ?>" frameborder="0" class="layadmin-iframe" style="height: 100%; width: 100%;"></iframe> -->
                <iframe src="<?php echo MyUrl('padmin/index/computer'); ?>" frameborder="0" class="layadmin-iframe" style="height: 100%; width: 100%;"></iframe>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<!--&lt;!&ndash; footer start &ndash;&gt;-->

<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->


<!--<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.js"></script>-->
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/common/lib/jquery/jquery-2.1.0.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/common/lib/layui/layui.js" charset="utf-8"></script>
<!--<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/basic.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.easing.1.3.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/bootstrap.min.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.fancybox.pack.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.fancybox-media.js"></script> 
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/portfolio/jquery.quicksand.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/portfolio/setting.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/jquery.flexisel.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/animate.js"></script>
<script src="<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/portal/js/custom.js"></script>-->

<script>
layui.use('element', function(){
  var element = layui.element; //导航的hover效果、二级菜单等功能，需要依赖element模块
  
  //监听导航点击
//element.on('nav(demo)', function(elem){
//  //console.log(elem)
//  layer.msg(elem.text());
//});
});
</script>

</body>
</html>





<!--&lt;!&ndash; footer end &ndash;&gt;-->

<script>
    layui.config({
        base: '<?php echo htmlentities(__MY_ROOT_PUBLIC__); ?>static/common/layui/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use('index');
</script>

<!-- 百度统计 -->
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?d214947968792b839fd669a4decaaffc";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>
<!--</body>-->


