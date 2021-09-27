<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UserCourse;

/**
 * UserCourseSearch represents the model behind the search form of `app\models\UserCourse`.
 */
class UserCourseSearch extends UserCourse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'subscribed_at'], 'integer'],
            [['user_id', 'course_id',], 'safe'],
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
        $query = UserCourse::find()->joinWith(['course', 'user']);

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
            //'user_id' => $this->user_id,
            //'course_id' => $this->course_id,
            'subscribed_at' => $this->subscribed_at,
        ]);
        $query->andFilterWhere(['like', 'course.courseName', $this->course_id])
            ->andFilterWhere(['like', 'user.username', $this->user_id]);

        if (!(Yii::$app->user->can('manager'))){
            $query->andFilterWhere([
                'course.author' => Yii::$app->user->id
            ]);

        }

        return $dataProvider;
    }
}
