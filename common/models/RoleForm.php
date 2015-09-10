<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\ErrorException;



class RoleForm extends Model
{
    public $name;
    public $description;
    public $id = false;
    public $originalRole;

    public function rules()
    {
        return [
            // username and password are both required
            ['name', 'required'],
            ['description','default'],
            [['id','originalRole'],'safe']
        ];
    }

    public function AddRole()
    {
        $auth = Yii::$app->rightManager;
        $role = $auth->createRole($this->name);
        $role->description = $this->description;
        return $auth->add($role);
    }

    public function UpdateRole(){
        $auth = Yii::$app->rightManager;
        $role = $auth->getRole($this->originalRole);
        $role->name = $this->name;
        $role->description = $this->description;
        try {
            $auth->update($this->originalRole,$role);
            return true;
        } catch (ErrorException $e) {
            $this->addError('name','Updating role has some problems');
            return false;
        }

    }
}
