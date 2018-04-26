<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<form action="<?= Url::to(['product/sku_do']);?>" method="post">
<div id="arr">
属性名:<select name="attr_id[]">
            <?php foreach ($res as $key => $value): ?>
              <option  value="<?php echo $value['attr_id'] ?>"><?php echo $value['attr_name'] ?></option>
            <?php endforeach ?>     
      </select>
 
属性值：<input type="text" name="attr_val_name[]">  
<input type="submit" value="保存">
</div>
<input type="button" id="add" value="+">
</form>
<script src="js/jquery-1.9.1.min.js" type="text/javascript" ></script>
<script>
$('#add').click(function() {
  $('#arr').append('属性名:<select name="attr_id[]"><?php foreach ($res as $key => $value): ?><option  value="<?php echo $value['attr_id'] ?>"><?php echo $value['attr_name'] ?></option><?php endforeach ?></select></br>属性值：<input type="text" name="attr_val_name[]"> ')
})

</script>

