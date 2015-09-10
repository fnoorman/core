<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $order_id
 * @property integer $package_id
 * @property integer $status
 * @property integer $created_by
 * @property integer $created_at
 * @property integer $user_id1
 *
 * @property User $userId1
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_id', 'package_id', 'created_by', 'user_id1'], 'required'],
            [['user_id', 'order_id', 'package_id', 'status', 'created_by', 'created_at', 'user_id1'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'package_id' => Yii::t('app', 'Package ID'),
            'status' => Yii::t('app', 'Status'),
            'created_by' => Yii::t('app', 'Created By'),
            'created_at' => Yii::t('app', 'Created At'),
            'user_id1' => Yii::t('app', 'User Id1'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserId1()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id1']);
    }

    /**
     * @inheritdoc
     * @return OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrderQuery(get_called_class());
    }
}
