<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property integer $userId
 * @property integer $orderId
 * @property string $package
 * @property string $type_package
 * @property string $totalPrice
 * @property integer $status
 * @property string $dateTime
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'userId', 'orderId', 'package', 'type_package', 'totalPrice'], 'required'],
            [['userId', 'orderId', 'status'], 'integer'],
            [['totalPrice'], 'number'],
            [['dateTime'], 'safe'],
            [['firstName', 'lastName'], 'string', 'max' => 80],
            [['package'], 'string', 'max' => 20],
            [['type_package'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'firstName' => Yii::t('app', 'First Name'),
            'lastName' => Yii::t('app', 'Last Name'),
            'userId' => Yii::t('app', 'User ID'),
            'orderId' => Yii::t('app', 'Order ID'),
            'package' => Yii::t('app', 'Package'),
            'type_package' => Yii::t('app', 'Type Package'),
            'totalPrice' => Yii::t('app', 'Total Price'),
            'status' => Yii::t('app', 'Status'),
            'dateTime' => Yii::t('app', 'Date Time'),
        ];
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
