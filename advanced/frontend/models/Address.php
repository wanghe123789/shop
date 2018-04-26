<?php
namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $address_id
 * @property integer $user_id
 * @property string $address
 * @property integer $address_status
 * @property integer $address_time
 * @property string $user_name
 * @property string $zip_code
 * @property integer $user_tel
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'user_tel'], 'integer'],
            [['address'], 'string', 'max' => 200],
            [['user_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'address_id' => 'Address ID',
            'address' => 'Address',
            'user_name' => 'User Name',
            'user_tel' => 'User Tel',
        ];
    }
}
