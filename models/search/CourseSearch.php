<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * CourseSearch represents the model behind the search form of `app\models\Course`.
 */
class CourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'addDate'], 'integer'],
            [['courseName', 'courseDescription', 'imageURL','courseCategory', 'language', 'author'], 'safe'],
            [['price'], 'number'],

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
        $query = Course::find()->joinWith(['courseCategory0','author0','language0']);


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
            'course.id' => $this->id,
            //'courseCategory' => $this->courseCategory,
            //'addDate' => $this->addDate,
            //'author' => $this->author,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'course.language', $this->language])
            ->andFilterWhere(['like', 'courseName', $this->courseName])
            ->andFilterWhere(['like', 'course.courseCategory',$this->courseCategory])
            ->andFilterWhere(['like', 'course.author',$this->author])
            ->andFilterWhere(['like', 'courseDescription', $this->courseDescription])
            ->andFilterWhere(['like', 'imageURL', $this->imageURL]);
        return $dataProvider;
    }
}
