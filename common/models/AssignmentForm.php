<?php
namespace common\models;

use Yii;
use yii\base\Model;
use backend\models\AuthItem;

class AssignmentForm extends Model
{
    public $assignment;
    public $type;
    public $name;

    public function rules()
    {
        return [
            // username and password are both required
            [['assignment','type'], 'required'],
        ];
    }


    public function isAssignedTo()
    {
        $auth = Yii::$app->authManager;
        $assignedTo = $auth->getRole($this->name);
        $authItem = AuthItem::findOne($this->assignment);
        if($authItem->type === 1)
        {
            $role = $auth->getRole($this->assignment);
            return $auth->addChild($assignedTo,$role);
        }
        elseif($authItem->type == 2)
        {
            $permission = $auth->getPermission($this->assignment);
            return $auth->addChild($assignedTo,$permission);
        }
    }
}
