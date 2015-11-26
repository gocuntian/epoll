<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `\app\models\Question`.
 */
class QuestionSearch extends Question
{
    public function rules()
    {
        return [
            [
                [
                    'name_ua',
                    'name_ru',
                    'id_ank',
                    'id_q',
                    'id_ank',
                    'npp',
                    'q_type',
                    'answ_min',
                    'answ_max',
                    'isRandom',
                    'bbPresent',
                    'ivPresent',
                    'openQuestionAnswerMaxLength'
                ],
                'safe'
            ],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function init()
    {
    }

    public function search($params)
    {
        $query = QuestionSearch::find();

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
            'id_q' => $this->id_q,
            'id_ank' => $this->id_ank,
            'npp' => $this->npp,
            'q_type' => $this->q_type,
            'answ_min' => $this->answ_min,
            'answ_max' => $this->answ_max,
            'isRandom' => $this->isRandom,
            'bbPresent' => $this->bbPresent,
            'ivPresent' => $this->ivPresent,
            'openQuestionAnswerMaxLength' => $this->openQuestionAnswerMaxLength,
        ]);

        $query->andFilterWhere(['like', 'name_ua', $this->name_ua])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru]);

        return $dataProvider;
    }
}
