<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "video".
 *
 * @property int $id
 * @property string $videoTitle
 * @property string $videoDescription
 * @property string $videoURL
 * @property int $lessonID
 *
 * @property Lesson $lesson
 */
class Video extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'video';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['videoTitle', 'videoDescription', 'videoURL', 'lessonID'], 'required'],
            [['lessonID'], 'integer'],
            [['videoTitle'], 'string', 'max' => 45],
            [['videoDescription', 'videoURL'], 'string', 'max' => 512],
            [['lessonID'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lessonID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'videoTitle' => Yii::t('app', 'Video Title'),
            'videoDescription' => Yii::t('app', 'Video Description'),
            'videoURL' => Yii::t('app', 'Video Url'),
            'lessonID' => Yii::t('app', 'Lesson'),
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lessonID']);
    }
}
