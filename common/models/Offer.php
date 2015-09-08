<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%offer}}".
 *
 * @property integer $id
 * @property integer $item
 * @property integer $frontIcon
 * @property integer $enable
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 * @property integer $package_id
 *
 * @property Package $package
 */
class Offer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%offer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item', 'frontIcon', 'enable', 'created_at', 'created_by', 'updated_at', 'updated_by', 'package_id'], 'integer'],
            [['package_id','item'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'item' => Yii::t('app', 'Item'),
            'frontIcon' => Yii::t('app', 'Front Icon'),
            'enable' => Yii::t('app', 'Enable'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'package_id' => Yii::t('app', 'Package ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Package::className(), ['id' => 'package_id']);
    }

    /**
     * @inheritdoc
     * @return OfferQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OfferQuery(get_called_class());
    }
}
