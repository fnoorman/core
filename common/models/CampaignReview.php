<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "campaign_review".
 *
 * @property integer $id
 * @property string $review_content
 */
class CampaignReview extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campaign_review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['review_content'], 'required'],
            [['review_content'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'review_content' => Yii::t('app', 'Review Content'),
        ];
    }

    /**
     * @inheritdoc
     * @return CampaignReviewQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CampaignReviewQuery(get_called_class());
    }
}
