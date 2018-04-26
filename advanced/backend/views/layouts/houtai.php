<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

use yii\helpers\Url;
use yii\widgets\LinkPager;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="skin/default/skin.css" rel="stylesheet" type="text/css" id="skin" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css" rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script> 
<title>店铺管理</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script type="text/javascript" src="js/PIE/PIE_IE678.js"></script>
 <![endif]-->
<body>
 <div class="Sellerber" id="Sellerber">
 <!--顶部-->
  <div class="Sellerber_header apex clearfix" id="Sellerber_header">
   <div class="l_f logo header"><img src="images/logo_03.png" /></div>
   <div class="r_f Columns_top clearfix header">
   <!--<div class="time_style l_f"><i class="fa  fa-clock-o"></i><span id="time"></span></div>-->
      <div class="search_style l_f">
        <form action="#" method="get" class="sidebar_form">
		 <div class="input-group">
			<input type="text" name="q" class="form-control"><span class="input-group-btn"><a class="btn_flat" href="javascript:" onclick=""><i class="fa fa-search"></i></a></span>
		 </div>
        </form>
     </div>
   <div class="news l_f "><a href="#" class="fa fa-bell Notice prompt" id="promptbtn"></a><em>5</em></div>
     <div class="administrator l_f">
       <img src="images/avatar.png"  width="36px"/><span class="user-info">欢迎你,超级管理员</span><i class="glyph-icon fa  fa-caret-down"></i>
       <ul class="dropdown-menu">
        <li><a href="#"><i class="fa fa-user"></i>个人信息</a></li>
        <li><a href="#"><i class="fa fa-cog"></i>系统设置</a></li>
        <li><a href="javascript:void(0)" id="Exit_system"><i class="fa fa-user-times"></i>退出</a></li>
       </ul>
     </div> 
   </div>
  </div>
  <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div>
    <div class="menu_style" id="menu_style">
    <div class="list_content">
    <!--栏目切换-->
    <div class="switch_style">
    	<em class="fa fa-th-large switch"></em>
    	<em class="fa fa-list switch_unfold"></em>
    </div>
    <div class="skin_select clearfix">
      <ul class="dropdown-menu dropdown-caret clearfix">
         <li><a class="colorpick-btn selected" href="javascript:void(0)" data-val="default"  id="default" style="background-color:#222A2D" ></a></li>
         <li><a class="colorpick-btn" href="javascript:void(0)" data-val="blue" style="background-color:#438EB9;" ></a></li>
         <li><a class="colorpick-btn" href="javascript:void(0)" data-val="green" style="background-color:#72B63F;" ></a></li>
         <li><a class="colorpick-btn" href="javascript:void(0)" data-val="gray" style="background-color:#41a2ff;" ></a></li>
         <li><a class="colorpick-btn" href="javascript:void(0)" data-val="red" style="background-color:#FF6868;" ></a></li>
         <li><a class="colorpick-btn" href="javascript:void(0)" data-val="purple" style="background-color:#6F036B;" ></a></li>
        </ul>     
     </div>
 <!--左侧菜单栏目-->  
     <div class="column_list" >
		 <ul class="menuUl menu_list" id="column_list"> 	
		 </ul>
	 </div> 
    </div>
  </div>
 </div>
<!--内容-->
  <?= $content ?>
<!--底部-->
  <div class="Sellerber_bottom info" id="bottom">
  <span class="l_f">版权所有：南京版石软件系统有限公司</span>
  </div>
  <!--消息提示板块内容-->
<div class="prompt_style prompt">
	<div class="prompt_title">通知消息</div>
	<div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-volume-up icon_prompt label-success"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-warning"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="" class=""><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理，点击查看详细</a>
    </div>
    <div class="prompt_info clearfix submenu">
	  <div class="tz_title">订单消息（5）</div>
	  <a href="javascript:void()" class="" name="Personal_info.html" title="订单消息"><i class="fa fa-user icon_prompt label-danger"></i>你有订单还没有处理请及时处理</a>
    </div>
  </div> 
 </div>
