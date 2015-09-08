<?php

namespace common\models;

use Yii;
use common\models\Lookup;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%package}}".
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
 * @property integer $update_at
 * @property integer $create_by
 * @property integer $created_at
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
        return '{{%package}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),

        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['maxCallOut', 'maxAllowedCode'], 'required'],
            [['maxCallOut', 'maxAllowedCode', 'enable', 'minBalance', 'update_by', 'update_at', 'create_by', 'created_at'], 'integer'],
            [['name'], 'string', 'max' => 80],
            [['code'], 'string', 'max' => 19],
            [['videoMaxSize', 'pictureMaxSize'], 'string', 'max' => 7],
            [['code'], 'unique']
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
            'minBalance' => Yii::t('app', 'Balance Callouts'),
            'update_by' => Yii::t('app', 'Update By'),
            'update_at' => Yii::t('app', 'Update At'),
            'create_by' => Yii::t('app', 'Create By'),
            'created_at' => Yii::t('app', 'Created At'),
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
}
