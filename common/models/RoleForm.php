<?php
namespace common\models;

use Yii;
use yii\base\Model;



class RoleForm extends Model
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

    public function AddRole()
    {
        $auth = Yii::$app->authManager;
        $role = $auth->createRole($this->name);
        $role->description = $this->description;
        return $auth->add($role);
    }
}
