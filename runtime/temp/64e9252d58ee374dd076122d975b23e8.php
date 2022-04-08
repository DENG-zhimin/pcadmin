<?php /*a:3:{s:66:"/var/www/html/compmgmt/application/padmin/view/index/computer.html";i:1649386007;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
	/*弹出层按钮样式*/
	.layui-layer-btna {
		width: 120px;
		margin: 0px 15px;
	}
	.layui-layer-btn .layui-layer-btn0 {
		background-color: rgb(255, 255, 255);
		color: rgb(51, 51, 51);
		border-color: rgb(222, 222, 222);
	}
	.layui-layer-btn .layui-layer-btn1{
		background-color: #1E90FF;
		color: rgb(255, 255, 255);
		border-color: rgb(0, 150, 136);
	}
	
	#content {
		width: 100%;
		min-height: 180px;
	}
	.title{
		font-size: 16px;
	}
	.title:hover{
		cursor: pointer;
	}
	.layui-btn-sm{
		padding: 0px 5px;
		margin:3px !important;
	}
	
	#access{
		width: 200px;
		margin: 10px auto;
		display: none;
		border: solid 1px gainsboro;
	}
	.ia-item{
		/* display: inline-block; */
		border: aliceblue solid 1px;
		border-radius: 3px;
		padding: 3px;
		width:  150px;
		margin: 10px;
	}
	#ia-box button{
		width: 90%;
		margin-top: 15px;
	}
</style>
<div style="padding: 15px;">

	<div id="sch-box" class="layui-row layui-col-space12">
		<div class="layui-col-md4">
			<span onclick="detail(0)" class="layui-btn layui-btn-normal">新增</span>
		</div>
		<div class="layui-col-md8">
			<form action="#" onsubmit="return false">
				<input  id="keyword"  placeholder="可按部门名称，职员名称，电脑名称，mac地址等搜索">
				<button onclick="loadInfo($('#keyword').val())" class="layui-btn layui-btn-normal" style="margin-left: 15px;">搜索</button>
			</form>
		</div>
	</div>

	<div class="layui-row">
		<div class="grid-demo">
			<table id="infoList" class="layui-table" lay-filter="infoList"></table>
		</div>
	</div>
<style>#edit-box{padding: 30px;}</style>
	
<div id="access" >
	<p style="text-align: center;"><h3label id="comp-name"></h3></p>
	<hr>
	<form action="post" method="POST" onsubmit="return false;" action="#" id="ia-box">
		<?php if(is_array($internetAccess) || $internetAccess instanceof \think\Collection || $internetAccess instanceof \think\Paginator): $i = 0; $__LIST__ = $internetAccess;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ia): $mod = ($i % 2 );++$i;?>
			<div class="ia-item">
				<input type="checkbox" name="ia<?php echo htmlentities($ia['id']); ?>" id="ia<?php echo htmlentities($ia['id']); ?>" value="<?php echo htmlentities($ia['id']); ?>"  >
				<label for="ia<?php echo htmlentities($ia['id']); ?>"><?php echo htmlentities($ia['name']); ?></label>
			</div>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		<div style="text-align: center; margin: 10px;">
			<input type="hidden" id='id' name="computer_id">
			<button type="submit" lay-submit lay-filter="iaSubmit" class="layui-btn layui-btn-normal">保存</button>
		</div>
</form>



