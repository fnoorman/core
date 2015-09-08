<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Package;

/**
 * PackageSearch represents the model behind the search form about `common\models\Package`.
 */
class PackageSearch extends Package
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'maxCallOut', 'maxAllowedCode', 'enable', 'minBalance', 'update_by', 'updated_at', 'create_by', 'created_at'], 'integer'],
            [['name', 'code', 'videoMaxSize', 'pictureMaxSize'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Package::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'maxCallOut' => $this->maxCallOut,
            'maxAllowedCode' => $this->maxAllowedCode,
            'enable' => $this->enable,
            'minBalance' => $this->minBalance,
            'update_by' => $this->update_by,
            'updated_at' => $this->updated_at,
            'create_by' => $this->create_by,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'videoMaxSize', $this->videoMaxSize])
            ->andFilterWhere(['like', 'pictureMaxSize', $this->pictureMaxSize]);

        return $dataProvider;
    }
}
