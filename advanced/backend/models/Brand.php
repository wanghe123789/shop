<?php

namespace app\models;

use yii\db\ActiveRecord;

class Brand extends ActiveRecord
{
    
    
    public static function tableName()
    {
        return 'brand';
    }
    
    //添加
    public function add($data){
    	// 插入新记录
		$customer = new brand();
		$customer->name = $data['name'];
		$customer->discribe= $data['discribe'];
		$customer->face = $data['face'];
		return $customer->save();
	}


	// public function show(){
	// 	$customers = Brand::find()
	// 	    ->asArray()
	// 	    ->all();
	// 	return $customers;
	// }
	// //删除
	// public function del($id){
	// 	$customer = Brand::findOne($id);
	// 	return $customer->delete();
	// }


	//图片上传
//   class Upload extends CActiveRecord {
//   public $image;
//   public static function model($brand = __CLASS__) {
//     return $className;
//   }
//   public function tableName() {
//     return '{{brand}}';
//   }
//   public function rules() {
//     return array(
//       array('image', 'file', 'types'=>'jpg, gif, png')
//     );
//   }
// }
}