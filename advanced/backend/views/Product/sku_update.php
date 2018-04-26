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
<script src="js/Sellerber.js" type="text/javascript"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>
<script src="js/layer/layer.js" type="text/javascript"></script>
<script src="js/laydate/laydate.js" type="text/javascript"></script>
<script src="js/hsCheckData.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js" type="text/javascript"></script>
<script src="js/respond.min.js"></script>
<script src="js/css3-mediaqueries.js"  type="text/javascript"></script>
  <![endif]-->
<title>添加产品</title>
</head>
<form action="<?= Url::to(['product/sku_add_do']);?>" method="post" enctype="multipart/form-data">
<body>
<div class="margin inside_pages clearfix">
<div class="add_style clearfix relative">
  <!--品牌展示 当通过品牌管理添加产品是显示该-->
<!--   <div class="Brand_title">
  	 <div class="Brand_img"><img src="product_img/logo/458.jpg"><h3>卡姿兰</h3></div>
  </div> -->
  
    
  

<!--  <div id='attr'>
  <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>属性：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="attr_name[]" type="text"  class="col-xs-6" /><input type="button" class="a" value="+" /></li><li class="clearfix"><label class="label_name col-xs-1"><i></i>属性值：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="attr_val_name[]" type="text"  class="col-xs-6" /></li>
  
 </div>   -->  
 <!-- <center> -->
<p>
<?php foreach ($arr as $key => $value): ?>
  <span >
  <input type="hidden" name="attr_id[]" value="<?php echo $value['attr_id']; ?>" />
  <?php echo $value['attr_name'] ?></span>:
  <select name="att_val_id[]" >
    <?php foreach ($str[$key] as  $v): ?>
      <option value="<?php echo $v['attr_val_name'] ?>"><?php echo $v['attr_val_name'] ?></option>
    <?php endforeach ?>
  </select>&nbsp;&nbsp;&nbsp;&nbsp;
<?php endforeach ?>

库存：<input type="text" name="stock"  />
价格：<input type="text" name="sku_price"  />
 </p>

<!-- </center>  -->
   <!-- <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>图片：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="img" type="file" class="col-xs-4"/></div></li> -->
   <!-- <li class="clearfix"><label class="label_name col-xs-1"><i>*</i>关&nbsp;键&nbsp;字：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="" type="text" class="col-xs-4"/><em class="Prompt"> 请用","分隔关键字</em></div></li> -->
 
</ul>
 <div class="Button_operation btn_width">
    <input class="btn button_btn bg-deep-blue" id="btn" type="submit" value="保存并提交">
    <!-- <button class="btn button_btn bg-orange" type="button">保存草稿</button> -->
    <button class="btn button_btn bg-gray" type="button">取消添加</button>
 </div>
</div>
</div>
</body>
</form>
</html>
   <!--复文本编辑框-->
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="js/utf8-jsp/lang/zh-cn/zh-cn.js"></script>
<script>


</script>
