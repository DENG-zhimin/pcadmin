<?php /*a:3:{s:71:"/var/www/html/compmgmt/application/padmin/view/index/maintain_info.html";i:1585368682;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
    .sub-box{
        border:gainsboro 1px solid;
        padding: 5px;
        margin: 5px;
    }
    .layui-input-inline{width: 290px !important;}
    .layui-form-item{
        margin-bottom: 8px;
    }
    .inner-frame{
        width: 850px;
    }
</style>
<div style="padding: 15px; display:block;" class="inner-frame" >
 

    <form class="layui-form" action="#" method="post" onsubmit="return false;"  id="info-box">
        <div id="main-info" class="sub-box">
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">申请部门</label>
                    <div class="layui-input-inline">
                    <select id="department" name="department_id" lay-search lay-filter="dpt">
                        <option value=""></option>
                    </select>
                    </div>
                </div>
                <div class="layui-form-inline"> 
                    <label class="layui-form-label">电脑名称</label>
                    <div class="layui-input-inline">
                        <select id="computer" name="computer_id" lay-search="" >
                            <option value=""></option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="layui-form-item">

                <div class="layui-form-inline">
                    <label class="layui-form-label">申请人</label>
                    <div class="layui-input-inline">
                        <input type="text" name="applicant"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-inline">
                    <label class="layui-form-label">申请单＃</label>
                    <div class="layui-input-inline">
                    <input type="text" name="app_bill_number"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">部门批准</label>
                    <div class="layui-input-inline">
                    <input type="text" name="department_approver"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">批准时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="department_approve_time" id="department_approve_time" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">经理批准</label>
                    <div class="layui-input-inline">
                    <input type="text" name="approve_manager"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">批准时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="manager_approve_time" id="manager_approve_time"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">申请时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="app_time" id="app_time"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">维护时间</label>
                    <div class="layui-input-inline">
                        <input type="text" name="maintain_time" id="maintain_time"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">维护结果</label>
                    <div class="layui-input-inline">
                        <input type="text" name="maintain_result"   placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">维修用時</label>
                    <div class="layui-input-inline">
                    <input type="text" name="time_used"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">

                <label class="layui-form-label">申报信息</label>
                <div class="layui-input-block">
                  <input type="text" name="app_info"  autocomplete="off" placeholder="" class="layui-input">
                </div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">检查原因</label>
                    <div class="layui-input-block">
                        <input type="text" name="checked_reason" id="bought_at" autocomplete="off" class="layui-input">
                    </div>
            </div>

            <div class="layui-form-item">

                <label class="layui-form-label">维护详情</label>
                <div class="layui-input-block">
                  <textarea type="text" name="maintain_detail"  autocomplete="off"  style="height: 50px; max-width: 100%;" class="layui-input"></textarea>
                </div>

            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">使用材料</label>
                    <div class="layui-input-block">
                        <input type="text" name="material_used"  autocomplete="off" class="layui-input">
                    </div>
            </div>
            
        </div>
        <!-- end of main info -->
    
       
        
        <div style="text-align: center;">
            <input type="hidden" id="id" name="id" value="<?php echo htmlentities($id); ?>" >
            <button class="layui-btn layui-btn-normal" style="width: 150px;" id="submit" lay-submit lay-filter='submitBtn'>保存</button>
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

layui.use(["form",'laydate'],function(){
    form = layui.form;
    laydate=layui.laydate;

    form.render();
    laydate.render({
        type : 'datetime' //格式
        ,format: 'yyyy-MM-dd HH:mm:ss'
        ,elem: '#manager_approve_time'
    });
    laydate.render({
        elem: '#department_approve_time'
        ,type : 'datetime'  //格式
        ,format : 'yyyy-MM-dd HH:mm:ss'
    });
    laydate.render({
        elem: '#maintain_time'
        ,type : 'datetime' //格式
        ,format : 'yyyy-MM-dd HH:mm:ss'
    });
    laydate.render({
        elem: '#app_time'
        ,type : 'datetime' //格式
        ,format : 'yyyy-MM-dd HH:mm:ss'
    });
    getDptList(); //必须先加载部门信息,后加载职员信息,不可反了.
    
    //判断是编辑信息还是新增
    if("<?php echo $id; ?>" != 0) { 
        getCompList("<?php echo $department_id; ?>");
        setTimeout(function(){
            getMaintainInfo()

        },500);
        };
    
    
    function getCompList(dptId)
    {
        var load = layer.load(2, {shade: [0.3,'#fff']});
        $("#computer").empty();
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/getCompList'); ?>",
                cache:false,
                type:"GET",
                data:{'department_id':dptId},
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
                        _html +=  "<option value=''></option>";
                        d.forEach(function(elem) {
                            _html +=  "<option value=" + elem.id + ">" + elem.FQDN + "</option>";
                        });                                                
                        $("#computer").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
    }

    function getDptList()
    {
        var load = layer.load(2, {shade: [0.3,'#fff']});
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/loaddptlist'); ?>",
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
                        d.forEach(function(elem) {
                            _html +=  "<option value=" + elem.id + ">" + elem.name + "</option>";
                        });                                                
                        $("#department").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
    }

    function getMaintainInfo(){
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/getMaintainInfo'); ?>",
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
                            $("input[name='"+key+"']").val(d[key])
                            $("select[name='"+key+"']").val(d[key])
                            $("textarea[name='"+key+"']").val(d[key])
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

    form.on("select(dpt)",function(obj){
        getCompList(obj.value);
    })

    //提交按钮
    form.on("submit(submitBtn)",function(obj){
        data=$("#info-box").serialize();
        $("#submit").addClass('disabled');
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/saveMaintainInfo'); ?>",
                cache:false,
                type:"POST",
                dataType:"json",
                data:data,
                error:function(XMLHttpRequest, textStatus, errorThrown)
                {
                    $("#submit").removeClass('disabled');
                    layer.close(load);
                    layer.msg("网络异常，请稍后再试！");
                },
                success:function(response)
                {
                    layer.close(load);
                    $("#submit").removeClass('disabled');
                    if( response.code == 200)
                    {
                        layer.msg(response.msg);
                        setTimeout(function(){
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