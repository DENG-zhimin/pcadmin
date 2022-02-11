<?php /*a:3:{s:80:"/var/www/html/compmgmt/application/padmin/view/index/websiteadmin_save_info.html";i:1566000642;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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




<style>
    #edui1{
        width: 500px;
    }
    .body{
        width: 80%;
        margin:0 auto;
    }
    .check:hover{
        color: red;
        text-decoration:underline ;
    }
    .thumbs_img{ float: left; width: 100px; height: 110px; margin-right: 10px;}
    .thumbs_img .thumbs_del{ cursor: pointer;}
</style>
<!-- 自定义菜单排序 -->

<div class="body">
    <form class="layui-form layui-form-pane" style="margin-top: 30px">

        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text"  id='username' name="username" lay-verify="required" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
                <input type="text"  name="pwds" placeholder="不填则不修改密码"  class="layui-input">
            </div>
        </div>

        <div class="layui-form-item" style="display:none;">
            <label class="layui-form-label">是否启用</label>
            <div class="layui-input-block">
                <input type="radio" name="status" value="0" title="启用" checked="">
                <input type="radio" name="status" value="1" title="禁用">
            </div>
        </div>


        <div class="layui-form-item" style="width: 93.5%">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo" id="submit" style="display: none">立即提交</button>
            </div>
        </div>
        <input type="hidden" id="id" name="id" value="0">
    </form>
</div>


<!-- footer start -->

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





<!-- footer end -->
<script>


    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate;

        //创建一个编辑器
      //  var editIndex = layedit.build('content');

        form.on('submit(formDemo)', function(data){
            //加载读取特效
            var load = layer.load(2, {shade: [0.3,'#fff']});
            //AJAX提交
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/websiteadminSave'); ?>",
                cache:false,
                type:"POST",
                dataType:"json",
                data:data.field,
                error:function(XMLHttpRequest, textStatus, errorThrown)
                {
                    layer.close(load);
                    parent.layer.msg("网络异常，请稍后再试！");
                },
                success:function(response)
                {
                    layer.close(load);
                    if( response.code == 0)
                    {

                        layer.msg(response.msg,{icon: 1});

                        //关闭窗口，并刷新父级页面
                        var index = parent.layer.getFrameIndex(window.name);
                        setTimeout(function(){parent.layer.close(index); parent.reload();}, 1000);
                    }
                    else
                    {
                        parent.layer.msg(response.msg,{icon: 2});
                    }
                }
            });
            return false;
        });

        setTimeout(function(){
            form.render()
        },200)

    });

</script>
