<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Address;


class AddressController extends Controller{
    public $layout=false;

    public function init(){
        $this->enableCsrfValidation = false;
    }

     //收货地址展示
	public function actionShow(){
		$data = YII::$app->db->createCommand("select * from address")->queryAll();
		return $this->render("show",array('data'=>$data));
	}
	//进行接值，入库
	public function actionAdd(){

	    return $this->render('add');
    }
    

	//收货地址添加 
    public function actionAdd_do(){
    	$db = new Address;
		$data = Yii::$app->request->post();
		$db->address = $data['address'];
        $db->user_name = $data['user_name'];
        $db->user_tel = $data['user_tel'];
        $sql = $db->save();
        if ($sql) {
        	echo "<script>alert('添加成功');location.href='?r=address/show'</script>";
        }else{
        	echo "<script>alert('添加失败');location.href='?r=address/add_do'</script>";
        }
			return $this->render("add");
	}

   
	//收货地址删除
   public function actionDel(){
        $user_id = 1;
   	    $id = Yii::$app->request->get();
   	    $id = $id['id'];
    	$sql = "delete from address where address_id = '$id'";
  		$db=Yii::$app->db ->createCommand($sql)->execute(); 
	    if($db){
	       echo "<script>alert('删除成功');location.href='?r=address/show'</script>";
	    }else{
	        echo "<script>alert('删除失败');location.href='?r=address/del'</script>";
	    }   

	}

    //收货地址修改
	public function actionUpdate(){
		$id = Yii::$app->request->get();
   	    $address_id = $id['id'];
		$connection =Yii::$app->db;
	   	$command = $connection->createCommand("select * from address where address_id=$address_id");
		$posts = $command->queryOne();
		return $this->render('update',['posts'=>$posts]);
	}

	public function actionUpdate_do(){
                $user_id = 1;
        		$post = Yii::$app->request->post();
        		$address = $post['address'];
        		$user_name = $post['user_name'];
        		$user_tel = $post['user_tel'];
        		$address_id = $post['address_id'];
        		$command = Yii::$app->db->createCommand()->update('address', ['address' => $address,'user_name'=>$user_name,'user_tel' => $user_tel],'address_id = '.$address_id)->execute();
        		if ($command) {
        			echo "<script>alert('修改成功');location.href='?r=address/show'</script>";
        		}else{
        			echo "<script>alert('修改失败');location.href='?r=address/update'</script>";
        		}
	}

}
