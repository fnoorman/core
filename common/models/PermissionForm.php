<?php
namespace common\models;

use Yii;
use yii\base\Model;



class PermissionForm extends Model
{
    public $name;
    public $description;

    public function rules()
    {
        return [
            // username and password are both required
            ['name', 'required'],
            ['description','default']
        ];
    }

    public function AddPermission()
    {
        $auth = Yii::$app->authManager;
        $permission = $auth->createPermission($this->name);
        $permission->description = $this->description;
        return $auth->add($permission);
    }
}