</div>
	
	
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
	loadInfo();

	function loadInfo () {
    eleKw = document.getElementById('keyword')
    const keyword = eleKw.value
	  layui.use(['table', 'form','layer'], function () {
	      var $ = layui.$
	          , admin = layui.admin
	          , view = layui.view
	          , table = layui.table
	          , form = layui.form;
	      var table = layui.table;
		
			table.render({
				elem: '#infoList'
				, method: "get"
				, url: "<?php echo MyUrl('padmin/index/getCompList'); ?>" //数据接口
				, page: true //开启分页
				,limit: 20
				,where: { 'keyword': keyword}
				, response: {
					statusCode: '200' //重新规定成功的状态码为 200，table 组件默认为 0
					,count:'total'
				}
				, cellMinWidth: 80
				, parseData: function (res) { //将原始数据解析成 table 组件所规定的数据
					// console.log(res);
          if (res.keywords.hasOwnProperty('keyword')){
          eleKw.value = res.keywords.keyword
          }
				}
				, cols: [[ //表头
					  {field: 'id', title: 'ID', sort: true,width:65}
          ,{field:'department',title:'部門',sort:true,width:85}
          ,{field: 'staff', title: '职員',templet:function(d){
							return "<span class='title' style='color:blue;' lay-event='staffInfo' >" + d.staff+ "</span>";
					}}
					// ,{field:'staff',title:'职員',sort:true,width:85}
					// , {field: 'user_account', title: '登录账户',width:120}
          , {field: 'FQDN', title: '电脑名称',sort:true,width:150}
					, {field: 'ip_addr_v4', title: 'IPv4地址',sort:true,width:150}
					, {field: 'os', title: '操作系统',sort:true}
					, {field: 'status', title: '状态',sort:true,
            templet: function(d) {
              if (d.status == 1) { 
                return "使用中";
              } else if (d.status == 0) {
                return "闲置中";
              } else if (d.status == -1) {
                return "已报废";
              }
            }
          }
					// , {field: 'main_unit', title: '主机',sort:true,width:120}
					,{field: 'opt', title: '操作', align: 'center', width: 190,
						templet:function(_value)
						{
							var _html = "";
							_html += '<span class="layui-btn layui-btn-sm layui-btn-normal" lay-event="detail">详情</span>';
							_html += '<span class="layui-btn layui-btn-sm layui-btn-info" lay-event="soft">软件</span>';
							_html += '<span class="layui-btn layui-btn-sm layui-btn-warm" lay-event="access">联网</span>';
							_html += '<span class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del">删除</span>';
							return _html;
						}
					}
				]]
			}); //end of table.render
      
	    table.on('tool(infoList)',function(obj){
	    	var data = obj.data;
	    	var action = obj.event;	//event = lay-event
	    	switch(action){
	    		case 'detail':
	    			detail(data);
          break;
          case 'staffInfo':
            staffInfo(data)
            break
          case 'access':
              access(data);
              break;
          case 'del':
            layer.confirm('确认要删除吗？'
              , {btn:['确认','取消']}
              ,function(){
                //确认
                del(data);
              }
              ,function(){
                //取消
              }

            )
            break;
          case 'soft':
            soft(data);
            break;
        }
	    });

		soft = function(d)
		{
			id = d? d.id:0;
			var ud = layer.open({
				type:2
				,area:['90%','95%']
				,closeBtn:1
				,title:'软件详情'
				,shade:0.6
				,anim:2
				,content: "<?php echo MyUrl('padmin/index/computerSoft'); ?>"  + "?computerId=" + id
				,id:"one"
				,offset: 'auto'
				,btnAlign: 'c'
				,yes: function(){
					layer.closeAll();
				}
				,success:function()
				{
					
				}
				,end:function()
				{
				}  
			});		//end of layer.open
		} //end of soft function
			
		detail = function(d){
			id = d? d.id:0;        
			var ud = layer.open({
				type:2
				,area:['90%','95%']
				,closeBtn:1
				,title:'電脑详情'
				,shade:0.6
				,anim:2
				,content: "<?php echo MyUrl('padmin/index/computerInfo'); ?>"  + "?id=" + id + "&departmentId=" + d.department_id
				,id:"one"
				,offset: 'auto'
				,btnAlign: 'c'
				,yes: function(){
					layer.closeAll();
				}
				,success:function()
				{
					
				}
				,end:function()
				{
				}  
			});		//end of layer.open
		}	//end of detail function.

		access = function(d){
			id = d? d.id:0;        
			var ud = layer.open({
				type:1
				,area:['35%','52%']
				,closeBtn:1
				,title:'網絡权限'
				,shade:0.6
				,anim:2
				,content:  $("#access")
				,id:"one"
				,offset: 'auto'
				,btnAlign: 'c'
				,yes: function(){
					layer.closeAll();
				}
				,success:function()
				{
					$("#comp-name").html(d.computer_name);
					$("#id").val(d.id);
					$("#ia-box input[type='checkbox']").prop('checked',false);
					if(d['ia'].length>0)
					{
						d.ia.forEach(function(elem,index,arr){
							$("#ia"+elem).prop('checked',true);
							
						});
						// d.ia.forEach(element => {
						// 	$("#ia"+element).prop('checked',true);
						// 	console.log(element);
						// });
					}
				}
				,end:function()
				{
				}  
			});		//end of layer.open
		}	//end of  function.

		staffInfo = function(d){
      // console.log(d)
			var id = d? d.staff_id:0;        
			var ud = layer.open({
				type:2
				,area:['90%','90%']
				,closeBtn:1
				,title:'員工信息'
				,shade:0.6
				,anim:2
				,content: "<?php echo MyUrl('padmin/index/staffInfo'); ?>"  + "?id=" + id
				,id:"one"
				,offset: 'auto'
				,btnAlign: 'c'
				,yes: function(){
					layer.closeAll();
				}
				,success:function()
				{
					// console.log('succ')
				}
				,end:function()
				{
				}  
			});		//end of layer.open
		}	//end of detail function.


		form.on("submit(iaSubmit)",function(obj){
			var data=$("#ia-box").serialize();
			var load = layer.load(2, {shade: [0.3,'#fff']});	//等待图标
			$.ajax({
				url:"<?php echo MyUrl('padmin/index/updateComputerInternetAccess'); ?>",
				cache:false,
				type:"POST",
				dataType:"json",
				data: data,
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
						layer.closeAll();
						loadInfo(); //
					}
					else
					{
						layer.msg(response.msg,{icon: 2});
					}
				}
			}); 
		})

		//删除
		del = function(d){
			var load = layer.load(2, {shade: [0.3,'#fff']});	//等待图标
			$.ajax({
				url:"<?php echo MyUrl('padmin/index/delComputer'); ?>",
				cache:false,
				type:"POST",
				dataType:"json",
				data: {'id': d.id},
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
						document.location.reload();
					}
					else
					{
						layer.msg(response.msg,{icon: 2});
					}
				}
			}); //end of ajax
		}		//end of del function

	  });			//end of layui.user
		
	}



		

	
</script>