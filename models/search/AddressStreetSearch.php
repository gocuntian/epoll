<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AddressStreet;

/**
 * AddressStreetSearch represents the model behind the search form about `app\models\AddressStreet`.
 */
class AddressStreetSearch extends AddressStreet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 's_type_id', 'owner_id'], 'integer'],
            [['s_name'], 'safe'],
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
        $query = AddressStreet::find();

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
            's_type_id' => $this->s_type_id,
            'owner_id' => $this->owner_id,
        ]);

        $query->andFilterWhere(['like', 's_name', $this->s_name]);

        return $dataProvider;
    }
}
