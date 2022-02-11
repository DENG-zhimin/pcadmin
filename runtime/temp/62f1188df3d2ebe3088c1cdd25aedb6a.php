<?php /*a:3:{s:71:"/var/www/html/compmgmt/application/padmin/view/index/software_info.html";i:1585022087;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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





<div style="padding: 15px; display:block;" >
    <h2>
        软件信息
    </h2>
    <hr />

    <form class="layui-form" action="#" method="post" onsubmit="return false;"  id="info-box">
        

        <div class="layui-form-item">
            <label class="layui-form-label">类别</label>
            <div class="layui-input-block">
              <select id="category" name="category_id" lay-verify="required">
                <option value=""></option>
              </select>
            </div>
          </div>

          <div class="layui-form-item">
            <label class="layui-form-label">名称</label>
            <div class="layui-input-block">
                <input type="text" id="name" name="name" placeholder="名称" class="layui-input"  />
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">版本</label>
            <div class="layui-input-block">
                <input type="text" id="version" name="version" placeholder="版本" class="layui-input"  />
            </div>
        </div>

          <div class="layui-form-item">
            <label class="layui-form-label">架构</label>
            <div class="layui-input-block">
              <input type="radio" name="arch" value="x86" title="x86" checked id="1">
              <input type="radio" name="arch" value="x64" title="x64" id="2">
            </div>
          </div>
        
        
        <div class="layui-form-item">
            <label class="layui-form-label">厂商</label>
            <div class="layui-input-block">
                <input type="text"  name="manufacturer"  class="layui-input"  />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
                <input type="text" name="brand"  class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">网址</label>
            <div class="layui-input-block">
                <input type="text" name="website"  class="layui-input" />
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
                <input type="text" name="remarks"  class="layui-input" />
            </div>
        </div>

        </div>
        <div style="text-align: center;">
            <input type="hidden" id="id" name="id" >
            <button class="layui-btn layui-btn-normal" style="width: 150px;" lay-submit lay-filter='submitBtn'>保存</button>
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

layui.use(["form"],function(){
    form = layui.form;
    form.render();

    getSoftwareCategory(); //获取软件分类信息

    //判断是编辑信息还是新增
    if("<?php echo $id; ?>" != 0) { 
        setTimeout(function()  {
            getInfo();
        }, 500);
        };
    

    function getSoftwareCategory()
    {
        var load = layer.load(2, {shade: [0.3,'#fff']});
        $("#category").empty();
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/getSoftwareCategory'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                // data:{"id":"<?php echo $id; ?>"},
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
                        _html = '';
                        d.forEach(function(elem ) {
                            _html +=  "<option value=" + elem.id + ">" + elem.chinese_name + "</option>";
                        });                                                
                        $("#category").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
    }



    function getInfo(){
                
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/getSoftwareInfo'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                data:{"id":"<?php echo $id; ?>"},
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
                        keys = Object.keys(d)
                        keys.forEach(function(key){
                             $("input[type!='radio'][name='"+key+"']").val(d[key])
                            $("select[name='"+key+"']").val(d[key])
                        })
                        // $("input[name='arch'][value='"+d['arch'] +"']").attr('checked',true);
                        arch = $("input[name='arch'][value='"+d['arch'] +"']");
                        arch.attr('checked','checked')
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
    }

    //提交按钮
    form.on("submit(submitBtn)",function(obj){
        data=$("#info-box").serialize();
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/saveSoftware'); ?>",
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