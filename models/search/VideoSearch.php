<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Video;

/**
 * VideoSearch represents the model behind the search form of `app\models\Video`.
 */
class VideoSearch extends Video
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['videoTitle', 'videoDescription', 'videoURL','lessonID'], 'safe'],
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
        $query = Video::find()->joinWith('lesson')->innerJoin('course', 'lesson.courseID = course.id');;

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
            'video.id' => $this->id,
            //'lessonID' => $this->lessonID,
        ]);

        $query->andFilterWhere(['like', 'videoTitle', $this->videoTitle])
            ->andFilterWhere(['like', 'lesson.lessonTitle', $this->lessonID])
            ->andFilterWhere(['like', 'videoDescription', $this->videoDescription])
            ->andFilterWhere(['like', 'videoURL', $this->videoURL]);

        if (!(Yii::$app->user->can('manager'))){
            $query->andFilterWhere([
                'course.author' => Yii::$app->user->id
            ]);

        }

        return $dataProvider;
    }
}
