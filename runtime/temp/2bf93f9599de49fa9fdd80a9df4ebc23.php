<?php /*a:3:{s:70:"/var/www/html/compmgmt/application/padmin/view/index/websiteadmin.html";i:1584776074;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
	.layui-layer-btn .layui-layer-btn0 {
    border-color:  gray;
    background-color:  #fff;
    color: #000;
	}
	.layui-layer-btn .layui-layer-btn1 {
    border-color: #1E9FFF;
    background-color: #1E9FFF;
    color: #fff;
	}
</style>
<div style="padding: 15px;">
	<fieldset class="layui-elem-field layui-field-title">
		<legend><?php echo htmlentities($title); ?></legend>
	</fieldset>

	<div class="layui-row layui-col-space10">

		<!--<div class="layui-col-md4">
			<div class="layui-input-black" style="width: 100%">
				<input type="text" id="keyword" placeholder="输入信息查询" class="layui-input">
			</div>
		</div>-->
		<div class="layui-col-md4">
			<button onclick="saveInfo();" class="layui-btn" lay-event="add">创建管理员</button>
			<button onclick="reload()" class="layui-btn layui-btn-normal">刷新</button>
		</div>
	</div>

	<div class="layui-row">
		<div class="grid-demo">
			<table id="listInfo" class="layui-table" lay-filter="listInfo"></table>
		</div>
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
	function load_info()
	{

		layui.use(['table','form'], function(){
			var table = layui.table;
			var form = layui.form;

			table.render({
				elem: '#listInfo'   //表单实例化的元素
				,url:"<?php echo MyUrl('padmin/index/websiteadminloadinfo'); ?>"  //请求地址
				,page:true      //分页是否开启    //非默认false
				,where: {
					//传递的参数
				}
				,cellMinWidth: 80
				,response:{
					countName: 'count' //数据总数的字段名称，默认：count
					,dataName: 'data' //数据列表的字段名称，默认：data

				}
				,done:function(res){
					console.log(res);
				}
				//表单
				,cols: [[
					{field:'id',width:"6%", title: 'ID', sort: true, align:'center'}
					,{field:'username' , title: '管理员名称', align:'center'}
					,{field:'status' , title: '状态', align:'center',
						templet:function(_value)
						{
							if(_value.isfounder == 0){
								if (_value.status == 0)
								{
									return '<span class="layui-btn layui-btn-sm" lay-event="changeState">启用</span>'
								}
								else
								{
									return '<span class="layui-btn layui-btn-sm layui-btn-danger" lay-event="changeState">禁用</span>';
								}
						    }else{
								   return '';
							}
						}
					}
					/*,{field:'add_time' , title: '添加时间', align:'center',
						templet:function(_value)
						{
							return formatUnixtimestamp(_value.add_time);
						}
					}*/
					,{field: 'opt', title: '操作', width:200,align: 'center',
						templet:function(_value)
						{
							var _html = "";
							_html += '<span class="layui-btn layui-btn-sm" lay-event="edit">编辑</span>';
							if(_value.isfounder == 0){_html += '<span class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del">删除</span>';}
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
					saveInfo(data);
				}
				else if(obj.event === 'del')
				{
					layer.confirm('真的删除吗？', function(index)
					{
						//删除操作
						del(data.id);
					});
				}
				else if (obj.event == 'changeState')
				{
					var value = data.status == 1 ? 0 : 1;

					//状态切换
					changeState(data.id,'status',value);
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
			url:"<?php echo MyUrl('padmin/index/websiteadminDel'); ?>",
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

				if( response.code == 0)
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
		layer.close(index);
	}

	function changeState(id , type, value){

		var load = layer.load(2, {shade: [0.3,'#fff']});

		$.ajax({
			url:"<?php echo MyUrl('padmin/index/websiteadminStatus'); ?>",
			cache:false,
			type:"POST",
			dataType:"json",
			data:{id:id,type:type,value:value},
			error:function(XMLHttpRequest, textStatus, errorThrown)
			{
				layer.close(load);
				layer.msg("网络异常，请稍后再试！");
			},
			success:function(response)
			{
				//关闭读取特效
				layer.close(load);

				if( response.code == 0)
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
	}

	function saveInfo(data){
		data == undefined ? title = "新建管理员" : title = "编辑管理员";
		var index =  layer.open({

			type:2
			,area:['50%','50%']
			,title:title
			,shade:0.6
			,anim:2
			,content: "<?php echo MyUrl('padmin/index/websiteadminSaveInfo'); ?>"
			,btn: ['关闭','保存']
			,id:"one"
			,offset: 'auto'
			,btnAlign: 'c'
			,shade: 0
			,yes: function(){
				layer.closeAll();
			}
			,btn2: function(){
				var body = layui.layer.getChildFrame('form', index);
				body.find("#submit").click();
				return false;
			}
			,success:function()
			{

				if (data != undefined) {
//					console.log(data);
					var body = layui.layer.getChildFrame('form', index);console.log(data)
					for (var k in data)
					{
						//表单赋值
						var obj = body.find('[name='+k+']');
						var tag = obj.prop('tagName');
						console.log(tag)

						//根据标签类型进行数据赋值
						if (tag == 'INPUT')
						{
							var type = obj.attr('type');
							if (type == 'text' || type == 'hidden')
							{
								obj.val(data[k]);
							}
							else if (type == 'radio')
							{
								obj.find('[value=0]').attr('checked',true);
								obj.each(function(a){
									var value = $(this).val();
									if (value == data[k])
									{
										$(this).attr('checked',true);
									}
								})
							}
							else if(type == 'checkbox')
							{
								if (data[k] == '1')
								{
									obj.attr('checked',true);
								}
							}
						}
						else if(tag == 'TEXTAREA')
						{
							obj.val(data[k]);
						}else{
							obj.val(data[k]);
						}
					}
					/*body.find('#thumb1 img').attr('src',data.thumb);
					//封面图赋值
					if(data.thumb) {
						var thumb = '<img width="100" height="100" class="layui-upload-img" src="' + data.thumb + '" >';
						body.find('#thumb1').append(thumb);
					}
					//多图赋值
					for (var i = 0;i < data.thumbs.length;i++)
					{
						body.find('#thumbs2').append("<div class='thumbs_img'><img src='"+data.thumbs[i]+"' width='100' height='100'><span class='thumbs_del'>删除</span></div>");
						body.find('#thumbs2').after('<input class=\'thumbs\' type="hidden" name="thumbs[]"  value="'+data.thumbs[i]+'" >')
					}*/

				}

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