<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use app\models\GoodCat;
use backend\models\UploadForm;
use yii\web\UploadedFile;


class ProductController extends Controller
{
	public $layout=false;
    public $defaultRoute = 'index';
    public function init(){
    
    $this->enableCsrfValidation = false;
  	}  

	public function actionIndex()
	{
		$sql = "select * from good_cat";
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        $sql1 = "select * from goods_type";
        $query1 = Yii::$app->db->createCommand($sql1)->queryAll();
        return $this->render('add_product',['query'=>$query,'res'=>$query1]);
	}

	function actionAdd()
	{
		$data = yii::$app->request->post();
		// var_dump($_FILES);die;
		$username = $data['g_name'];
		$file_size=$_FILES['myfile']['size'];  
	    if($file_size>2*1024*1024) {  
	        echo "文件过大，不能上传大于2M的文件";  
	        exit();  
	    }  
	  
	    $file_type=$_FILES['myfile']['type'];  
	    echo $file_type;  
	    if($file_type!="image/jpeg" && $file_type!='image/pjpeg') {  
	        echo "文件类型只能为jpg格式";  
	        exit();  
	    }  
  
  
    //判断是否上传成功（是否使用post方式上传）  
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
        //把文件转存到你希望的目录（不要使用copy函数）  
        $uploaded_file=$_FILES['myfile']['tmp_name'];  
  
        //我们给每个用户动态的创建一个文件夹  
        $user_path="./upload/";  
        //判断该用户文件夹是否已经有这个文件夹  
        if(!file_exists($user_path)) {  
             mkdir($user_path,0777,true);  
        }  
  	
        //$move_to_file=$user_path."/".$_FILES['myfile']['name'];  
        $file_true_name=$_FILES['myfile']['name'];  
        $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));  
        //echo "$uploaded_file   $move_to_file";  
        if(move_uploaded_file($uploaded_file,$move_to_file)) {  
            echo $_FILES['myfile']['name']."上传成功";  
        } else {  
            echo "上传失败";  
        }  
    } else {  
        echo "上传失败";  
    }  
    $g_name = $data['g_name'];
    $g_desc = $data['g_desc'];
    $g_img = $move_to_file;
    $g_price = $data['g_price'];
    $g_status = $data['g_status'];
    $cat_id = $data['cat_id'];
    // var_dump($data);die;
    if ($data['g_status']==1) {
        $is_hot = $data['g_status'];
        $is_new = 0;
    }else{
        $is_hot = 0;
        $is_new = 1;
    }
    
    $t_id = $data['t_id'];
    $sql = "insert into goods values(null,'$g_name','$g_desc','$g_img','$cat_id','$g_price','$is_hot','$is_new','$g_status','$t_id')";
     $query = Yii::$app->db->createCommand($sql)->execute();
     if ($query) {
        $good_id = Yii::$app->db->getLastInsertID();
        // var_dump($good_id);die;
     	$this->redirect(array("product/good_list",'good_id'=>$good_id));
     }

	}
    function actionGood_list()
    {
        $sql = "select * from goods";
        $query = Yii::$app->db->createCommand($sql)->queryAll();

       return $this->render('product_list',['query'=>$query]);
    }
    function actionDel()
    {
        $data = yii::$app->request->post();
        $g_id = $data['id'];

        $sql = "delete from goods where g_id = '$g_id'";
    
        $query = Yii::$app->db->createCommand($sql)->execute();
        if ($query) {
            echo "1";
        }else{
            echo "0";
        }

    }
    function actionUpdate()
    {

        $data = yii::$app->request->get();
        $id = $data['id'];
        $sql = "select * from goods where g_id = '$id'";
        $query = Yii::$app->db->createCommand($sql)->queryOne();
        // var_dump($query);die;
        $cat_id = $query['cat_id'];
        $sql1 = "select * from good_cat ";
        $query1 = Yii::$app->db->createCommand($sql1)->queryAll();  
        $query1 = $this->tree($query1);
        return $this->render('update_product',['cat_id'=>$cat_id,'query'=>$query1,'res'=>$query]);
        
    }
    function actionUpdate_do($value='')
    {
                $data = yii::$app->request->post();
                $g_id = $data['g_id'];
                // var_dump($data);die;
                if ($_FILES['myfile']['name']=='') {
                   $g_img = $data['g_img'];
                }else{

                
                $username = $data['g_name'];
                $file_size=$_FILES['myfile']['size'];  
                if($file_size>2*1024*1024) {  
                    echo "文件过大，不能上传大于2M的文件";  
                    exit();  
                }  
              
                $file_type=$_FILES['myfile']['type'];  
             
            //判断是否上传成功（是否使用post方式上传）  
                if(is_uploaded_file($_FILES['myfile']['tmp_name'])) {  
                    //把文件转存到你希望的目录（不要使用copy函数）  
                    $uploaded_file=$_FILES['myfile']['tmp_name'];  
              
                    //我们给每个用户动态的创建一个文件夹  
                    $user_path="./upload/".$g_id;  
                    //判断该用户文件夹是否已经有这个文件夹  
                    if(!file_exists($user_path)) {  
                         mkdir($user_path,0777,true);  
                    }  
                
                    //$move_to_file=$user_path."/".$_FILES['myfile']['name'];  
                    $file_true_name=$_FILES['myfile']['name'];  
                    $move_to_file=$user_path."/".time().rand(1,1000).substr($file_true_name,strrpos($file_true_name,"."));  
                    //echo "$uploaded_file   $move_to_file";  
                    if(move_uploaded_file($uploaded_file,iconv("utf-8","gb2312",$move_to_file))) {  
                        echo $_FILES['myfile']['name']."上传成功";  
                    } else {  
                        echo "上传失败";  
                    }  
                } else {  
                    echo "上传失败";  
                } 
                $g_img = $move_to_file;
            }
                $g_name = $data['g_name'];
                $g_desc = $data['g_desc'];
                
                $g_price = $data['g_price'];
                $g_status = $data['g_status'];
                $cat_id = $data['cat_id'];
                if ($data['is_status']==1) {
                    $is_hot = $data['is_status'];
                    $is_new = 0;
                }else{
                    $is_hot = 0;
                    $is_new = 1;
                } 
                
                $sql = "update  goods set g_name = '$g_name',g_desc='$g_desc',g_img='$g_img',g_price='$g_price',g_status='$g_status',is_hot='$is_hot',is_new='$is_new' where g_id = '$g_id' ";
                     $query = Yii::$app->db->createCommand($sql)->execute();
                     if ($query) {

                        $this->redirect(array("product/good_list"));
                     }
    }


      function tree(&$list,$pid=0,$level=0,$html='--'){
        static $tree = array();
        foreach($list as $v){
            if($v['parent_id'] == $pid){
                $v['sort'] = $level;
                 $v['html'] = str_repeat($html,$level);
                $tree[] = $v;
                $this->tree($list,$v['cat_id'],$level+1);
            } 
        }
        return $tree;
      }   
      function actionSku()
      {
        $sql = "select * from good_cat";
         $query = Yii::$app->db->createCommand($sql)->queryAll();
         // $query = $this->tree($query);
          return $this->render('sku_product',['res'=>$query]);
      }
      public function actionSku_attr_add()
      {
        $arr = yii::$app->request->get();
        $t_id = $arr['t_id'];
        $sql = "select * from attr where t_id = '$t_id'";
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        echo "<pre>";
        // var_dump($query);die;
        return $this->render('sku_add',['res'=>$query]);
      }
      public function actionSku_do($value='')
      {
        $data = yii::$app->request->post();
        $attr_val_name = $data['attr_val_name'];
        $attr_id = $data['attr_id'];
        $num = count($attr_val_name);
     
        $a = array();
           foreach ($attr_val_name as $key => $value) {
                $a[]=(explode(',', $value));
                
           }

        $b = array();
        $b = array_combine($attr_id,$a);
        foreach ($b as $k => $v) {
                foreach ($v as $k1 => $v1) {
                   $sql = "insert into attr_val values(null,'$v1','$k')";

                $query = Yii::$app->db->createCommand($sql)->execute();
                }
                
        } 
        return $this->redirect(array('product/good_list'));
      }
      public function actionAttr()
      {
        $data = yii::$app->request->get();
        $g_id = $data['g_id'];
        $t_id = $data['t_id'];
        return $this->render('attr',['g_id'=>$g_id,'t_id'=>$t_id]);
      }
      public function actionAttr_do()
      {
       $data = yii::$app->request->post();
       $g_id = $data['g_id'];
       $t_id = $data['t_id'];
       foreach ($data['attr_name'] as $key => $value) {
        // var_dump($value);
        $sql = "insert into attr values(null,'$value','$t_id')";
        $query = Yii::$app->db->createCommand($sql)->execute();
       }
       return $this->redirect(array('product/good_list'));
      }
      public function actionAdd_type()
      {
        return $this->render('add_type');
      }
      public function actionType()
      {
        $data = yii::$app->request->get();
        $g_id = $data['id'];
        $sql = "select * from goods_type";
        $query = Yii::$app->db->createCommand($sql)->queryAll();

        return $this->render('type',['res'=>$query,'g_id'=>$g_id]);
      }
      public function actionType_do($value='')
      {
         $data = yii::$app->request->post();
         $t_id = $data['type_id'];
         $g_id = $data['g_id'];
         $sql = "update goods set t_id = '$t_id' where g_id = '$g_id'";
         $query = Yii::$app->db->createCommand($sql)->execute();
         return $this->redirect(array('product/good_list'));
      }
      public function actionType_add($value='')
      {
        return $this->render('add_type');
      }
      public function actionType_add_do($value='')
      {
        $data = yii::$app->request->post();
        $type_name = $data['type_name'];
        $is_show = $data['is_show'];
        $sql = "insert into goods_type values(null,'$type_name','$is_show')";
        $query = Yii::$app->db->createCommand($sql)->execute();
      }
      function actionSku_attr()
      {
          $data = yii::$app->request->post();
          // var_dump($data);die;
          $arr = yii::$app->request->get();
          // var_dump($t_id);die;
          $t_id = $arr['t_id'];
          $g_id = $arr['g_id'];
          $sql2 = "select * from goods_type where type_id = '$t_id'";
          $query2 = Yii::$app->db->createCommand($sql2)->queryOne();
          // var_dump($t_id);die;
          $type_name = $query2['type_name'];
          $is_show = $query2['is_show'];
          $sql = "insert into goods_type values(null,'$type_name','$is_show')";
          $query = Yii::$app->db->createCommand($sql)->execute();
          $sql1 = "select * from goods_type where type_name = '$type_name'";
          $query1 = Yii::$app->db->createCommand($sql1)->queryOne();
          $t_id = $query1['type_id'];
          return $this->render('sku_product1',['t_id'=>$t_id,'g_id'=>$g_id]);
      }
      function actionSku_attr1()
      {
          $data = yii::$app->request->post();
          // var_dump($data);die;
          $g_id = $data['g_id'];
          $attr_name = $data['attr_name'];
          $t_id = $data['t_id'];
          $arr = array();
          foreach ($attr_name as $key => $value) {
            $sql1 = "select * from attr where attr_name='$value'and t_id='$t_id'";
            
            $query1 = Yii::$app->db->createCommand($sql1)->queryOne();
    
            if ($query1=='') {
                $sql = "insert into attr values(null,'$value','$t_id')";
                
                $query = Yii::$app->db->createCommand($sql)->execute();
                
              $str = Yii::$app->db->getLastInsertID();

              $arr[] = $str; 
            }
              
          }
           $attr_val_name = $data['attr_val_name'];
           // var_dump($attr_val_name);die;
           $a = array();
           // var_dump($arr,$attr_val_name);
         // $a=array_combine($arr,$attr_val_name);

           foreach ($attr_val_name as $key => $value) {
                $a[]=(explode(',', $value));
                
           }
           $b  = array();
            // var_dump($arr);die;
            $b = array_combine($arr,$a);
          
            foreach ($b as $k => $v) {
                foreach ($v as $k1 => $v1) {
                   $sql = "insert into attr_val values(null,'$v1','$k')";
                // var_dump($sql);
                $query = Yii::$app->db->createCommand($sql)->execute();
                }
                
             } 
           
         
          $this->render('sku_add',['g_id'=>$g_id]);
      }
      function actionSku_add()
      {
          $data = yii::$app->request->get();
          $good_id = $data['g_id'];
          $sql = "select t_id from goods where g_id = '$good_id'";
          $query = Yii::$app->db->createCommand($sql)->queryOne();
          // var_dump($query);die;
          $t_id = $query['t_id'];
          // var_dump($t_id);
          $sql1 = "select * from attr where t_id = '$t_id'";
          $query1 = Yii::$app->db->createCommand($sql1)->queryAll();
          $str = array();
          foreach ($query1 as $key => $value) {
            $attr_id = $value['attr_id'];
             $sql2 = "select att_val_id,attr_val_name from attr_val where attr_id = '$attr_id'";
             $query2 = Yii::$app->db->createCommand($sql2)->queryAll();
             $str[] = $query2;
             
          }
          return $this->render('sku_add',['arr'=>$query1,'str'=>$str,'good_id'=>$good_id]);
      }
      function actionSku_add_do($value='')
      {
        echo "<pre>";
        var_dump($data = yii::$app->request->post());
        $num = count($data['goods_id']);
        for ($i=0; $i <$num ; $i++) { 
          $goods_id = $data['goods_id'][$i];
          $sku_values_id = $data['sku_values_id'][$i];
          $sku_price = $data['price'][$i];
          $stock = $data['stock'][$i];
          $sku_values_name = $data['sku_values_name'][$i];
          $sql = "insert into sku values(null,'$goods_id','$sku_values_id','$sku_price','$stock','$sku_values_name')";
          var_dump($sql);
          $query = Yii::$app->db->createCommand($sql)->execute();

        }
        return $this->redirect(array('product/good_list'));
      }

       
      function actionSku_list()
      {
        $sql = "select * from sku ";
        $query = Yii::$app->db->createCommand($sql)->queryAll();
        $g_name  = array();
        foreach ($query as $key => $value) {
           $goods_id = $value['goods_id'];
           $sql1 = "select g_name from goods where g_id = '$goods_id'";
            $query1 = Yii::$app->db->createCommand($sql1)->queryOne();
            $g_name[] = $query1['g_name'];
        }
       
        // var_dump($g_name);
        $query = (array_combine($g_name,$query));
        // echo "<pre>";
        // var_dump($query);die;
         return $this->render('sku_list',['arr'=>$query]);
      }
      function actionSku_del()
      {
        $data = yii::$app->request->post();
        $sku_id = $data['id'];
        $sql = "delete from sku where sku_id = '$sku_id'";
         $query = Yii::$app->db->createCommand($sql)->execute();
         if ($query) {
            echo "1";
        }else{
            echo "0";
        }

      }
      function actionAttr_list()
      {
          $sql = "select * from attr";
          $query = Yii::$app->db->createCommand($sql)->queryAll();
          

          return $this->render('attr_list',['arr'=>$query]);
      }
      function actionAttr_del($value='')
      {
          $data = yii::$app->request->post();
         $attr_id = $data['id'];
         $sql = "delete from attr where attr_id = '$attr_id'";
         $query = Yii::$app->db->createCommand($sql)->execute();
         if ($query) {
            echo "1";
        }else{
            echo "0";
        }
      }
      function actionAttr_val_list()
      {
          $sql = "select * from attr_val";
          $query = Yii::$app->db->createCommand($sql)->queryAll();
          

          return $this->render('attr_val_list',['arr'=>$query]);
      }

      function actionAttr_val_del()
      {
          $data = yii::$app->request->post();
         $att_id = $data['id'];
         $sql = "delete from attr_val where att_id = '$att_id'";
         $query = Yii::$app->db->createCommand($sql)->execute();
         if ($query) {
            echo "1";
          }else{
              echo "0";
          }
      }
      //多文件上传展示页
      function actionGood_img()
      { 
        $g_id = yii::$app->request->get();
        $g_id = $g_id['g_id'];
        return $this->render('goods_img',['g_id'=>$g_id]);
      }
      //多文件上传
      function actionImg_do()
      {
        //成功上传的文件个数
        echo "<pre>";
        // var_dump($_FILES);
        $max_files=count($_FILES['myfile']['name']);    //最多上传文件的个数，与 up.htm 中的 input file  控件的个数相同
        $up_ok_files=0;     //成功上传的文件个数
        $up_folder="upload";   //保存上传文件的目标文件夹
          if(isset($_FILES['myfile'])){
             //由于 $_FILES['myfile'] 是个数组，所以需要使用循环遍历
              for($i=0;$i<$max_files;$i++){
               //如果未出错
                    if($_FILES['myfile']['error'][$i]==0){
                            if(move_uploaded_file($_FILES['myfile']['tmp_name'][$i],$up_folder."/".$_FILES['myfile']['name'][$i])){
                             //成功上传后，计数器增 1
                            $up_ok_files +=1;
                            $g_img[] =  $up_folder."/".$_FILES['myfile']['name'][$i]; 
                            }
                             else{
                              echo "<h4  style='color:red;'>在服务器中保存失败</h4>";
                             }
                    }
              }
              echo "<h4>成功上传 ".$up_ok_files. " 个文件</h4>";
             $this->redirect(array('product/goods_list'));

           }
           $data = yii::$app->request->post();
           $g_id = $data['g_id'];
                foreach ($g_img as $key => $value) {
                 $sql = "insert into goods_img values(null,'$g_id','$value')";
                 $query = Yii::$app->db->createCommand($sql)->execute();
                }   
     }
 
}	