<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Review;

/**
 * ReviewSearch represents the model behind the search form of `app\models\Review`.
 */
class ReviewSearch extends Review
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'rating'], 'integer'],
            [['reviewtext','FK_userID', 'FK_courseID'], 'safe'],
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
        $query = Review::find()->joinWith(['fKCourse', 'fKUser']);

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
            'review.id' => $this->id,
            'rating' => $this->rating,
            //'FK_userID' => $this->FK_userID,
            //'FK_courseID' => $this->FK_courseID,
        ]);

        $query->andFilterWhere(['like', 'reviewtext', $this->reviewtext])
            ->andFilterWhere(['like', 'user.username', $this->FK_userID])
            ->andFilterWhere(['like', 'course.courseName', $this->FK_courseID]);

        return $dataProvider;
    }
}
