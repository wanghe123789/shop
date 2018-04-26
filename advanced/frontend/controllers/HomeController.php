<?php
namespace frontend\controllers;
header("content-type:text/html;charset=utf8");

use Yii;
use yii\web\Controller;

class HomeController extends Controller{
    public $layout=false;

    public function init(){
	    $this->enableCsrfValidation = false;
	}
   //首页
   public function actionIndex(){
		$sql = "select * from good_cat";
		$query = Yii::$app->db->createCommand($sql)->queryAll();
		// var_dump($query);die;
		$query = $this->sort($query, 0);
		// var_dump($query);die;
		$son = array();
		foreach ($query as $key => $value) {
			$son[] = $value['son'];
		}
		//查询goods_id表调转详情页
		$goods_url = yii::$app->db->createCommand("select * from `goods`")->queryAll();
		return $this->render('index',['res'=>$query,'son'=>$son,'goods_url'=>$goods_url]);
       
	}
   public function sort(&$list,$parent_id=0){
		$abc = array();
		foreach ($list as $key => $v) {
			if ($v['parent_id'] == $parent_id) {
				$abc[$key] = $v;
				$abc[$key]['son']=$this->sort($list,$v['cat_id']);
			}
		}
		return $abc;
	} 
	public function actionSearch()
	{
		
		$data = Yii::$app->request->post();
		$key = $data['key'];
		$sql = "select * from goods where g_name like '%$key%' limit 0,10";
		$query = Yii::$app->db->createCommand($sql)->queryAll();
		// var_dump($query);die;
		return $this->render('search.php',['res'=>$query]);
	}
	
}
