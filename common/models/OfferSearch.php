<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offer;

/**
 * TopupSearch represents the model behind the search form about `common\models\Topup`.
 */
class OfferSearch extends Offer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
          [['item', 'frontIcon', 'enable', 'created_at', 'created_by', 'updated_at', 'updated_by', 'package_id'], 'integer'],
          [['package_id','item'], 'safe'],
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
        $query = Offer::find();

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
            'item' => $this->item,
            'frontIcon' => $this->frontIcon,
            'enable' => $this->enable,
        ]);

        //$query->andFilterWhere(['like', 'item', $this->item]);

        return $dataProvider;
    }


}
