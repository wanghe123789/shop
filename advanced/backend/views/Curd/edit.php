<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	  <center> 
	  <form action="" method="post">
	  	<input type="hidden" name="id" value="<?php echo $one['id'] ?>">
	  	<table>
	  	<tr>
	  		<td>姓名:</td>
	  		<td><input type="text" name="u_name" value="<?php echo $one['u_name'] ?>"></td>
	  	</tr>
	  	<tr>
	  		<td>密码</td>
	  		<td><input type="text" name="u_pwd" value="<?php echo $one['u_pwd'] ?>"></td>
	  	</tr>
         <tr>
         	<td>电子邮件</td>
         	<td><input type="text" name="email" value="<?php echo $one['email'] ?>"></td>
         </tr>
         <tr>
         	<td colspan="2"><input type="submit" value="确定"></td>
         </tr>
	  </table>
	  </form> 
	</center>
</body>
</html>