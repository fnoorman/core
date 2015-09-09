<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Topup;

/**
 * TopupSearch represents the model behind the search form about `common\models\Topup`.
 */
class TopupSearch extends Topup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'total_callout', 'enable'], 'integer'],
            [['top_package'], 'safe'],
            [['rate', 'price'], 'number'],
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
        $query = Topup::find();

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
            'rate' => $this->rate,
            'total_callout' => $this->total_callout,
            'price' => $this->price,
            'enable' => $this->enable,
        ]);

        $query->andFilterWhere(['like', 'top_package', $this->top_package]);

        return $dataProvider;
    }
}
