<?php

namespace app\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "user_course".
 *
 * @property int $user_id
 * @property int $course_id
 * @property int|null $subscribed_at
 *
 * @property Course $course
 * @property User $user
 */
class UserCourse extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'course_id'], 'required'],
            [['user_id', 'course_id', 'subscribed_at'], 'integer'],
            [['user_id', 'course_id'], 'unique', 'targetAttribute' => ['user_id', 'course_id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('app', 'User'),
            'course_id' => Yii::t('app', 'Course'),
            'subscribed_at' => Yii::t('app', 'Subscribed At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public static function totalStudentsOfTeacher(){
        $id = Yii::$app->user->id;
        $query = UserCourse::find()->joinWith('course', 'course')->where(['course.author' => $id]);
        return $query->count();
    }

    public static function mostPopularCourseOfTeacher(){
        $id = Yii::$app->user->id;
        $query = UserCourse::find()->select(['COUNT(*) AS cnt', 'user_course.*', 'course.*'])->joinWith('course', 'course')->where(['course.author' => $id])->groupBy('course_id')->orderBy('cnt');
        $mostPopularSub = $query->one();
        if ($mostPopularSub == null){
            return "NO COURSES FOUND";
        }
        return $mostPopularSub->course->courseName;
    }
    public static function mostPopularCourseListOfTeacher(){
        $id = Yii::$app->user->id;
        $query = UserCourse::find()->select(['COUNT(*) AS cnt', 'user_course.*', 'course.*'])->joinWith('course', 'course')->where(['course.author' => $id])->groupBy('course_id')->orderBy('cnt')->limit(6);
        return $query->all();
    }

    public static function mostRecentEnrollmentOfTeacher(){
        $id = Yii::$app->user->id;
        $query = UserCourse::find()->joinWith('course')->where(['course.author' => $id])->orderBy('subscribed_at DESC')->limit(6);
        return $query->all();
    }



    public static function totalStudents(){
        $query = UserCourse::find()->joinWith('course', 'course');
        return $query->count();
    }

    public static function mostPopularCourse(){
        $query = UserCourse::find()->select(['COUNT(*) AS cnt', 'user_course.*', 'course.*'])->joinWith('course', 'course')->groupBy('course_id')->orderBy('cnt');
        $mostPopularSub = $query->one();
        return $mostPopularSub->course->courseName;
    }
    public static function mostPopularCourseList(){
        $query = UserCourse::find()->select(['COUNT(*) AS cnt', 'user_course.*', 'course.*'])->joinWith('course', 'course')->groupBy('course_id')->orderBy('cnt')->limit(6);
        return $query->all();
    }

    public static function mostRecentEnrollment(){
        $query = UserCourse::find()->joinWith('course')->orderBy('subscribed_at DESC')->limit(6);
        return $query->all();
    }

    public static function totalRevenue(){
        $query = UserCourse::find()->joinWith('course', 'course')->sum('course.price');
        return $query;
    }


    public static function last7DaysEnrollments(){
        $query = UserCourse::find()->where(['>', 'subscribed_at', 'UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY))']);
        return $query->count();
    }

    public static function last7DaysRevenue(){
        $query = UserCourse::find()->joinWith('course', 'course')->where(['>', 'subscribed_at', 'UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY))'])->sum('course.price');
        return $query;
    }

    public static function getMyEnrollments(){
        $id = Yii::$app->user->id;
        $query = UserCourse::find()->joinWith('course')
            ->where('user_course.user_id ='.Yii::$app->user->id)->orderBy('user_course.subscribed_at DESC');

        return $query->all();

    }

}
