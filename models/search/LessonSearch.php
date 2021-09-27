<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lesson;

/**
 * LessonSearch represents the model behind the search form of `app\models\Lesson`.
 */
class LessonSearch extends Lesson
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order'], 'integer'],
            [['lessonTitle', 'lessonDescription','courseID'], 'safe'],
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
        $query = Lesson::find()->joinWith('course');

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
            'lesson.id' => $this->id,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'lessonTitle', $this->lessonTitle])
            ->andFilterWhere(['like', 'course.courseName', $this->courseID])
            ->andFilterWhere(['like', 'lessonDescription', $this->lessonDescription]);

        if (!(Yii::$app->user->can('manager'))){
            $query->andFilterWhere([
                'course.author' => Yii::$app->user->id
            ]);

        }
        return $dataProvider;
    }
}
