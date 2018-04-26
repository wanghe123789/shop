<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="css/shop.css" type="text/css" rel="stylesheet" />
<link href="css/Sellerber.css" type="text/css"  rel="stylesheet" />
<link href="css/bkg_ui.css" type="text/css"  rel="stylesheet" />
<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script src="js/shopFrame.js" type="text/javascript"></script>
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script type="text/javascript" src="js/proTree.js" ></script>
<title>商品管理</title>
</head>
<!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <script src="js/respond.min.js"></script>
  <script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<body>
<div class="margin" id="page_style">
   
 <div class="h_products_list clearfix" id="Sellerber">
   <div class="Sellerber_left menu" id="menuBar">
    <div class="show_btn" id="rightArrow"><span></span></div>
    <div class="side_title"><a title="隐藏" class="close_btn"><span></span></a></div> 
    <div class="menu_style" id="menu_style">
    <div class="list_content">
     <div class="side_list">
        <div class="column_title"><h4 class="lighter smaller">会员等级列表</h4></div>
       <div class="st_tree_style tree">
      </div>
    </div>
  </div>
 </div>
</div>
<div class="bkg_List_style list_Exhibition list_show padding15">
 <div class="bkg_List_operation clearfix searchs_style">
  <!-- <ul class="bkg_List_Button_operation">
   <li class="btn btn-danger"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_add"></em>删除用户</a></li>
   <li class="btn bg-deep-blue"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_modify"></em>修改用户</a></li>
   <li class="btn btn-Dark-success"><a href="javascrpt:void()" class="btn_add"><em class="bkg_List_icon icon_close"></em>关闭用户</a></li>
  </ul> -->
 </div>
  <div class="datalist_show">
 <div class="bkg_List clearfix datatable_height confirm">
  <table class="table  table_list table_striped table-bordered">
   <thead>
  
    <tr>
     
     <th>id</th>
     <th>商品名称</th>
     <th>商品描述</th>
     <th>商品图片</th>
     <th>商品价格 </th>
     <th>状态</th>
      <th>编辑</th>
    </tr>
    
   </thead>
   <tbody>
    <?php foreach ($query as $key => $value): ?>
      
    
    <tr>
     
     <td><?php echo $value['g_id']; ?></td>
     <td><?php echo $value['g_name']; ?></td>
     <td><?php echo $value['g_desc']; ?></td>
     <td><img src="<?php echo $value['g_img']; ?>" alt="" width="100" /></td>
     <td><?php echo $value['g_price']; ?></td>
     <td><?php echo $value['g_status']; ?></td>
  
    <input type="hidden" value="<?php echo $value['g_id']; ?>" i="id" />
      
       <td class="td-manage">
        <a  href="index.php?r=product/update&id=<?php echo $value['g_id']; ?>" ctitle="修改" lipandong="<?php echo $value['g_id'] ?>" class="xg">修改</a> 
        <a  href="index.php?r=product/type&id=<?php echo $value['g_id']; ?>" ctitle="设置类型" lipandong="<?php echo $value['g_id'] ?>" class="xg">设置类型</a> 
        <a  href="index.php?r=product/sku_attr&g_id=<?php echo $value['g_id']; ?>&t_id=<?php echo $value['t_id']; ?>" ctitle="添加sku" lipandong="<?php echo $value['g_id'] ?>" class="xg">添加sku</a> 
        <a  href="index.php?r=product/sku_attr_add&g_id=<?php echo $value['g_id']; ?>&t_id=<?php echo $value['t_id']; ?>" ctitle="添加sku值"  >添加sku值</a> 
        <a title="删除" href="javascript:;"  lipandong="<?php echo $value['g_id'] ?>" class="del" class="btn btn-xs btn-delete" >删除</a>
        <a title="添加图片" href="index.php?r=product/good_img&g_id=<?php echo $value['g_id']; ?>"  lipandong="<?php echo $value['g_id'] ?>"   >添加图片</a>
       
      </td>

       </td>
    </tr>
 <?php endforeach ?>
   </tbody>
  </table>
    </div>
   </div>
  </div>
 </div>
</div>

 
</div>
 </div>
</body>
</html>
<script>
	//设置内页框架布局
$(function() { 
	$("#Sellerber").frame({
		float : 'left',
		color_btn:'.skin_select',
		Sellerber_menu:'.list_content',
		page_content:'.list_show',//内容
		datalist:".datatable_height",//数据列表高度取值
		header:65,//顶部高度
		mwidth:200,//菜单栏宽度
		
	});
});


	/*用户-删除*/
$('.del').click(function() {
  var id = $(this).attr('lipandong')
  // alert(id)
  $(this).parent().parent().remove()
    $.ajax({
      url:'<?= Url::to(['product/del']);?>',
      data:{'id':id},
      type:'post',
      success:function(msg){
        if(msg == 1){
          window.location.href = '<?= Url::to(['product/good_list']);?>';
        }
      }
    });
}) 
/********************列表操作js******************/

</script>
