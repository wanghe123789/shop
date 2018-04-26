<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Brand;

class BrandController extends Controller{
   
    /*防crsf攻击 顶栏黑框消失*/
    public $layout=false;
    public function init(){
    
    $this->enableCsrfValidation = false;
  }

  //指像品牌展示页面
  public function actionIndex(){
  		$data = YII::$app->db->createCommand("select * from brand")->queryAll();
		return $this->render("admin_Competence",array('data'=>$data));
  }


  //进行接值，入库
  public function actionAdd(){
		
			return $this->render("Add_Brand");
		}

		//入库
	public function actionAdd_do(){
		$db = new Brand;
		
		$data = Yii::$app->request->post();
		$db->name = $data['name'];
        $db->hao = $data['hao'];
        $db->discribe = $data['discribe'];
        $img = $_FILES;
        $name = $_FILES['face']['name'];
        $file = "./upload/".$name;
        $tmp_name = $_FILES['face']['tmp_name'];
        $e = move_uploaded_file($tmp_name,$file);
        $db->face = $file;
        //$db->discribe = $data['discribe'];
        $sql = $db->save();
        if ($sql) {
        	echo "<script>alert('添加成功');location.href='?r=brand/index'</script>";
        }else{
        	echo "<script>alert('添加失败');location.href='?r=brand/add_do'</script>";
        }
        //$this->redirect(['brand/index']);
	}

	//进行数据的删除
	public function actionDel()
	{
		$id = Yii::$app->request->get('id');
    	//var_dump($id);
  		$db=Yii::$app->db ->createCommand()->delete('brand',"id=$id") ->execute(); 
	    if($db){
	       echo "<script>alert('删除成功');location.href='?r=brand/index'</script>";
	    }else{
	        // $this->redirect(['mary/show']);
	        echo "<script>alert('删除失败');</script>";
	    }   

	 }

	//进行数据的修改
	 public function actionUpdate($id){
	  	$connection =Yii::$app->db;
	   	$command = $connection->createCommand("select * from brand where id=$id");
		  $posts = $command->queryOne();
		  return $this->render('update',['posts'=>$posts]);
	 }
	 public function actionUpdate_do(){
      $files = $_FILES;
  	 	$id = $_POST['id'];
  		$post = Yii::$app->request->post();
      //var_dump($post);die;
  		$name = $post['name'];
      $hao = $post['hao'];
  		$discribe = $post['discribe'];
          
  		//$command = Yii::$app->db->createCommand()->update('brand', ['name' => $name],'id = '.$id)->execute();
      if ($files['face']['name'] == '') {
        
        $command = Yii::$app->db->createCommand("update brand set name='$name',hao='$hao',discribe = '$discribe' where id = $id")->execute();
      } 
      else {

        $img_name = $_FILES['face']['name'];
        $file = "./upload/".$img_name;
        $tmp_name = $_FILES['face']['tmp_name'];
        $discribe = $post['discribe'];
        $e = move_uploaded_file($tmp_name,$file);
        //echo $e;
        $command = Yii::$app->db->createCommand("update brand set name='$name',hao='$hao',face='$file',discribe = '$discribe' where id = $id")->execute();
      }
  		if ($command) {
  			$this->redirect(['brand/index']);
  		}else{
  			echo "修改失败";	
  		}
	 	}

  // public function actionIndex() {
  //   $model=new Upload;
  //   if(isset($_POST['Upload'])) {
  //     $model->image=CUploadedFile::getInstance($model,'image');
  //     $ext = $model->image->getExtensionName();
  //     $fileName = uniqid() . '.' . $ext;
  //     $model->image->saveAs('assets/' . $fileName);
  //   }
  //   $this->renderPartial('index', array('model'=>$model));
  // }

}

