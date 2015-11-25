<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User as UserModel;

/**
 * User represents the model behind the search form about `\app\models\User`.
 */
class User extends UserModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hw_id', 'has_car', 'id_role'], 'integer'],
            [
                [
                    'user_fname',
                    'user_lname',
                    'user_mname',
                    'user_login',
                    'user_pass',
                    'date_nar',
                    'stat',
                    'dom_addr',
                    'tel_num',
                    'email',
                    'dtFrom',
                    'dtTo',
                    'lang'
                ],
                'safe'
            ],
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
        $query = UserModel::find();

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
            'hw_id' => $this->hw_id,
            'date_nar' => $this->date_nar,
            'has_car' => $this->has_car,
            'dtFrom' => $this->dtFrom,
            'dtTo' => $this->dtTo,
            'id_role' => $this->id_role,
        ]);

        $query->andFilterWhere(['like', 'user_fname', $this->user_fname])
            ->andFilterWhere(['like', 'user_lname', $this->user_lname])
            ->andFilterWhere(['like', 'user_mname', $this->user_mname])
            ->andFilterWhere(['like', 'user_login', $this->user_login])
            ->andFilterWhere(['like', 'user_pass', $this->user_pass])
            ->andFilterWhere(['like', 'stat', $this->stat])
            ->andFilterWhere(['like', 'dom_addr', $this->dom_addr])
            ->andFilterWhere(['like', 'tel_num', $this->tel_num])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'lang', $this->lang]);

        return $dataProvider;
    }
}
