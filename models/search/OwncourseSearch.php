<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course;

/**
 * OwncourseSearch represents the model behind the search form of `app\models\Course`.
 */
class OwncourseSearch extends Course
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'courseCategory', 'addDate', 'author'], 'integer'],
            [['language', 'courseName', 'courseDescription', 'imageURL'], 'safe'],
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
        $query = Course::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'courseCategory' => $this->courseCategory,
            'addDate' => $this->addDate,
            'author' => Yii::$app->user->id,
            'price' => $this->price,
        ]);

        $query->andFilterWhere(['like', 'language', $this->language])
            ->andFilterWhere(['like', 'courseName', $this->courseName])
            ->andFilterWhere(['like', 'courseDescription', $this->courseDescription])
            ->andFilterWhere(['like', 'imageURL', $this->imageURL]);

        return $dataProvider;
    }
}
