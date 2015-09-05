<?php

namespace frontend\controllers;

class VimeoController extends \yii\web\Controller
{
    public $layout ='vimeo/base';

    public function actionIndex()
    {
        return $this->render('index');

    }

}
