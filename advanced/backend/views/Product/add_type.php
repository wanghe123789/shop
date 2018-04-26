<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<html>
<form action="<?= Url::to(['product/type_add_do']);?>" method="post">
类型名称：
<input type="text" name="type_name" >
是否展示：
<input type="radio" name="is_show" value="1">是
<input type="radio" name="is_show" value="0">否
<input type="submit" value="保存">
</form>
</html>