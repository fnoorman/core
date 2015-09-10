<?php

namespace frontend\controllers;

use common\models\Review;

class CampaignController extends \yii\web\Controller
{
    public $layout = 'columns-2';

    public function actionCreate()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->render('create');
        }else {
            return $this->actionLogin();
        }

    }

    public function actionCreateReview()
    {
        $model = new Review();
        return $this->render('review',[
            'model' => $model,
        ]);
    }

}
