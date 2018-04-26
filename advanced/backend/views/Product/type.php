<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<form action="<?= Url::to(['product/type_do']);?>" method="post">
类型:<select name="type_id">
            <?php foreach ($res as $key => $value): ?>
              <option  value="<?php echo $value['type_id'] ?>"><?php echo $value['type_name'] ?></option>
            <?php endforeach ?>     
      </select>
      <input type="hidden" name="g_id" value="<?php echo $g_id; ?>">
      <input type="submit" value="保存">
</form>