<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf8");

use Yii;
use yii\web\Controller;
class GoodsController extends Controller{
     //yii2.0 框架前台黑色框去掉
     //防止csrf攻击
     public $layout=false;
     public function init()
    {
        $this->enableCsrfValidation = false;
    }
    //搜索后展示(列表)
    public function actionSearch(){
        //根据搜索条件查询相关数据，传到前台
        return $this->render('search');
    }
 
   //详情页
   public function actionDetail(){
        //接收goods_id展示详情页
        $g_id = Yii::$app->request->get("g_id");
        $one_good = (new \yii\db\Query())->select("*")->from('goods')->where(["g_id" =>$g_id ])->one();
     
        $sku_values_name  =  (new \yii\db\Query())->select("sku_values_name")->from('sku')->where(["goods_id" =>$one_good])->all();
        $sku_values_id  =  (new \yii\db\Query())->select("sku_values_id")->from('sku')->where(["goods_id" =>$one_good])->all();
        $attr_val =  (new \yii\db\Query())->select("*")->from('attr_val')->all();
    
        //拆分成数组
        foreach ($sku_values_id as $key => &$v) {
            $v = explode('_', $v['sku_values_id']);
        }
        $newarr = array();
        foreach ($sku_values_id as $ke => $va) {
            foreach ($va as $key1 => $value1) {
                $newarr[$key1][] = $value1;
            }
        }
        foreach ($newarr as $key => &$value) {
            $value = array_unique($value);
        }
        $arr1 = array();
        foreach ($newarr as $key2 => $value2) {
            foreach ($value2 as $k2 => $v2) {
                $arr1[(new \yii\db\Query())->select("attr_id")->from('attr_val')->where(["att_val_id" =>$v2])->one()['attr_id']][] = $v2;
            }
        }
        return $this->render('detail',['one_good' =>$one_good,'g_id'=>$g_id,'arr1'=>$arr1,'g_id'=>$g_id]);
    }

    //详情页 ajax发送后台方法
    public function actionAjax(){
        $str = Yii::$app->request->post("str");
        $sql = "SELECT sku_price, stock FROM `sku` WHERE sku_values_id='$str'";
        $sql_res =  Yii::$app->db->createCommand($sql)->queryOne();
        if ($sql_res ==false) {
            echo "0";
          } else {
             //定义一个空数组
             $arr = array();
             $arr = array(
             //数量
             $stock = $sql_res['stock'],
             //价格
             $sku_price = $sql_res['sku_price'],
            );
              $new_arr = json_encode($arr);
              echo $new_arr;
          }
    }


    //添加购物车动作
    public function actionAddcar(){
       //判断用户是否登录,立即下单和加入购物车
       $post = Yii::$app->request->post(); 
       $cookie = $post['cookie'];
         // if ($cookie == "") {
         //  echo "0";
         // } else {
           $g_id = $post['g_id'];
           $number = $post['number'];
           $str = $post['str'];
           $obj = Yii::$app->db;
           $sql = "SELECT * FROM `sku` WHERE sku_values_id= '$str' AND goods_id = '$g_id'";
           $sku_good = $obj->createCommand($sql)->queryAll();
              if (empty($sku_good)) {
                    echo "1";
               } else {
                     // 添加购物车表
                      $shopping = [
                           //购物车添加时间
                           "s_id" =>null,
                           "user_id" =>1,
                           "sku_id" =>$sku_good[0]['sku_id'],
                           "goods_id" =>$g_id,
                           "num"=>$number,
                           "s_time" =>time(),
                      ];
                    $shop_res = Yii::$app->db->createCommand()->insert('shopping',$shopping)->execute();   
                    if ($shop_res) {
                        echo "2";
                    } else {
                        echo "3";
                    }
              }

       // }     
    }

    //展示购物车内容
    public function actionCar(){
        //查看cookie内容（未登录）
        //根据用户ID查询数据库(已登录)
        $sql = "SELECT * FROM `shopping` WHERE user_id = '1'";
        $user_info =  Yii::$app->db->createCommand($sql)->queryAll();
        //发送到前台u_id
        $u_id = $user_info['0']['user_id'];
        $new_arr = array();
       
       foreach ($user_info as $key => $value) {
            $new_arr[$value['s_id']] = (new \yii\db\Query())->select(['g_name'])->from('goods')->where(['g_id' =>$value['goods_id']])->one();
            
            //价格
            $price = (new \yii\db\Query())->select(['sku_price'])->from('sku')->where(['sku_id' =>$value['sku_id']])->one();
            foreach ($price as $k1 => $v1) {
                $new_arr[$value['s_id']]['sku_price'] = $v1;
             }
            
            //购买数量
             $new_arr[$value['s_id']]['num'] = $value['num'];
            
            //属性值的id    
           $attr_id = (new \yii\db\Query())->select(['sku_values_id'])->from('sku')->where(['sku_id' =>$value['sku_id']])->one();
            foreach ($attr_id as $k2 => $v2) {
                $new_attr = explode("_", $v2);
            }
             $new_arr[$value['s_id']]['attr_value_id'] = $new_attr; 
        }
           
        return $this->render('car',['new_arr'=>$new_arr,'u_id'=>$u_id]);
    }

   //ajax发送购物车批删删除功能
    public function actionDtell()
    {
          $post = Yii::$app->request->post(); 
          //获取u_id 根据他来进行删除表
          $u_id = $post['u_id'];
          $s_id = $post['str'];
          $new_s_id = implode(",",explode("&id=",$s_id));
          $in = substr($new_s_id,3);
          $obj = Yii::$app->db;
          $sql = "DELETE FROM `shopping` WHERE s_id in($in) AND user_id ='$u_id'";
          $del_info = $obj ->createCommand($sql)->execute();
          if ($del_info) {
             echo "1";
          } else {
             echo "0";
          }
     }

    //单项购物车页面删除
    public function actionDel()
    {
        $s_id = Yii::$app->request->get('s_id');
        $connection =Yii::$app->db; 
        $del = $connection->createCommand()->delete('shopping','s_id='.$s_id)->execute();
        if ($del) {
             echo "<script>alert('删除成功');location.href='?r=goods/car'</script>";
        }
    }

}
