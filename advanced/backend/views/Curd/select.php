<?php
use yii\helpers\Html;
use yii\helpers\url;
use yii\widgets\LinkPager;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <center>
      <table border="1">
      <tr>
      	<td>id</td>
        <td>名称</td>
       
        <td>操作</td>
      </tr>
     <?php foreach ($rows as $k=>$v){?>
      <tr>
              <td><?php echo $v['user_id'] ?></td>
              <td><?php echo $v['username']; ?></td>
              
         <td>
             <a href="<?php echo Url::to(['curd/del']) ?>&id=<?php echo $v['user_id'] ?>">删除</a>|
             <a href="<?php echo Url::to(['curd/update']) ?>&id=<?php echo $v['user_id'] ?>">修改</a>
         </td>
      </tr> 
      <?php }  ?>
    </table>

</body>
</html>

</center>
