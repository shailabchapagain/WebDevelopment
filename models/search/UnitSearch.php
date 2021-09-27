<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unit;

/**
 * UnitSearch represents the model behind the search form of `app\models\Unit`.
 */
class UnitSearch extends Unit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['unitTitle', 'unitText', 'imageURL','lessonID'], 'safe'],
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
        $query = Unit::find()->joinWith('lesson')->innerJoin('course', 'lesson.courseID = course.id');

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
            'unit.id' => $this->id,
            //'lessonID' => $this->lessonID,
        ]);

        $query->andFilterWhere(['like', 'unitTitle', $this->unitTitle])
            ->andFilterWhere(['like', 'lesson.lessonTitle', $this->lessonID])
            ->andFilterWhere(['like', 'unitText', $this->unitText])
            ->andFilterWhere(['like', 'imageURL', $this->imageURL]);

        if (!(Yii::$app->user->can('manager'))){
            $query->andFilterWhere([
                'course.author' => Yii::$app->user->id
            ]);

        }

        return $dataProvider;
    }
}
