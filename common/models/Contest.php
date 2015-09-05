<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%contest}}".
 *
 * @property integer $id
 * @property integer $contest_id
 * @property integer $question_id
 * @property integer $question_type
 * @property string $question
 * @property string $answer
 * @property integer $status
 */
class Contest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%contest}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['contest_id', 'question_id', 'question', 'answer'], 'required'],
            [['contest_id', 'question_id', 'question_type', 'status'], 'integer'],
            [['question', 'answer'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'contest_id' => Yii::t('app', 'Contest ID'),
            'question_id' => Yii::t('app', 'Question ID'),
            'question_type' => Yii::t('app', 'Question Type'),
            'question' => Yii::t('app', 'Question'),
            'answer' => Yii::t('app', 'Answer'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @inheritdoc
     * @return ContestQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContestQuery(get_called_class());
    }
}
