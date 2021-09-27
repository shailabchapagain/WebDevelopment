<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $lessonTitle
 * @property string $lessonDescription
 * @property int $courseID
 * @property int $order
 *
 * @property Course $course
 * @property Unit[] $units
 * @property Video[] $videos
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lessonTitle', 'lessonDescription', 'courseID','order'], 'required'],
            [['courseID','order'], 'integer'],
            [['lessonTitle'], 'string', 'max' => 45],
            [['lessonDescription'], 'string', 'max' => 1024],
            [['courseID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['courseID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lessonTitle' => Yii::t('app', 'Lesson Title'),
            'lessonDescription' => Yii::t('app', 'Lesson Description'),
            'courseID' => Yii::t('app', 'Course'),
            'order'=>'order',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'courseID']);
    }


    /**
     * Gets query for [[Units]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnits()
    {
        return $this->hasMany(Unit::className(), ['lessonID' => 'id']);
    }

    /**
     * Gets query for [[Videos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVideos()
    {
        return $this->hasMany(Video::className(), ['lessonID' => 'id']);
    }
    public static function getAllLessonAsArray(){
        $query=Lesson::find()
            ->orderBy([
                'lessonTitle' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'lessonTitle');
        return($data);
    }

    public function getLessonUnits($id){
        $query = Unit::find()->where(['lessonID'=>$id])->all();
        return $query;
    }

    public static function getAllMyLessonAsArray(){
        $query=Lesson::find()
            ->joinWith('course')
            ->where(['course.author' => Yii::$app->user->id])
            ->orderBy([
                'order' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'lessonTitle');
        return($data);
    }




}
