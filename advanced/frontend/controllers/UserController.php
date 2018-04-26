<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

class UserController extends Controller{
	public $layout=false;
    public $defaultRoute = 'index';
    public function init(){
    
    $this->enableCsrfValidation = false;
  	} 
//登录
     function actionLogin(){
	//登录后存session
		
       return $this->render('login');
	}
  

//注册
	public function actionRegister(){
		return $this->render('register');
	}


//个人中心
	function actionCenter(){
		//session获取用户ID，展示个人中心
		return $this->render('center');
	}

	 function actionXx(){
       $data = yii::$app->request->post();
       $tel = $data['tel'];
      
       $sql = "select * from yzm where tel = '$tel'";
        $query = Yii::$app->db->createCommand($sql)->queryOne();
       if ($query) {
       		$serverTime = $query['time'];
          // return $serverTime;die;
            $yxq = 30;
            if (($serverTime + $yxq) < time()){//数据过期了
            	$sql1 = "delete from yzm where tel = '$tel'";
            	$query = Yii::$app->db->createCommand($sql1)->execute();
            	$yzm = rand(100000, 999999);
              $time = time();
              $sql2 = "insert into yzm values('$tel','$yzm','$time')";
              $query = Yii::$app->db->createCommand($sql2)->execute();
              $this->sendUrl($tel, $yzm);
              echo 'success';
            }else{//数据没过期
              echo ($yxq + $serverTime) - time();
            }
       }else{//数据不存在
             $yzm = rand(100000, 999999);
              $time = time();
              $sql2 = "insert into yzm values(null,'$tel','$yzm','$time')";
              $query = Yii::$app->db->createCommand($sql2)->execute();
              $this->sendUrl($tel, $yzm);
            echo 'success';
       }
       
    }
    function sendUrl($tel, $yzm){
        $url = "http://api.k780.com/?app=sms.send&tempid=51281&param=usernm%3Dadmin%26code%3D$yzm&phone=$tel&appkey=30377&sign=dd81af1d40a126ac7c2bebd796faef5d";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $return = curl_exec($curl);
        curl_close($curl);
        return $return;
    }
    function actionYzzz()
    {
      $data = yii::$app->request->post();
      $tel = $data['tel'];
      $yzmm = $data['yzmm'];
      $sql = "select * from yzm where tel = '$tel'";
      $userInfo  = Yii::$app->db->createCommand($sql)->queryOne();
   
      $time = $userInfo['time'];
      $yxq  = 30;
      if($userInfo['yzm'] == $yzmm){
            if(($time + $yxq) < time()){//过期
                echo 'GQ';
            }else{
                echo 'OK';
            }
        }else{
                echo 'NO';
        }
    }
    function actionAdd()
    {
      $data = yii::$app->request->post();
      //var_dump($data);die;
      $username = $data['tel'];
      $password = $data['pwd'];
      $registe_ip = $_SERVER['REMOTE_ADDR'];
      $register_time = time();
      $user_status = 1;
      $sqls = "select * from user where username = '$username'";
      $query  = Yii::$app->db->createCommand($sqls)->queryOne();
      if ($query=='') {
        $sql = "insert into user values(null,'$username','$password','$registe_ip','$register_time','$user_status')";
        //var_dump($sql);
        $res  = Yii::$app->db->createCommand($sql)->execute();
        $user_id = Yii::$app->db->getLastInsertID();
        // var_dump($user_id);die;
        $cookies = Yii::$app->response->cookies;
          $cookies->add(new \yii\web\Cookie([
              'name' => 'user_id',
              'value' => '$user_id',
              'expire'=>time()+3600
          ]));
        if ($res) {
          $this->redirect(array('home/index'));
        }
      }else{
        echo "<script>alert('已注册')</script>";
        $this->redirect(array('user/register'));
      }
      
      


    }
}