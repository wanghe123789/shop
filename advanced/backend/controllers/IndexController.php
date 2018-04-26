<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class IndexController extends Controller
{
	public $layout=false;
    public $defaultRoute = 'index';
    public function init(){
    
    $this->enableCsrfValidation = false;
  	} 
	public function actionIndex()
	{

		return $this->render('login.php');
	}	
	public function actionLogin_do()
	{
		$data = yii::$app->request->post();
		$username = $data['username'];
		$password = $data['password'];
		$sql = "select * from admin where  admin_name ='$username'";
		$query = Yii::$app->db->createCommand($sql)->queryOne();
		if ($password == $query['admin_pwd']) {
			
                echo '<script>location.href="index.php?r=index/shouye"</script>';
			
		}else{
			echo '<script>alert("密码错误");location.href="index.php?r=index/index"</script>';
		}
	}
	public function actionShouye()
	{
		return $this->render('shops_index.php');
	}

}	