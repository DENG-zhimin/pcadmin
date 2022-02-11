<?php /*a:3:{s:71:"/var/www/html/compmgmt/application/padmin/view/index/computer_soft.html";i:1585021447;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
    .info-box{
        border:gainsboro solid 1px;
        padding: 5px 10px;
        margin: 10px;
    }
    .soft-box{
        background-color: aliceblue;
        border:gainsboro solid 1px;
        border-radius: 5px;
        padding:5px;
        margin: 5px;
        width: fit-content;
        display: inline-block;
    }
    .container{
        padding-top: 10px;
    }
    .comp-info{text-align: center;}
    .layui-btn {margin-bottom: 15px;}
</style>

<div class="container" >
    <div class="comp-info">
        <h3 ><?php echo htmlentities($computer['FQDN']); ?>  <?php echo $computer['os_name'] . '-' . $computer['version'] . '_' . $computer['arch']; ?></h3>
    </div>
    <form action="#" method="POST" onsubmit="return false;" id="info-box">
        <?php if(is_array($category) || $category instanceof \think\Collection || $category instanceof \think\Paginator): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
            <div class="info-box" >
                <legend ><?php echo htmlentities($c['chinese_name']); ?></legend> 
                <?php if(isset($c['soft'])): if(is_array($c['soft']) || $c['soft'] instanceof \think\Collection || $c['soft'] instanceof \think\Paginator): $i = 0; $__LIST__ = $c['soft'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
                        <div class="soft-box">
                            <input type="checkbox" id="<?php echo htmlentities($s['id']); ?>" name="<?php echo htmlentities($s['id']); ?>" value="<?php echo htmlentities($s['id']); ?>">
                            <label for="<?php echo htmlentities($s['id']); ?>"> <?php echo htmlentities($s['name'] . '_' . $s['version'] . '_' . $s['arch']); ?> </label>
                        </div>


                    <?php endforeach; endif; else: echo "" ;endif; ?>        
                <?php endif; ?>    
            </div>

        <?php endforeach; endif; else: echo "" ;endif; ?>
    
    <div class="comp-info">
        <input type="hidden" name="computer_id" value="<?php echo htmlentities($computer['id']); ?>">
        <button class="layui-btn layui-btn-sm layui-btn-normal" style="width: 150px;" lay-submit lay-filter='submitBtn'>保存</button>
    </div>
</form>
    
    
</div>



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






<script>
    layui.use('form',function(){
        var form = layui.form;

        getCompSoftMap();
        
        function getCompSoftMap()
        {
                var load = layer.load(2, {shade: [0.3,'#fff']});
                    $.ajax({
                        url:"<?php echo MyUrl('padmin/index/getCompSoftMap'); ?>",
                        cache:false,
                        type:"GET",
                        dataType:"json",
                        data:{"id":"<?php echo htmlentities($computer['id']); ?>"},
                        error:function(XMLHttpRequest, textStatus, errorThrown)
                        {
                            layer.close(load);
                            layer.msg("网络异常，请稍后再试！");
                        },
                        success:function(response)
                        {
                            layer.close(load);
                            if( response.code == 200)
                            {
                                //填入内容
                                d = response.data;
                                // keys = Object.keys(d)
                                d.forEach(function(key){
                                    $("#" + key ).attr('checked','checked');
                                })
                                
                                form.render();
                            }
                            else
                            {
                                layer.msg(response.msg,{icon: 2});
                            }
                        }
                    });
            }

        form.on("submit(submitBtn)",function(obj){
            data=$("#info-box").serialize();
            var load = layer.load(2, {shade: [0.3,'#fff']});
                $.ajax({
                    url:"<?php echo MyUrl('padmin/index/saveComputerSoftware'); ?>",
                    cache:false,
                    type:"POST",
                    dataType:"json",
                    data:data,
                    error:function(XMLHttpRequest, textStatus, errorThrown)
                    {
                        layer.close(load);
                        layer.msg("网络异常，请稍后再试！");
                    },
                    success:function(response)
                    {
                        layer.close(load);
                        if( response.code == 200)
                        {
                            layer.msg(response.msg);
                            setTimeout(function()  {
                                window.parent.layer.closeAll();
                                window.parent.location.reload();
                            }, 1000);
                        }
                        else
                        {
                            layer.msg(response.msg,{icon: 2});
                        }
                    }
                }); //end of ajax
        });     //end of form.on
    })
</script>