<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $reviewtext
 * @property int $rating
 * @property int $FK_userID
 * @property int $FK_courseID
 *
 * @property Course $fKCourse
 * @property User $fKUser
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reviewtext', 'rating', 'FK_userID', 'FK_courseID'], 'required'],
            [['rating', 'FK_userID', 'FK_courseID'], 'integer'],
            [['reviewtext'], 'string', 'max' => 1024],
            [['FK_courseID'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['FK_courseID' => 'id']],
            [['FK_userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['FK_userID' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'reviewtext' => Yii::t('app', 'Review Text'),
            'rating' => Yii::t('app', 'Rating'),
            'FK_userID' => Yii::t('app', 'User'),
            'FK_courseID' => Yii::t('app', 'Course'),
        ];
    }

    /**
     * Gets query for [[FKCourse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFKCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'FK_courseID']);
    }

    /**
     * Gets query for [[FKUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFKUser()
    {
        return $this->hasOne(User::className(), ['id' => 'FK_userID']);
    }

    public function giveReview($id){
        if($this->validate())
       {
           $review=new Review();
           $user=\Yii::$app->user;

           $review->reviewtext=$this->reviewtext;
           $review->rating=$this->rating;
           $review->FK_userID=$user;
           $review->FK_courseID=$id;

           $review->save();
        return true;
       }
        else{
            return false;
        }


    }
}
