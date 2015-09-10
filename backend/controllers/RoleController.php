<?php

namespace backend\controllers;

use Yii;
use common\models\RoleForm;
use yii\helpers\ArrayHelper;
use backend\models\AuthItem;
use backend\models\AuthItemChild;
use common\models\AssignmentForm;
use common\models\Role;

class RoleController extends \yii\web\Controller
{
    public $layout = 'inspinia/columns-2';
    public $message = "OK";

    public function actionIndex()
    {
        $model = new RoleForm();
        $roles = Yii::$app->rightManager->roles;

        return $this->render(
            'index',
            [
                'model'   =>$model,
                'message' =>$this->message,
                'roles'   =>$roles,
            ]
        );
    }

    public function actionCreate()
    {
        $role = new RoleForm();

        if($role->load(Yii::$app->request->post()))
        {
          if($role->AddRole())
          {
              $model = new RoleForm();
              $roles = Yii::$app->rightManager->roles;

              return $this->render(
                  'index',
                  [
                      'model'   =>$model,
                      'roles'   =>$roles,
                      'message' =>'Success'
                  ]
              );
          }
          else
          {
              $model = new RoleForm();
              return $this->render(
                  'index',
                  [
                      'model'   =>$model,
                      'message' =>'Fail to add permission'
                  ]
              );
          }
        }
        else
        {
            return $this->render(
                'index',
                [
                    'model'   =>$role,
                    'roles'   =>$roles,
                    'message' =>'Please check your input'
                ]
            );
        }
    }

    /**
     * Displays a single role .
     * @param string $name
     * @return mixed
     */
    public function actionView($name)
    {
        $model  = new AssignmentForm();
        $role   = Yii::$app->rightManager->getRole($name);

        $roles  = Yii::$app->rightManager->roles;

        // $permissions = Yii::$app->rightManager->permissions;
        $permissions = AuthItem::find()->orderBy(['type'=>SORT_ASC])->all();
        $ArrayOfPermissions = ArrayHelper::toArray($permissions);

        $assignedPermissions = Yii::$app->authManager->getPermissionsByRole($role->name);

        $ArrayOfAssignedPermissions = ArrayHelper::toArray($assignedPermissions);

        $ListOfPermission = array_diff(
            ArrayHelper::map($ArrayOfPermissions,'name','name'),
            ArrayHelper::map($ArrayOfAssignedPermissions,'name','name')
        );

        //Remove current role
        $ListOfPermission = array_diff($ListOfPermission,Array($name=>$name));

        //Find parents
        $parents = AuthItemChild::find()->where(['child'=>$name])->all();
        $ArrayOfParents = ArrayHelper::toArray($parents);

        //Remove parents
        $ListOfPermission = array_diff(
            $ListOfPermission,
            ArrayHelper::map($ArrayOfParents,'parent','parent')
        );

        //Find children
        $children = Yii::$app->rightManager->getChildren($name);
        $ArrayOfChildren = ArrayHelper::toArray($children);

        //Remove children
        $ListOfPermission = array_diff(
            $ListOfPermission,
            ArrayHelper::map($ArrayOfChildren,'name','name')
        );

        return $this->render(
            'role',
            [
                'role'                => $role,
                'ArrayOfPermissions'  => $ListOfPermission,
                'model'               => $model,
                'assignedPermissions' => Yii::$app->rightManager->getPermissionsByRole($role->name),
                'message'             => $this->message,
                'ArrayOfChildren'     => $ArrayOfChildren,
            ]
        );
    }


    public function actionAssign($name)
    {
        $assignmentForm = new AssignmentForm();

        if($assignmentForm->load(Yii::$app->request->post()))
        {
          $assignmentForm->name = $name;
          try {
            $assignmentForm->isAssignedTo();
          } catch (\Exception $e) {
            $this->message = $e->getMessage();
          }

        }
        else
        {
          $this->message = "Something wrong with post";
        }

        return $this->actionDetail($name);


    }

    public function actionRemovechild($parent,$child,$type = '2')
    {
        $auth = Yii::$app->rightManager;
        $p    = $auth->getRole($parent);

        if($type === '1')
          $c = $auth->getRole($child);
        elseif ($type === '2')
          $c = $auth->getPermission($child);

        $auth->removeChild($p,$c);
        return $this->actionDetail($parent);
    }

    public function actionDetail($name)
    {
        $auth = Yii::$app->rightManager;
        $recursiveRoles = $auth->getRecursiveAssignedRole($name);
        $recursivePermissions = $auth->getRecursiveAssignedPermission($name);
        $model = new AssignmentForm();

        return $this->render('role',[
              'roles'                 => $recursiveRoles,
              'permissions'           => $recursivePermissions,
              'name'                  => $name,
              'roleListOptions'       => $auth->getRoleOptions($name),
              'permissionListOptions' => $auth->getPermissionOptions($name),
              'model'                 => $model,
              'ascendants'            => $auth->getAscendants($name,1)
        ]);
    }

    public function actionRemove()
    {
        $roleName = Yii::$app->request->get('name');
        $type = Yii::$app->request->get('type');
        $auth = Yii::$app->rightManager;
        $role = $auth->getRole($roleName);
        if($auth->remove($role))
        {
          return $this->actionIndex();
        }
        else {
          return $this->actionIndex();
        }

    }

    public function actionLoad()
    {
        $roleName = Yii::$app->request->get('name');
        $type = Yii::$app->request->get('type');
        $auth = Yii::$app->rightManager;
        $model = new RoleForm();
        $role = $auth->getRole($roleName);
        if(isset($role)){
            $model->id = true;
        }
        $model->name = $role->name;
        $model->description = $role->description;
        $roles = Yii::$app->rightManager->roles;

        return $this->render(
            'index',
            [
                'model'   =>$model,
                'message' =>$this->message,
                'roles'   =>$roles,
            ]
        );
    }

    public function actionUpdate()
    {
        $model = new RoleForm();

        if($model->load(Yii::$app->request->post()) && $model->UpdateRole())
        {
            $model = new RoleForm();

        }
        $roles = Yii::$app->rightManager->roles;
        return $this->render(
            'index',
            [
                'model'   =>$model,
                'message' =>$this->message,
                'roles'   =>$roles,
            ]
        );


    }

}
