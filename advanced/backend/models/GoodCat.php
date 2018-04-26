<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "good_cat".
 *
 * @property integer $cat_id
 * @property string $cat_name
 * @property string $cat_path
 * @property integer $parent_id
 * @property string $cat_desc
 * @property integer $is_show
 * @property integer $cat_sort
 */
class GoodCat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'good_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id', 'is_show', 'cat_sort'], 'integer'],
            [['cat_desc'], 'string'],
            [['cat_name'], 'string', 'max' => 50],
            [['cat_path'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cat_id' => 'Cat ID',
            'cat_name' => 'Cat Name',
            'cat_path' => 'Cat Path',
            'parent_id' => 'Parent ID',
            'cat_desc' => 'Cat Desc',
            'is_show' => 'Is Show',
            'cat_sort' => 'Cat Sort',
        ];
    }
}
