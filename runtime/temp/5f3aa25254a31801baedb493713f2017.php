<?php /*a:3:{s:71:"/var/www/html/compmgmt/application/padmin/view/index/computer_info.html";i:1621419961;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
<div style="padding: 5px; display:block;" class="inner-frame" >
 

    <form class="layui-form" action="#" method="post" onsubmit="return false;"  id="info-box">
        <div id="main-info" class="sub-box">
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">所属部门</label>
                    <div class="layui-input-inline">
                    <select id="department" name="department_id" lay-search lay-filter="dpt">
                        <option value=""></option>
                    </select>
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">资产編號</label>
                    <div class="layui-input-inline">
                    <input type="text" name="asset_id"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>

            </div>

            <div class="layui-form-item">

                <div class="layui-form-inline">
                    <label class="layui-form-label">职員</label>
                    <div class="layui-input-inline">
                        <select id="staff" name="staff_id" lay-search="" >
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">登录賬户</label>
                    <div class="layui-input-inline">
                    <input type="text" name="user_account"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">类型</label>
                    <div class="layui-input-inline">
                        <select id="type" name="type" >
                            <option value="台式机">台式机</option>
                            <option value="笔记本">笔记本</option>
                            <option value="一体机">一体机</option>
                            <option value="微型电脑">微型电脑</option>
                            <option value="服务器">服务器</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">操作系统</label>
                    <div class="layui-input-inline">
                        <select id="os" name="os_id" lay-search="">
                            <option value=""></option>
                         </select>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">主機</label>
                    <div class="layui-input-inline">
                    <input type="text" name="main_unit"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">顕示器</label>
                    <div class="layui-input-inline">
                    <input type="text" name="monitor"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">鼠标</label>
                    <div class="layui-input-inline">
                    <input type="text" name="mouse"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">键盘</label>
                    <div class="layui-input-inline">
                    <input type="text" name="keyboard"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">安装位置</label>
                    <div class="layui-input-inline">
                    <input type="text" name="install_place"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">购买日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="bought_at" id="bought_at" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            <div class="layui-form-item">
             
                  <label class="layui-form-label">备注</label>
                  <div class="layui-input-block" style="margin-right: 15px;">
                  <textarea type="text" name="remarks"  placeholder="" autocomplete="off" class="layui-input"> </textarea>
                  </div>
             
            
          </div>

        </div>
        <!-- end of main info -->
    
        <div id="feature" class="sub-box">
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">CPU</label>
                    <div class="layui-input-inline">
                    <input type="text" name="cpu"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">内存</label>
                    <div class="layui-input-inline">
                    <input type="text" name="memory"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">硬盘</label>
                    <div class="layui-input-inline">
                    <input type="text" name="hd"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">显卡</label>
                    <div class="layui-input-inline">
                    <input type="text" name="graphic_card"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

        </div> 
        <!-- end of feature-->
        <div id="network" class="sub-box">
            
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">FQDN</label>
                    <div class="layui-input-inline">
                    <input type="text" name="FQDN"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">MAC</label>
                    <div class="layui-input-inline">
                    <input type="text" name="MAC"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
                        
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">域名</label>
                    <div class="layui-input-inline">
                    <input type="text" name="domain_name"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">林名</label>
                    <div class="layui-input-inline">
                    <input type="text" name="forest_name"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">IPv4地址</label>
                    <div class="layui-input-inline">
                    <input type="text" name="ip_addr_v4"  placeholder="192.168.0.100/24" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">IPv4網関</label>
                    <div class="layui-input-inline">
                    <input type="text" name="gate_way_v4"  placeholder="192.168.0.1" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
            
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">IPv6地址</label>
                    <div class="layui-input-inline">
                    <input type="text" name="ip_addr_v6"  placeholder="::0" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">IPv6網関</label>
                    <div class="layui-input-inline">
                    <input type="text" name="gate_way_v6"  placeholder="::1" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>
        </div>
        <!-- end of network -->

        
        <div style="text-align: center;">
            <input type="hidden" id="id" name="id" value="<?php echo htmlentities($computerId); ?>" >
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

layui.use(["form",'laydate'],function(){
    form = layui.form;
    laydate=layui.laydate;

    form.render();
    laydate.render({
        elem: '#bought_at'
    });
    getDptList(); //必须先加载部门信息,后加载职员信息,不可反了.
    getOsList();    //获取OS列表

    //判断是编辑信息还是新增
    if("<?php echo $computerId; ?>" != 0) { 
        getStaffList("<?php echo $departmentId; ?>");
        setTimeout(function(){
            getCompInfo()

        },500);
        };
    

    function getDptList()
    {
        var load = layer.load(2, {shade: [0.3,'#fff']});
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/loaddptlist'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                // data:{"id":"<?php echo $computerId; ?>"},
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

    function getOsList()
    {
        var load = layer.load(2, {shade: [0.3,'#fff']});
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/getOsList'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                // data:{"id":"<?php echo $computerId; ?>"},
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
                        d.forEach(function(elem,index,arr){
                            _html +=  "<option value=" + elem.id + ">" + elem.name + "</option>";
                        });                                                
                        $("#os").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
    }

function getStaffList(dptId)
{
    $("#staff").empty();
    var load = layer.load(2, {shade: [0.3,'#fff']});
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/getDptStaff'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                data:{"dptId": dptId},
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
                        d.forEach(function(elem,index,arr) {
                            _html +=  "<option value=" + elem.id + ">" + elem.name + "</option>";
                        });                                                
                        $("#staff").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
}


    function getCompInfo(){
                
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/getCompInfo'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                data:{"id":"<?php echo $computerId; ?>"},
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
                            $("textarea[name='" + key + "']").val(d[key])
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
        getStaffList(obj.value);
    })

    //提交按钮
    form.on("submit(submitBtn)",function(obj){
        data=$("#info-box").serialize();
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/saveComputerInfo'); ?>",
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
                        setTimeout(function(){
                            window.parent.layer.closeAll();
                            window.parent.loadInfo();
                            // window.parent.location.reload();
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