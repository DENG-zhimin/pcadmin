<?php /*a:3:{s:68:"/var/www/html/compmgmt/application/padmin/view/index/department.html";i:1585096919;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
	body{
		overflow-x:hidden;
	}
	#info-box .layui-btn {
		margin: 30px auto;
	}
</style>
<div style="padding: 15px;">
	<fieldset class="layui-elem-field layui-field-title">
		<legend>部门管理</legend>
	</fieldset>

	<div class="layui-row layui-col-space10">

		<!--<div class="layui-col-md4">
			<div class="layui-input-black" style="width: 100%">
				<input type="text" id="keyword" placeholder="输入信息查询" class="layui-input">
			</div>
		</div>-->
		<div class="layui-col-md4">
			<button onclick="openInfo();" class="layui-btn" lay-event="add">创建部门</button>
			<!-- <button onclick="reload()" class="layui-btn layui-btn-normal">刷新</button> -->
		</div>
	</div>

	<div class="layui-row">
		<div class="grid-demo">
			<table id="listInfo" class="layui-table" lay-filter="listInfo"></table>
		</div>
	</div>


</div>

<div style="padding: 15px; display: none;" id="info-box" >
	
	<form class="layui-form" action="#" method="post" onsubmit="return false;">
		<div class="layui-form-item">
			<label class="layui-form-label">部门名称</label>
			<div class="layui-input-block">
				<input type="text" id="name" name="name" placeholder="名称" class="layui-input" lay-verify="required" />
			</div>
		</div>
		<div style="text-align: center;">
			<input type="hidden" name="id" value="" id="id">
			<button class="layui-btn layui-btn-normal" lay-submit lay-filter='submitBtn'>提交</button>
		</div>
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
	var dptName='';
	layui.use('form',function(){
		var form=layui.form;
		form.on('submit(submitBtn)',function(obj){
			var data=obj.field;
			
			if(data.id != ''){
				//名称修改
				if(dptName == data.name){
					//名称未修改
					layer.msg('名称未修改')
				} 				
			} 
			var load = layer.load(2, {shade: [0.3,'#fff']});  //显示等待图标
			$.ajax({
					url:"<?php echo MyUrl('padmin/index/dptSave'); ?>",
					cache:false,
					type:"POST",
					dataType:"json",
					data:{id:data.id,name:data.name},
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
							//提示信息
							layer.msg(response.msg,{icon: 1});

							//定时刷新页面
							setTimeout(function(){reload()},1000)
						}
						else
						{
							layer.msg(response.msg,{icon: 2});
						}
					}
			});
		});
			// 	var body = layui.layer.getChildFrame('form', index);
			// 	body.find("#submit").click();
			// 	return false;
			// }
	});

	function load_info()
	{

		layui.use(['table','form'], function(){
			var table = layui.table;
			var form = layui.form;

			table.render({
				elem: '#listInfo'   //表单实例化的元素
				,url:"<?php echo MyUrl('padmin/index/loaddptlist'); ?>"  //请求地址
				,page:true      //分页是否开启    //非默认false
				,limit:20
				,where: {
					//传递的参数
				}
				,cellMinWidth: 80
				,response:{
					statusCode:200
					,countName: 'count' //数据总数的字段名称，默认：count
					,dataName: 'data' //数据列表的字段名称，默认：data

				}
				,done:function(res){
					console.log(res);
				}
				//表单
				,cols: [[
					{field:'id',title: 'ID', sort: true, align:'center',width:100}
					,{field:'name' , title: '部门名称', align:'center'}
				
					,{field: 'opt', title: '操作', width:200,align: 'center',
						templet:function(_value)
						{
							var _html = "";
							_html += '<span class="layui-btn layui-btn-sm" lay-event="edit">编辑</span>';
							_html += '<span class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del">删除</span>';
							return _html;
						}
					}
				]]
			});


			//表格事件监听-lay-event
			table.on('tool(listInfo)', function(obj){

				var data = obj.data;
				if(obj.event === 'edit')
				{
					//修改操作
					openInfo(data);
				}
				else if(obj.event === 'del')
				{
					layer.confirm('真的删除吗？', function(index)
					{
						//删除操作
						del(data.id);
					});
				}

			});

		});
	}

	//初始化加载
	load_info();   

	//刷新页面
	function reload()
	{
		window.location.reload();
	}

	//删除操作
	function del(id)
	{
		//加载读取特效
		var load = layer.load(2, {shade: [0.3,'#fff']});
		$.ajax({
			url:"<?php echo MyUrl('padmin/index/dptDel'); ?>",
			cache:false,
			type:"POST",
			dataType:"json",
			data:{id:id},
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
					//提示信息
					layer.msg(response.msg,{icon: 1});

					//定时刷新页面
					setTimeout(function(){reload()},1000)
				}
				else
				{
					layer.msg(response.msg,{icon: 2});
				}
			}
		});

		//关闭读取特效
		// layer.close(index);
	}

	function openInfo(data){
		data == undefined ? title = "新建部门" : title = "编辑部门";
		var index =  layer.open({

			type:1
			,area:['50%','50%']
			,title:title
			,shade:0.6
			,anim:2
			,content: $("#info-box")
			// ,btn: ['关闭','保存']
			,id:"one"
			,offset: 'auto'
			,btnAlign: 'c'
			,shade: 0
			,yes: function(){
				layer.closeAll();
			}
			// ,btn2: function(){
			// 	var body = layui.layer.getChildFrame('form', index);
			// 	body.find("#submit").click();
			// 	return false;
			// }
			,success:function()
			{
				if (data != undefined) {

					$("#name").val(data.name);
					$("#id").val(data.id);
					dptName = data.name;    //原部门名称,用于判断部门名称是否修改.
				}
			}
			,end:function(){
				$("#name").val('');
				$("#id").val('');
			}
		});
	}

	//切换时间
	function formatUnixtimestamp (unixtimestamp){
		var unixtimestamp = new Date(unixtimestamp*1000);
		var year = 1900 + unixtimestamp.getYear();
		var month = "0" + (unixtimestamp.getMonth() + 1);
		var date = "0" + unixtimestamp.getDate();
		var hour = "0" + unixtimestamp.getHours();
		var minute = "0" + unixtimestamp.getMinutes();
		var second = "0" + unixtimestamp.getSeconds();
		return year + "-" + month.substring(month.length-2, month.length)  + "-" + date.substring(date.length-2, date.length)
				+ " " + hour.substring(hour.length-2, hour.length) + ":"
				+ minute.substring(minute.length-2, minute.length) + ":"
				+ second.substring(second.length-2, second.length);
	}

</script>