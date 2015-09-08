<?php

namespace frontend\controllers;

class CampaignController extends \yii\web\Controller
{
    public function actionCampaign()
    {
        if (!\Yii::$app->user->isGuest) {
            $this->layout = "columns-2";
            return $this->render('campaign',['title'=> 'Campaign']);
        }else {
            return $this->actionLogin();
        }

    }

}
