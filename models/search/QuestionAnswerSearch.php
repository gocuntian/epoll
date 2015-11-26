<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuestionAnswer;

/**
 * QuestionAnswerSearch represents the model behind the search form about `\app\models\QuestionAnswer`.
 */
class QuestionAnswerSearch extends QuestionAnswer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [
                [
                    'separator',
                    'name_ua',
                    'name_ru',
                    'id_av',
                    'id_q',
                    'npp',
                    'isHidden',
                    'hasText',
                    'textMaxLength',
                    'isNoRandomized'
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
        $query = QuestionAnswer::find();

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
            'id_av' => $this->id_av,
            'id_q' => $this->id_q,
            'npp' => $this->npp,
            'isHidden' => $this->isHidden,
            'hasText' => $this->hasText,
            'textMaxLength' => $this->textMaxLength,
            'isNoRandomized' => $this->isNoRandomized,
        ]);

        $query->andFilterWhere(['like', 'separator', $this->separator])
            ->andFilterWhere(['like', 'name_ua', $this->name_ua])
            ->andFilterWhere(['like', 'name_ru', $this->name_ru]);

        return $dataProvider;
    }
}
