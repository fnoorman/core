<?php

namespace common\models;

use Yii;
use common\models\Lookup;
/**
 * This is the model class for table "topup".
 *
 * @property integer $id
 * @property string $top_package
 * @property double $rate
 * @property integer $total_callout
 * @property double $price
 * @property integer $enable
 */
class Topup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'topup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['top_package', 'rate', 'total_callout', 'price', 'enable'], 'required'],
            [['rate', 'price'], 'number'],
            [['total_callout', 'enable'], 'integer'],
            [['top_package'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'top_package' => Yii::t('app', 'Callouts Package'),
            'rate' => Yii::t('app', 'Rate (RM)'),
            'total_callout' => Yii::t('app', 'Total Callout'),
            'price' => Yii::t('app', 'Price  (RM)'),
            'enable' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return TopupQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TopupQuery(get_called_class());
    }

    public function StatusText()
    {
        $statusLookup = Lookup::items('Status-Package');
        return $statusLookup[$this->enable];
    }

    public function StatusDropDownOptions()
    {
        $statusLookup = Lookup::items('Status-Package');
        return $statusLookup;
        //return ArrayHelper::map($statusLookup,'code','name');
    }
}
