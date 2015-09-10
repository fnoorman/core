<?php

namespace backend\controllers;

use Yii;
use common\models\PermissionForm;

class PermissionController extends \yii\web\Controller
{
    public $layout = 'inspinia/columns-2';
    public $message = "OK";

    public function actionIndex()
    {
        $model = new PermissionForm();
        $permissions = Yii::$app->rightManager->permissions;
        return $this->render(
            'index',
            [
                'permissions' =>$permissions,
                'model'       =>$model,
                'message'     =>$this->message,
            ]
        );
    }

    public function actionCreate()
    {
        $permission = new PermissionForm ();
        if($permission->load(Yii::$app->request->post()))
        {
          if($permission->AddPermission())
          {
              $model = new PermissionForm();
              $permissions = Yii::$app->authManager->permissions;
              return $this->render(
                  'index',
                  [
                      'model'   =>$model,
                      'permissions'   =>$permissions,
                      'message' =>'Success'
                  ]
              );
          }
          else
          {
              $model = new PermissionForm();
              return $this->render(
                  'index',
                  [
                      'model'   =>$model,
                      'message' =>'Fail'
                  ]
              );
          }
        }
        else
        {
            return $this->render(
                'index',
                [
                    'model'   =>$permission,
                    'permissions'   =>$permissions,
                    'message' =>'Fail'
                ]
            );
        }
    }

}
