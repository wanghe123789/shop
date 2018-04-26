<?php
namespace backend\controllers;
use Yii;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\Adver;

class AdverController extends Controller{
    //定义控制器
    //public $layout=false;     //关闭首页样式
   public $layout=false;
    public function init(){
    $this->enableCsrfValidation = false;
}


   public function actionStart(){    //定义一个方法  请求方法加action  调用不需要
       $data = yii::$app->db->createCommand("select * from good_cat where is_show=1")->queryAll();
       $data = $this->tree($data);
       return $this->render('adver',['data'=>$data]);   //渲染视图  展示数据
   }

  //无限极分类查询
   public function actionSelect()
   {
    $sql="select * from good_cat";
    // var_dump($sql);die;
    $query= yii::$app->db->createCommand($sql)->queryAll();
    $query = $this->tree($query);
    //var_dump($query);die;
    return $this->render('adver',['res'=>$query]);
    }

   //无限级分类
   function tree(&$list,$pid=0,$level=0,$html='=='){
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
    

    //入库
    public function actionAdd(){
      if (Yii::$app->request->post()){
        $post = Yii::$app->request->post();
        $data = Yii::$app->db->createCommand()->insert('good_cat',$post)->execute();
           if ($data) {
            echo "<script>alert('添加成功');location.href='?r=adver/save'</script>";
           } else {
            echo "<script>alert('添加失败');location.href='?r=adver/add'</script>";
           }
      }
  }


  // 展示页面(分类)
  public function actionSave(){
    $data = YII::$app->db->createCommand("select * from good_cat where is_show=1 ")->queryAll();
    $data = $this->tree($data);
    // var_dump($data);die;
    return $this->render("select",['data'=>$data]);
  }



  // 删除数据
  public function actionDel(){
      $id = Yii::$app->request->get('id');
      // var_dump($id);die;
      $db=Yii::$app->db ->createCommand()->delete('good_cat',"cat_id='$id'") ->execute(); 
      if($db){
         echo "<script>alert('删除成功');location.href='?r=adver/save'</script>";
      }else{
          // $this->redirect(['mary/show']);
          echo "<script>alert('删除失败');location.href='?r=adver/save'</script>";
          }   
     }
}