<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class Role extends Model
{
    public $name;
    private $_permissions;
    private $_childrenItem;
    public $children;
    public $_associateRoles;
    public $availablePermissions;
    public $PermissionOptions;
    public $RoleOptions;

    private function recursiveAssociatedRole($name)
    {
          $auth = Yii::$app->authManager;
          $childrenItem = $auth->getChildren($name);
          foreach ($childrenItem as $childItem)
          {
              if($childItem->type == 1)
              {
                  $this->_associateRoles[$childItem->name] = ['item' => $childItem, 'enableDelete' => false];
                  $this->recursiveAssociatedRole($childItem->name);
              }
          }
    }

    public function listOfRole($name = null)
    {
          if(isset($name))
            $this->name = $name;
          $this->_associateRoles = [];
          $this->recursiveAssociatedRole($this->name);
          $auth = Yii::$app->authManager;
          $this->children = $auth->getChildren($this->name);
          foreach ($this->children as $child) {
              if(ArrayHelper::keyExists($child->name,$this->_associateRoles,false))
                $this->_associateRoles[$child->name]['enableDelete'] = true;
          }
          return $this->_associateRoles;
    }

    public function AssignedPermissions()
    {
          $auth = Yii::$app->rightManager;
          $temp = $auth->getPermissionsByRole($this->name);
          $childArray = ArrayHelper::toArray($this->children);
          $childArrayMap = ArrayHelper::map($childArray,'name','type');
          $permissionArray = ArrayHelper::toArray($temp);
          $permissionArrayMap = ArrayHelper::map($permissionArray,'name','type');
          $this->_permissions = [];

          foreach ($permissionArrayMap as $key => $value) {
              if(ArrayHelper::keyExists($key,$childArrayMap,false))
              {
                  $this->_permissions[$key] = ['name'=>$key,'enableDelete'=>true,'type'=>$value];
              }
              else
              {
                  $this->_permissions[$key] = ['name'=>$key,'enableDelete'=>false,'type'=>$value];
              }
          }

          $this->PermissionOptions = $this->queryPermissionOptions();
          $this->PermissionOptions = array_diff($this->PermissionOptions,ArrayHelper::map($permissionArray,'name','name'));

          $this->RoleOptions = $this->queryRoleOptions();
          $x = ArrayHelper::map($this->_associateRoles,'name','name');
          $this->RoleOptions = array_diff_assoc($this->RoleOptions,$x);

          unset($childArrayMap);
          unset($childArray);
          unset($permissionArrayMap);
          unset($permissionArray);

          return $this->_permissions;
    }

    public function queryPermissionOptions()
    {
        $auth = Yii::$app->authManager;
        $temp = $auth->getPermissions();
        $permissionArray = ArrayHelper::toArray($temp);
        $permissionArrayMap = ArrayHelper::map($permissionArray,'name','name');
        return $permissionArrayMap;

    }

    public function queryRoleOptions()
    {
        $auth = Yii::$app->authManager;
        $temp = $auth->getRoles();
        $roleArray = ArrayHelper::toArray($temp);
        $roleArrayMap = ArrayHelper::map($roleArray,'name','name');
        return $roleArrayMap;
    }

}
