<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CampaignReview]].
 *
 * @see CampaignReview
 */
class CampaignReviewQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return CampaignReview[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CampaignReview|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}