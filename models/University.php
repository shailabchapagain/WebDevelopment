<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "university".
 *
 * @property int $id
 * @property string $universityname
 * @property string $universitycountry
 */
class University extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'university';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['universityname', 'universitycountry'], 'required'],
            [['universityname'], 'string', 'max' => 255],
            [['universitycountry'], 'string', 'max' => 45],
            [['universityname'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'universityname' => Yii::t('app', 'University Name'),
            'universitycountry' => Yii::t('app', 'University Country'),
        ];
    }
}
