<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property int $id
 * @property string $unitTitle
 * @property string $unitText
 * @property string $imageURL
 * @property int $lessonID
 *
 * @property Lesson $lesson
 */
class Unit extends \yii\db\ActiveRecord
{
    public $img;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['unitTitle', 'unitText', 'imageURL','img' ,'lessonID'], 'required'],
            [['unitText'], 'string'],
            [['lessonID'], 'integer'],
            [['unitTitle'], 'string', 'max' => 45],
            [['imageURL'], 'string', 'max' => 512],
            [['img'],'file'],
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
            'unitTitle' => Yii::t('app', 'Unit Title'),
            'unitText' => Yii::t('app', 'Unit Text'),
            'img' => Yii::t('app', 'Upload Image'),
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

    public static function getNextId(){
        $query = Unit::find()->limit(1)->orderBy('id DESC')->one();
        return $query->id+1;
    }




}