</body>
</html>
<script type="text/javascript">
	var data =[
   
    {
		 id:2,
		 pid:0,
		 url:"http://www.baidu.com",
		 icon:'fa fa-desktop',
		 name:'商品管理',
    },
    
   
    
    {
		 id:8,
		 pid:0,
		 url:"http://www.baidu.com",
		 icon:'fa fa-user',
		 name:'会员管理',	  
    },
  
	
		{
		  id:26,
		  pid:8,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['vip/addvip']) ?>',
		  name:'会员列表',

	},
	{
		 id:26,
		 pid:1,
		 icon:'fa fa-angle-double-right',
		 url:'index.html',
		 name:'首页',

  },
	{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['product/index']) ?>',
		  name:'添加商品',

	},
	{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['product/attr_list']) ?>',
		  name:'商品属性名展示',

	},
	{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['product/sku_add']) ?>',
		  name:'商品属性名添加',

	},
		{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['product/add_type']) ?>',
		  name:'类型添加',

	},
		{
		  id:34,
		  pid:2,
		  icon:'fa fa-angle-double-right',
		  url:'<?php echo Url::to(['product/good_list']) ?>',
		  name:'商品展示',

	},
	{
		 id:35,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'<?php echo Url::to(['brand/index']) ?>',
		 name:'品牌管理',

  },
	{
		 id:36,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'<?php echo Url::to(['adver/select']) ?>',
		 name:'商品分类添加',

	},
	{
		 id:36,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'<?php echo Url::to(['adver/add']) ?>',
		 name:'商品分类',

	},
	{
		 id:37,
		 pid:12,
		 icon:'fa fa-angle-double-right',
		 url:'Columns.html',
		 name:'栏目管理',

	},{
		 id:38,
		 pid:9,
		 icon:'fa fa-angle-double-right',
		 url:'',
		 name:'访问统计',

	},{
		 id:39,
		 pid:9,
		 icon:'fa fa-angle-double-right',
		 url:'',
		 name:'业绩统计',

	},
	
		{
		 id:45,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'admin_Competence.html',
		 name:'权限设置',

	},{
		 id:46,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'Order_form.html',
		 name:'订单管理',

	},{
		 id:47,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'Refund.html',
		 name:'退款管理',

	},{
		 id:54,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'administrator_list.html',
		 name:'管理员设置',

	},{
		 id:55,
		 pid:7,
		 icon:'fa fa-angle-double-right',
		 url:'Personal_info.html',
		 name:'管理员信息',

	},
		{
		 id:56,
		 pid:2,
		 icon:'fa fa-angle-double-right',
		 url:'Products.html',
		 name:'分类管理',

	},
	{
		  id:37,
		  pid:3,
		  icon:'fa fa-angle-double-right',
		  url:'Order.html',
		  name:'交易统计',

	},
	{
		 id:38,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'Brand_Manage.html',
		 name:'订单处理',

  },
	{
		 id:39,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'Order_Logistics.html',
		 name:'物流管理',

	},
	{
		 id:40,
		 pid:3,
		 icon:'fa fa-angle-double-right',
		 url:'Order_Chart.html',
		 name:'订单统计（全国图）',

	},

	{
		 id:41,
		 pid:4,
		 icon:'fa fa-angle-double-right',
		 url:'payment_method.html',
		 name:'支付管理',

  },
	{
		 id:42,
		 pid:4,
		 icon:'fa fa-angle-double-right',
		 url:'Payment_Configure.html',
		 name:'支付配置',

	},{
		 id:43,
		 pid:10,
		 icon:'fa fa-angle-double-right',
		 url:'Advertising_list.html',
		 name:'广告列表',

	},
		{
		 id:44,
		 pid:10,
		 icon:'fa fa-angle-double-right',
		 url:'Advertising_sort.html',
		 name:'广告分类',

	},{
		 id:45,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'system_columns.html',
		 name:'栏目设置',

	},
		{
		 id:46,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'form_builder.html',
		 name:'自定页面',

	},
		{
		 id:46,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'system_info.html',
		 name:'系统设置',

	},
		{
		 id:47,
		 pid:5,
		 icon:'fa fa-angle-double-right',
		 url:'rizhi_list.html',
		 name:'系统日志',

	},{
		 id:48,
		 pid:13,
		 icon:'fa fa-angle-double-right',
		 url:'feedback.html',
		 name:'留言反馈',

	},{
		 id:49,
		 pid:13,
		 icon:'fa fa-angle-double-right',
		 url:'Notice.html',
		 name:'消息通知',

	},
		
	{
		 id:55,
		 pid:6,
		 icon:'fa fa-angle-double-right',
		 url:'Article_list.html',
		 name:'文章列表',

	}]
//设置框架
 $(function() { 	 
	 $("#Sellerber").frame({
		float : 'left',//设置菜单栏目方向属性
		minStatue:true,//切换模式
		hheight:70,//设置顶部高度 高度为0时自动样式切换（达到另外一种界面效果）
		bheight:30,//设置底部高度
		mwidth:200,//菜单栏宽度（最好不要改动该数值，一般200的宽度值最好）
		switchwidth:50,//切换菜单栏目宽度
		color_btn:'.skin_select',//设置颜色
		menu_nav:'.menu_list',//设置栏目属性
		column_list:'.column_list',//设置栏目名称
		time:'.date_time',//设置时间属性(不填写不显示)
		logo_img:'images/logo_01.png',//logo地址链接（当header为0时显示该属性）
	    Sellerber_content:'.Sellerber_content',//右侧名称
		Sellerber_menu:'.list_content', //左侧栏目
		header:'.Sellerber_header',//顶部栏目	
		prompt:'.prompt_style',
		prompt_btn:'#promptbtn',//点击事件
		data:data,//数据
		mouIconOpen:"fa fa-angle-down",// 菜单(展开)图标
	    mouIconClose:"fa fa-angle-up" , // 菜单（隐藏）图标
		Rightclick:true//是否禁用右键
	 }); 
});
$('#Exit_system').on('click', function(){
      layer.confirm('是否确定退出系统？', {
     btn: ['是','否'] ,//按钮
	 icon:2,
    }, 
	function(){
	  location.href="login.html";  
    });
});
</script>
