<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf8");	
use Yii;
use yii\web\Controller;

class OrderController extends Controller{
     

	 public $layout=false;
	 public function init()
	{
	    $this->enableCsrfValidation = false;
	}

	//确认购买(详情页)到订单页
	public function actionOrder()
	{
	     //读取session  
	    //  $session = Yii::$app->session;
	    // $user_res = $session->get('user_login');
	  //  if (empty($user_res)) {
	  // echo "<script>alert('尚未登录请您前去登录');location.href='?r=user/login'</script>";
	  //     } else {
		    // 查看商品库存sku表是否存在商品
		    $post = Yii::$app->request->post();  
			$hidden_sku =  $post['hidden_sku'];
			$g_id =  $post['g_id'];
			$num =  $post['number'];
			$obj = Yii::$app->db;
			$sql = "SELECT * FROM `sku` WHERE sku_values_id= '$hidden_sku' AND goods_id = '$g_id'";
			$sku_good = $obj->createCommand($sql)->queryAll();
			if (empty($sku_good)) {
				 echo "<script>alert('此款商品库存没有,很抱歉!亲');location.href='?r=goods/detail&g_id=$g_id'</script>";
			} else {
	        	echo "<script>alert('正在生成订单中')</script>";
				//根据用户id查询用户的收货地址
				$sql =  "SELECT * FROM `address` WHERE user_id = '1'";
				$address =  Yii::$app->db->createCommand($sql)->queryAll();
			    //循环购买商品信息并展示
			    $sku_sql  =  "SELECT * FROM `sku` WHERE sku_values_id='1_11' AND goods_id ='4' ";
			    $sku_one = yii::$app->db->createCommand($sku_sql)->queryAll();
			    return $this->render('order',['address'=>$address,'sku_one'=>$sku_one,'num'=>$num]);
			}
	    // }
	}

	      //订单生成判断动作
			public function actionOrder_do()
			{
				//根据用户id查订单表
				//读取session  
				//   $session = Yii::$app->session;
				//   $user_res = $session->get('user_login');
				//  if (empty($user_res)) { 
		        // echo "<script>alert('尚未登录请您前去登录');location.href='?r=user/login'</script>";
		             // } else {	 
				          echo "<pre>";
		                  $post = Yii::$app->request->post();  
		                  $arr = array(
		             	  //用户id
		             	  "u_id"=>$post['user_id'],
		             	  //订单号
		             	  "osn"=>date("YmdHis").$post['user_id'].rand(1,10000),
		                  //订单生成时间
		                  "o_time"=>time(),
		                  //支付方式
		                  "p_method"=>$post['p_method'],
		                  //支付状态
		                  "p_status"=>0,
		                  //支付时间
		                  "p_time"=>time(),
		                  //商品总价
		                  "goods_price"=>$post['goods_price'],
		                  //运费
		                  "freight"=>0,
		                  //订单总价
		                  "o_price"=>$post['o_price'],
		                  //订单状态
		                  "o_status"=>0,
		                  //关联地址表主键id
		                  "address_id"=>$post['address_id'],
		             	  );
		             	  //添加订单表
		             	 $insert_res = Yii::$app->db->createCommand()->insert('order',$arr)->execute();
		                   if ($insert_res) {
			                   	    //添加订单商品关联表
			                   	    //获取最后一条id
			                   	    $new_arr =array(
			                   	    "o_id"=>Yii::$app->db->getLastInsertId(),
			                        //获取sku_id
		                            "sku_id"=>$post['sku_id'],
			                        //购买数量
			                        "num"=>$post['num'],
			                        //价格
			                        "price"=>$post['price'],
			                        //获取商品名称
			 						"g_name"=>$post['g_name'], 
		                            //获取图片
		                            "g_img" =>null
		                        	);
		                            $insert_goods = Yii::$app->db->createCommand()->insert('order_goods',$new_arr)->execute();
		                               if($insert_goods){
		                               	 echo "<script>alert('订单生成成功');location.href='index.php?r=order/myorder'</script>";
		                               } else {
		                                 echo "<script>alert('订单生成失败,很抱歉');location.href='index.php?r=order/order'</script>";
		                               }
		                   } else {
		                   	 echo "<script>alert('订单生成失败');location.href='index.php?r=order/order'</script>";
		                   }

		             // }
			}


