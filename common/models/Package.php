<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "package".
 *
 * @property integer $id
 * @property string $name
 * @property integer $maxCallOut
 * @property integer $maxAllowedCode
 * @property integer $enable
 * @property string $code
 * @property string $videoMaxSize
 * @property string $pictureMaxSize
 * @property integer $minBalance
 * @property integer $update_by
 * @property integer $updated_at
 * @property integer $create_by
 * @property integer $created_at
 * @property integer $duration
 * @property integer $expiredBy
 * @property double $price
 *
 * @property Offer[] $offers
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maxCallOut', 'maxAllowedCode', 'updated_at', 'created_at'], 'required'],
            [['maxCallOut', 'maxAllowedCode', 'enable', 'minBalance', 'update_by', 'updated_at', 'create_by', 'created_at', 'duration', 'expiredBy'], 'integer'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 80],
            [['code'], 'string', 'max' => 19],
            [['videoMaxSize', 'pictureMaxSize'], 'string', 'max' => 7],
            [['code'], 'unique'],
            ['enable','default','value'=>0],
            ['videoMaxSize','default','value'=>1000],
            ['pictureMaxSize','default','value'=>512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'maxCallOut' => Yii::t('app', 'Max. Callouts'),
            'maxAllowedCode' => Yii::t('app', 'Max. No. Code'),
            'enable' => Yii::t('app', 'Status'),
            'code' => Yii::t('app', 'Package code'),
            'videoMaxSize' => Yii::t('app', 'Video Max Size'),
            'pictureMaxSize' => Yii::t('app', 'Picture Max Size'),
            'minBalance' => Yii::t('app', 'Balance Callouts %'),
            'update_by' => Yii::t('app', 'Update By'),
            'updated_at' => Yii::t('app', 'Update At'),
            'create_by' => Yii::t('app', 'Create By'),
            'created_at' => Yii::t('app', 'Created At'),
            'duration' => Yii::t('app', 'Duration'),
            'expiredBy' => Yii::t('app', 'Expired By'),
            'price' => Yii::t('app', 'Price'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasMany(Offer::className(), ['package_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PackageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PackageQuery(get_called_class());
    }

    public function StatusDropDownOptions()
    {
        $statusLookup = Lookup::items('Status-Package');
        return $statusLookup;
        //return ArrayHelper::map($statusLookup,'code','name');
    }

    public function StatusText()
    {
        $statusLookup = Lookup::items('Status-Package');
        return $statusLookup[$this->enable];
    }

    public function ItemOfferDropDownOption()
    {
        $itemOfferLookup = Lookup::items('Item-Offer');
        return $itemOfferLookup;
    }

    public function IconOfferDropDownOption()
    {
        $iconOfferLookup = Lookup::items('Icon-Offer');
//        foreach ($iconOfferLookup as $key => $value) {
//            $iconOfferLookup[$key] = Html::tag('i',null,['class'=>'fa '.$value]);
//        }
        return $iconOfferLookup;
    }


}
