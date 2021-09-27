<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 * @property string $imgURL
 * @property string $description
 *
 * @property Course[] $courses
 */
class Category extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'imgURL','file','description'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['imgURL'], 'string', 'max' => 512],
            [['file'],'file'],
            [['description'], 'string', 'max' => 1024],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'file' => Yii::t('app', 'Upload Image'),
            'description' => Yii::t('app', 'Description'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['courseCategory' => 'id']);
    }
    public static function getAllCategoryAsArray(){
        $query=Category::find()
            ->orderBy([
                'name' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'name');
        return($data);
    }

    public static function getNextId(){
        $query = Category::find()->limit(1)->orderBy('id DESC')->one();
        return $query->id + 1;


    }
}
