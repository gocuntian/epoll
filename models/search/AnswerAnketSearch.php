<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnswerAnket;

/**
 * AnswerAnketSearch represents the model behind the search form about `app\models\AnswerAnket`.
 */
class AnswerAnketSearch extends AnswerAnket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_answ_ank', 'id_poll', 'id_user', 'hw_id', 'npp', 'isCompleted'], 'integer'],
            [['guid', 'dtFrom', 'dtTo', 'dtServer', 'gpsSrcFrom', 'gpsSrcTo', 'comment'], 'safe'],
            [['gpsLngFrom', 'gpsLtdFrom', 'gpsAccFrom', 'gpsLngTo', 'gpsLtdTo', 'gpsAccTo'], 'number'],
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
        $query = AnswerAnket::find();

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
            'id_answ_ank' => $this->id_answ_ank,
            'id_poll' => $this->id_poll,
            'id_user' => $this->id_user,
            'hw_id' => $this->hw_id,
            'npp' => $this->npp,
            'dtFrom' => $this->dtFrom,
            'dtTo' => $this->dtTo,
            'dtServer' => $this->dtServer,
            'gpsLngFrom' => $this->gpsLngFrom,
            'gpsLtdFrom' => $this->gpsLtdFrom,
            'gpsAccFrom' => $this->gpsAccFrom,
            'gpsLngTo' => $this->gpsLngTo,
            'gpsLtdTo' => $this->gpsLtdTo,
            'gpsAccTo' => $this->gpsAccTo,
            'isCompleted' => $this->isCompleted,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'gpsSrcFrom', $this->gpsSrcFrom])
            ->andFilterWhere(['like', 'gpsSrcTo', $this->gpsSrcTo])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
}
