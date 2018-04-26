<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use  frontend\models\Curd;


class CurdController extends Controller{
   
    /*防crsf攻击 顶栏黑框消失*/
    public $layout=false;
    public function init(){
    
    $this->enableCsrfValidation = false;
  }
    //
    public function actionAdd()
    {
    	if (Yii::$app->request->post()) {
        $post = Yii::$app->request->post();
        $data = Yii::$app->db->createCommand()->insert('user',$post)->execute();
           if ($data) {
           	 echo "<script>alert('添加成功');location.href='?r=curd/select'</script>";
           } else {
              echo "<script>alert('添加失败');location.href='?r=curd/add'</script>";
           }
           return;
    	}
    	return $this->render('add');
    }
   
   //数据展示
   public function actionSelect()
   {
        $rows = (new \yii\db\Query())->select("*")->from('user')->all();
        //var_dump($rows);
        return $this->render('select',['rows' => $rows]); 
   }

   //删除数据
   public function actionDel()
   {   
   	   $connection =Yii::$app->db;
   	   $id = $_GET['id'];
       $del = $connection->createCommand()->delete('user','id='.$id)->execute();
       if ($del) {
       	   echo "<script>alert('删除成功');location.href='?r=curd/select'</script>";
       }
   }

   //修改接值
   public function actionUpdate()
   {
      $connection =Yii::$app->db;
      $post = Yii::$app->request->post();
      if ($post) {
       $user_id = $post['user_id'];
       $data = $connection->createCommand()->update('user', ['username'] => $post['username'],['password']=>$post['password'],['user_id']=>$user_id)->execute();
           if ($data) {
           	 echo "<script>alert('修改成功');location.href='?r=curd/select'</script>";
           } else {
              echo "<script>alert('修改失败');location.href='?r=curd/update'</script>";
           }
           return;
    	}
      $id = $_GET['id'];
      $command = $connection->createCommand('SELECT * FROM `user` WHERE id='.$id);
      $post = $command->queryOne();
      return $this->render('edit',['one' => $post]);
   } 

   

}