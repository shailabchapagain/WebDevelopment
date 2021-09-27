<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "language".
 *
 * @property string $ISO
 * @property string $language
 *
 * @property Course[] $courses
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'language';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ISO', 'language'], 'required'],
            [['ISO'], 'string', 'max' => 2],
            [['language'], 'string', 'max' => 100],
            [['ISO'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ISO' => Yii::t('app', 'ISO Code'),
            'language' => Yii::t('app', 'Language'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['language' => 'ISO']);
    }


    public static function getAllLanguageAsArray(){
        $query=Language::find()
            ->orderBy([
                'language' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'ISO', 'language');
        return($data);
    }


}
