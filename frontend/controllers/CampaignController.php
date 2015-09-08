<?php

namespace frontend\controllers;

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

}
