<?php /*a:3:{s:70:"/var/www/html/compmgmt/application/padmin/view/index/printer_info.html";i:1585021774;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
    .network_attr{
        display: none;
    }
</style>
<div style="padding: 15px; display:block;" >
 

    <form class="layui-form" action="#" method="post" onsubmit="return false;"  id="info-box">
        <div id="main-info" class="sub-box">
            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">资产編號</label>
                    <div class="layui-input-inline">
                    <input type="text" name="asset_number"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">名称</label>
                    <div class="layui-input-inline">
                    <input type="text" name="name"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">品牌</label>
                    <div class="layui-input-inline">
                    <input type="text" name="brand"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">型號</label>
                    <div class="layui-input-inline">
                    <input type="text" name="model"  placeholder="" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">类型</label>
                    <div class="layui-input-inline">
                        <select id="type" name="type" >
                            <option value="静電打印機">静電打印機</option>
                            <option value="喷墨打印機">喷墨打印機</option>
                            <option value="针式打印機">针式打印機</option>
                            <option value="激光打印機">激光打印機</option>
                            <option value="標簽打印機">標簽打印機</option>
                            <option value="热敏打印機">热敏打印機</option>
                            <option value="其它打印機">其它打印機</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">彩色打印</label>
                    <div class="layui-input-inline">
                        <select id="color_printer" name="color_printer" >
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">所属部門</label>
                    <div class="layui-input-inline">
                        <select id="department" name="department_id" lay-search lay-filter='department'>
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline">
                    <label class="layui-form-label">管理职員</label>
                    <div class="layui-input-inline">
                        <select id="staff" name="assigned_staff_id" lay-search>
                            <option value="0">无</option>
                            <?php if(!empty($staffs)): if(is_array($staffs) || $staffs instanceof \think\Collection || $staffs instanceof \think\Paginator): $i = 0; $__LIST__ = $staffs;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$s): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($s['id']); ?>"><?php echo htmlentities($s['name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">公司资产</label>
                    <div class="layui-input-inline">
                        <select id="asset" name="company_asset" lay-filter="asset" >
                            <option value="1">是</option>
                            <option value="0">否</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline" id="b-date">
                    <label class="layui-form-label">购买日期</label>
                    <div class="layui-input-inline">
                        <input type="text" name="bought_at" id="bought_at" autocomplete="off" class="layui-input">
                    </div>
                </div>
            </div>


            <div class="layui-form-item">
                <div class="layui-form-inline">
                    <label class="layui-form-label">網絡打印</label>
                    <div class="layui-input-inline">
                        <select  name="network_printer" lay-filter="network" >
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                    </div>
                </div>
                <div class="layui-form-inline" id="computer">
                    <label class="layui-form-label">安装电脑</label>
                    <div class="layui-input-inline">
                        <select  name="installed_computer_id"  id="computer_option">
                            <option value="0">无</option>
                            <?php if(!empty($computers)): if(is_array($computers) || $computers instanceof \think\Collection || $computers instanceof \think\Paginator): $i = 0; $__LIST__ = $computers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$c): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo htmlentities($c['id']); ?>"><?php echo htmlentities($c['FQDN']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                </div>
            </div>


            <div class="network_attr">

                <div class="layui-form-item">
                    <div class="layui-form-inline">
                        <label class="layui-form-label">網絡名</label>
                        <div class="layui-input-inline">
                        <input type="text" name="netbios"  placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-inline">
                        <label class="layui-form-label">IPv4地址</label>
                        <div class="layui-input-inline">
                        <input type="text" name="ipaddr_v4"  placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <div class="layui-form-inline">
                        <label class="layui-form-label">管理賬户</label>
                        <div class="layui-input-inline">
                        <input type="text" name="admin_name"  placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-inline">
                        <label class="layui-form-label">密码</label>
                        <div class="layui-input-inline">
                        <input type="text" name="admin_password"  placeholder="" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                </div>
            </div>
            
          
        </div>
        <!-- end of main info -->
    
     

        
        <div style="text-align: center;">
            <input type="hidden" id="id" name="id" value="<?php echo htmlentities($id); ?>" >
            <button class="layui-btn layui-btn-normal" style="width: 150px; margin-top: 20px;" lay-submit lay-filter='submitBtn'>保存</button>
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
   
    //判断是编辑信息还是新增
    if("<?php echo $id; ?>" != 0) { 
        
        setTimeout(function(){
            getPrinterInfo()

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


function getComputerList(dptId)
{
    $("#staff").empty();
    var load = layer.load(2, {shade: [0.3,'#fff']});
    $("#computer_option").empty();
        $.ajax({
                url:"<?php echo MyUrl('padmin/index/getCompList'); ?>",
                cache:false,
                type:"GET",
                dataType:"json",
                data:{"department_id": dptId},
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
                        d.forEach(function(elem ) {
                            _html +=  "<option value='" + elem.id + "'>" + elem.FQDN + "</option>";
                        });                                                
                        
                        $("#computer_option").append(_html);
                        form.render();
                    }
                    else
                    {
                        layer.msg(response.msg,{icon: 2});
                    }
                }
            });
}


    function getPrinterInfo(){
                
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/getPrinterInfo'); ?>",
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
                        d = response.data[0];
                        keys = Object.keys(d)
                        keys.forEach(function(key){
                            $("input[name='"+key+"']").val(d[key])
                            $("select[name='"+key+"']").val(d[key])
                        })
                        if(d.network_printer==1)
                        {
                            $(".network_attr").css('display','block');
                            $("#computer").css('display','none');
                        }
                        
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
                            d.forEach(function(elem ) {
                                _html +=  "<option value=" + elem.id + ">" + elem.name + "</option>";
                            });                                                
                            $("#staff").empty();
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


    form.on("select(department)",function(obj){
        getStaffList(obj.value);
        getComputerList(obj.value);
    })

    form.on("select(network)",function(obj){
        if(obj.value == 0)
        {
            $(".network_attr").css('display','none');
            $("#computer").css('display','block');
            $(".network_attr input").val('');
        } else {
            $(".network_attr").css('display','block');
            $("#computer").css('display','none');
            $("#computer").val(0);
        }
    })

    form.on("select(asset)",function(obj){
        if(obj.value==0)
        {
            $("#b-date").css('display','none');
            $("input[name='bought_at']").val('');
        } else {
            $("#b-date").css('display','block');
        }
    })
    //提交按钮
    form.on("submit(submitBtn)",function(obj){
        data=$("#info-box").serialize();
        var load = layer.load(2, {shade: [0.3,'#fff']});
            $.ajax({
                url:"<?php echo MyUrl('padmin/index/savePrinter'); ?>",
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