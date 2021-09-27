<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $role_id
 * @property int $status
 * @property string|null $email
 * @property string|null $username
 * @property string|null $password
 * @property string|null $auth_key
 * @property string|null $access_token
 * @property string|null $logged_in_ip
 * @property string|null $logged_in_at
 * @property string|null $created_ip
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property string|null $banned_at
 * @property string|null $banned_reason
 *
 * @property Course[] $courses
 * @property Note[] $notes
 * @property Profile[] $profiles
 * @property QuizUser[] $quizUsers
 * @property Quiz[] $quizzes
 * @property Review[] $reviews
 * @property Role $role
 * @property UserAuth[] $userAuths
 * @property UserCourse[] $userCourses
 * @property Course[] $courses0
 * @property UserToken[] $userTokens
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id', 'status'], 'required'],
            [['role_id', 'status'], 'integer'],
            [['logged_in_at', 'created_at', 'updated_at', 'banned_at'], 'safe'],
            [['email', 'username', 'password', 'auth_key', 'access_token', 'logged_in_ip', 'created_ip', 'banned_reason'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['username'], 'unique'],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'role_id' => Yii::t('app', 'Role ID'),
            'status' => Yii::t('app', 'Status'),
            'email' => Yii::t('app', 'Email'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'access_token' => Yii::t('app', 'Access Token'),
            'logged_in_ip' => Yii::t('app', 'Logged In Ip'),
            'logged_in_at' => Yii::t('app', 'Logged In At'),
            'created_ip' => Yii::t('app', 'Created Ip'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'banned_at' => Yii::t('app', 'Banned At'),
            'banned_reason' => Yii::t('app', 'Banned Reason'),
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['author' => 'id']);
    }

    /**
     * Gets query for [[Notes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['FK_userID' => 'id']);
    }

    /**
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['user_id' => 'id']);
    }


    /**
     * Gets query for [[QuizUsers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizUsers()
    {
        return $this->hasMany(QuizUser::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Quizzes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuizzes()
    {
        return $this->hasMany(Quiz::className(), ['id' => 'quiz_id'])->viaTable('quiz_user', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['FK_userID' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * Gets query for [[UserAuths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserAuths()
    {
        return $this->hasMany(UserAuth::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourses()
    {
        return $this->hasMany(UserCourse::className(), ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Courses0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses0()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])->viaTable('user_course', ['user_id' => 'id']);
    }

    /**
     * Gets query for [[UserTokens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTokens()
    {
        return $this->hasMany(UserToken::className(), ['user_id' => 'id']);
    }

    public static function last7DaysRegistrations(){
        $query = User::find()->where(['>', 'created_at', 'UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 7 DAY))']);
        return $query->count();
    }

}
