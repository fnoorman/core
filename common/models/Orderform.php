<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property integer $orderId
 * @property string $package
 * @property string $totalPrice
 * @property string $dateTime
 */
class OrderForm extends \yii\db\ActiveRecord
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
            [['firstName', 'lastName', 'orderId', 'package', 'totalPrice'], 'required'],
            [['orderId'], 'integer'],
            [['totalPrice'], 'number'],
            [['dateTime'], 'safe'],
            [['firstName', 'lastName'], 'string', 'max' => 80],
            [['package'], 'string', 'max' => 20],
            [['type_package'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'orderId' => 'Order ID',
            'package' => 'Package',
            //'type_package' => 'Package Type',
            'totalPrice' => 'Total Price',
            'dateTime' => 'Date Time',
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
