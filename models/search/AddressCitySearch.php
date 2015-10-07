<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AddressCity;

/**
 * AddressCitySearch represents the model behind the search form about `app\models\AddressCity`.
 */
class AddressCitySearch extends AddressCity
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'c_type_id', 'is_grp', 'parent_id'], 'integer'],
            [['c_name'], 'safe'],
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
        $query = AddressCity::find();

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
            'c_type_id' => $this->c_type_id,
            'is_grp' => $this->is_grp,
            'parent_id' => $this->parent_id,
        ]);

        $query->andFilterWhere(['like', 'c_name', $this->c_name]);

        return $dataProvider;
    }
}