	     //购物车生成订单页面
	    public function actionOrder1()
	    {      
		     
		       $post = Yii::$app->request->post();               
		       $new_arr = array();
		       $new_arr = explode(",",$post['sb_id']); 
		       //循环展示购买的购物车数组
		       foreach ($new_arr as $k => $v) {
		              $sku_one[] = yii::$app->db->createCommand("SELECT * FROM `shopping` WHERE s_id = '$v' ")->queryOne();
		       }
		        
		       //根据用户id查询用户的收货地址
				$sql =  "SELECT * FROM `address` WHERE user_id = '1'";
				$address =  Yii::$app->db->createCommand($sql)->queryAll();  
		       return $this->render('order1',['address'=>$address,'sku_one'=>$sku_one]);
	    }
	    
	    //购物车订单页面添加动作
	    public function actionOrder2()
	    {
	    	   //根据用户id查订单表
				//读取session  
				//   $session = Yii::$app->session;
				//   $user_res = $session->get('user_login');
				//  if (empty($user_res)) { 
		        // echo "<script>alert('尚未登录请您前去登录');location.href='?r=user/login'</script>";
		             // } else {	 
                          $post = Yii::$app->request->post();  
		                  $arr = array(
		             	  //用户id
		             	  "u_id"=>$post['user_id'],
		             	  //订单号
		             	  "osn"=>date("YmdHis").$post['user_id'].rand(1,10000),
		                  //订单生成时间
		                  "o_time"=>time(),
		                  //支付方式
		                  "p_method"=>$post['p_method'],
		                  //支付状态
		                  "p_status"=>0,
		                  //支付时间
		                  "p_time"=>time(),
		                  //商品总价
		                  "goods_price"=>$post['djzj'],
		                  //运费
		                  "freight"=>0,
		                  //订单总价
		                  "o_price"=>$post['o_price'],
		                  //订单状态
		                  "o_status"=>0,
		                  //关联地址表主键id
		                  "address_id"=>$post['address_id'],
		             	  );
		             	  //添加订单表
		             	 $insert_res = Yii::$app->db->createCommand()->insert('order',$arr)->execute();
		                     if ($insert_res) {
			                   	    //添加订单商品关联表
			                   	    //获取最后一条id
			                         $o_id = Yii::$app->db->getLastInsertId();
		                             $a = count($post['sku_id']);
		                             //把购物车中的商品加入订单商品表
		                             for ($i=0; $i < $a; $i++) { 
		                             	$sku_id = $post['sku_id'][$i];
		                             	$price = $post['price'][$i];
		                             	$g_name = $post['g_name'][$i];
		                             	$num = $post['text_box'][$i];
		                             	$sql = "insert into order_goods (o_id,sku_id,num,price,g_name) values ($o_id,$sku_id,$num,'$price','$g_name')";
		                             $insert_info = Yii::$app->db->createCommand($sql)->execute(); 
		                             };
			                             if ($insert_info) {
			                             	echo "<script>alert('订单生成成功');location.href='index.php?r=order/myorder'</script>";
			                             } else {
                                  	 echo "<script>alert('订单商品表有点问题,失败');location.href='index.php?r=order/order1'</script>";
			                            }
		                   } else {
		                   	 echo "<script>alert('订单表生成失败');location.href='index.php?r=order/order1'</script>";
		                }
             // }    
	    }
		  

	//修改默认收货地址ajax发送后台
	public function actionAjaxhou()
	{  
	     $address_id = Yii::$app->request->post("address_id");
	     $user_id  = Yii::$app->request->post("user_id");
	     Yii::$app->db->createCommand("UPDATE `address` SET  address_status = 0 WHERE user_id='$user_id'")->execute();
	     $where = "address_id='$address_id'";
	      $a = [
	       "address_status" =>1,
	           ] ;
	      $update = Yii::$app->db->createCommand()->update('address', $a, $where)->execute();
	       if ($update) {
	        echo "1";
	       }else{
	       echo "0";
	       }
	} 


	//我的订单（已完成和未完成）
	public function actionMyorder()
	{
	    $sql = "SELECT * FROM `order` WHERE u_id ='1'";
	  	$address =  Yii::$app->db->createCommand($sql)->queryAll();
	    return $this->render('myorder',['address' =>$address]);
	                
	}

}
