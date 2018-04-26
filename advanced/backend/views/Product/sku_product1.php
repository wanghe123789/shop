<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="font/css/font-awesome.min.css"  rel="stylesheet" type="text/css" />
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>

<title>添加产品</title>
</head>

 --><body>

  
  
 <ul>
 <div id='attr'>

  <?php $attr = Yii::$app->db->createCommand('select * from attr where t_id='.$t_id)->queryAll(); ?>

  <?php foreach ($attr as $val): ?>

    <?php
      $attr_id = $val['attr_id'];
      $attr_val = Yii::$app->db->createCommand('select * from attr_val where attr_id='.$attr_id)->queryAll(); ?>
      <span><?php echo $val['attr_name'] ?></span>:
    <select>
      <?php foreach ($attr_val as $key => $value): ?>
        <option class="attr_val" value="<?php echo $value['att_val_id'] ?>"><?php echo $value['attr_val_name'] ?></option>
      <?php endforeach ?>     
    </select>  
  <?php endforeach ?>
  库存:<input type="text" id="stock">
    价格:<input type="text" id="price"> 
 
  <input type="hidden" value="<?php echo $g_id; ?>" name='g_id'/> <br>
  </div>
  <button id="add">添加</button>
 </div>
 <form action="<?= Url::to(['product/sku_add_do']);?>" method="post">

  <div id="had">
    <p>已选货品</p>
  </div>
  <input type="submit" value="提交"></form>
</ul> 
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
  $('#add').on('click',function(){
    var stock = $('#stock').val();
    var price = $('#price').val();
    var attr = $('.attr_val:selected');
    var arr = new Array();
    var arr1 = new Array();
    $.each(attr,function(){
      arr.push($(this).val());
      arr1.push($(this).html());
    })
    str = arr.join('_');
    str1 = arr1.join('_');
    $('#had').append('<li>规格：'+str1+',库存：'+stock+',单价：'+price+'<input type="hidden" name="goods_id[]" value="<?php echo $g_id; ?>" /><input type="hidden" name="sku_values_id[]" value="'+str+'"><input type="hidden" name="sku_values_name[]" value="'+str1+'"><input type="hidden" name="stock[]" value="'+stock+'"><input type="hidden" name="price[]" value="'+price+'">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="del" value="删除"></li><br>')
    $('.del').on('click',function(){
      $(this).parents('li').remove();
    })
  })
  








// $('.a').on('click',function() {
// 	$('#attr').append('<li class="clearfix"><label class="label_name col-xs-1"><i>*</i>属性：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="attr_name[]" type="text"  class="col-xs-6" /></li><li class="clearfix"><label class="label_name col-xs-1"><i></i>属性值：&nbsp;&nbsp;</label><div class="Add_content col-xs-11"><input name="attr_val_name[]" type="text"  class="col-xs-6" /></li>');
// })
</script>
