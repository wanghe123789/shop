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
<title>sku展示</title>
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
     <th>商品属性名</th>
      <th>sku值</th>
      <th>sku价格</th>
      <th>库存</th>
      <th>编辑</th>
    </tr>
    
   </thead>
   <tbody>
   
      
    <?php foreach ($arr as $key => $value): ?>
    <tr>
     
       
     
      <td><?php echo $value['sku_id']; ?></td>
      <td><?php echo $key; ?></td>
      
      <td><?php echo $value['sku_values_name']; ?></td>
      <td><?php echo $value['sku_price']; ?></td>
      <td><?php echo $value['stock']; ?></td>
  
   
      <input type="hidden" value="<?php echo $value['sku_id']; ?>" id="sku_id" />
       <td class="td-manage">
        
        
        <a title="删除" href="javascript:;"   class="del"  >删除</a>
        <a title="添加商品详情图片" href="index.php?r=product/goods_img&id=<?php echo $value['sku_id']; ?>"     >添加商品详情图片</a>
       
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
  var id = $("#sku_id").val()
  $(this).parent().parent().remove()
    $.ajax({
      url:'<?= Url::to(['product/sku_del']);?>',
      data:{'id':id},
      type:'post',
      success:function(msg){
        if(msg == 1){
          window.location.href = '<?= Url::to(['product/sku_list']);?>';
        }
      }
    });
}) 
/********************列表操作js******************/

</script>
