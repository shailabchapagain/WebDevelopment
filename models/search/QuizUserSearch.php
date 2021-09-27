<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\QuizUser;

/**
 * QuizUserSearch represents the model behind the search form of `app\models\QuizUser`.
 */
class QuizUserSearch extends QuizUser
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attempted_on'], 'integer'],
            [['score'], 'number'],
            [['quiz_id', 'user_id'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = QuizUser::find()->joinWith(['quiz','user']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [ 'pageSize' => 10 ]

        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            //'quiz_id' => $this->quiz_id,
            //'user_id' => $this->user_id,
            'attempted_on' => $this->attempted_on,
            'score' => $this->score,
        ]);

        $query->andFilterWhere(['like', 'quiz.quizTitle', $this->quiz_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id]);

        return $dataProvider;
    }
}
