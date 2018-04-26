<?php

namespace app\models;

use yii\db\ActiveRecord;

class AdverForm extends ActiveRecord
{
    //定义属性
    public $cat_name;
    public $parent_id;
    public $cat_desc;
    public $is_show;
    public $cat_sort;


    public function rules(){
        return [
            [['cat_name', 'parent_id','cat_desc','is_show','cat_sort'],'required'],               
        ];
    }
}