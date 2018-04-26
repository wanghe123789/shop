<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class VipController extends Controller
{
	public $layout=false;
    public $defaultRoute = 'index';
    public function init(){
    
    $this->enableCsrfValidation = false;
  	} 
	public function actionAddvip()
	{
		$sql = "select * from  user left join user_info on user.user_id = user_info.user_id ";
		$query = Yii::$app->db->createCommand($sql)->queryAll();
		// echo "<pre>";
		// var_dump($query);die;
		return $this->render('member_list.php',['a' => $query]);
	}
	public function actionAa(){
		echo 111;die;
	}
	public function actionDel()
	{
		$data = yii::$app->request->post();
		$id = $data['id'];
		// var_dump($id);die;
		$sql = "update user set user_status = 0  where user_id = '$id'";
		$query = Yii::$app->db->createCommand($sql)->execute();
		return $query;
	}
	public function actionNdel()
	{
		$data = yii::$app->request->post();
		$id = $data['id'];
		$sql = "update user set user_status = 1  where user_id = '$id'";
		$query = Yii::$app->db->createCommand($sql)->execute();
		return $query;
	}
	public function actionDelete()
	{
		$data = yii::$app->request->post();
		$id = $data['id'];
		$sql = "delete from user  where user_id = '$id'";
		$query = Yii::$app->db->createCommand($sql)->execute();
		return $query;
	}
	
}	