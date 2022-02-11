<?php /*a:3:{s:66:"/var/www/html/compmgmt/application/padmin/view/index/maintain.html";i:1585799139;s:65:"/var/www/html/compmgmt/application/padmin/view/public/header.html";i:1585799193;s:65:"/var/www/html/compmgmt/application/padmin/view/public/footer.html";i:1565994208;}*/ ?>
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
	
</style>
<div style="padding: 15px;">

	<div id="sch-box" class="layui-row layui-col-space10">
		<div class="layui-col-md4">
			<span onclick="detail(0)" class="layui-btn layui-btn-normal">新增</span>
		</div>
		<div class="layui-col-md8">
			<form action="#" onsubmit="return false">
				<input  id="keyword"  placeholder="可按电脑名称、申请人名称、申请及维护时间等搜索">
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

	loadInfo('');
	layui.use(['form','layer'],function(){
		form = layui.form; layer=layui.layer;
	});
	

	function loadInfo(keyword){

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
				, response: {
					statusCode: '200' //重新规定成功的状态码为 200，table 组件默认为 0
					,count:'total'
				}
				,limit:20
				,where:{'keyword':keyword}
				, cellMinWidth: 80
				, parseData: function (res) { //将原始数据解析成 table 组件所规定的数据
					console.log(res);
				}
				, url: "<?php echo MyUrl('padmin/index/getMaintainList'); ?>" //数据接口
				, page: true //开启分页
				, cols: [[ //表头
					  {field: 'id', title: 'ID', sort: true,width:60}
					,{field:'department',title:'部門',sort:true,width:80}
					,{field:'applicant',title:'申请人',sort:true,width:90}
					, {field: 'computer', title: '电脑名称', sort:true,templet:function(d){
						return  "<a href='###' lay-event='computer' >" + d.computer + "</a>";
					}}
					, {field: 'app_info', title: '申报信息', sort:true,templet:function(d){
						_html=d.app_info.substring(0,10);
						return _html;
					}}
					, {field: 'app_time', title: '申请时间',width:150,sort:true}
					, {field: 'maintain_time', title: '维护时间',sort:true,width:150}
					, {field: 'maintain_result', title: '结果',sort:true,width:80}
					,{field: 'opt', title: '操作', width:80,align: 'center',
						templet:function(_value)
						{
							var _html = "";
							_html += '<span class="layui-btn layui-btn-sm layui-btn-normal" lay-event="detail">详情</span>';
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
	    		case 'computer':
					_url = "<?php echo MyUrl('padmin/index/computerInfo'); ?>"  + "?id=" + data.computer_id + "&departmentId=" + data.department_id;
	    			computer(_url);
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
	    	}
	    });

		computer = function(url)
		{
			var ud = layer.open({
				type:2
				,area:['90%','95%']
				,closeBtn:1
				,title:'電脑详情'
				,shade:0.6
				,anim:2
				,content: url
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
		}	//end of  function.
		

		detail = function(d){
			id = d? d.id:0;        
			department_id = d? d.department_id:0;        
			// console.log(d); return false;
			var ud = layer.open({
				type:2
				,area:['90%','95%']
				,closeBtn:1
				,title:'维护详情'
				,shade:0.6
				,anim:2
				,content: "<?php echo MyUrl('padmin/index/maintainInfo'); ?>"  + "?id=" + id  +"&department_id=" + department_id
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

		

	  });			//end of layui.user
		
	}



		

	
</script>