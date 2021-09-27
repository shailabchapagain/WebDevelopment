<?php

namespace app\models;

use app\models\search\CourseSearch;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string $language
 * @property string $courseName
 * @property int $courseCategory
 * @property string $courseDescription
 * @property string $imageURL
 * @property int $addDate
 * @property int $author
 * @property float $price
 *
 * @property User $author0
 * @property Category $courseCategory0
 * @property Language $language0
 * @property Lesson[] $lessons
 * @property Review[] $reviews
 * @property UserCourse[] $userCourses
 * @property User[] $users
 */
class Course extends \yii\db\ActiveRecord
{
    public $img;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['language', 'courseName', 'courseCategory','img', 'courseDescription', 'imageURL', 'addDate', 'author', 'price'], 'required'],
            [['courseCategory', 'addDate', 'author'], 'integer'],
            [['price'], 'number'],
            [['language'], 'string', 'max' => 2],
            [['courseName'], 'string', 'max' => 255],
            [['courseDescription'], 'string', 'max' => 2048],
            [['imageURL'], 'string', 'max' => 512],
            [['img'],'file'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author' => 'id']],
            [['courseCategory'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['courseCategory' => 'id']],
            [['language'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language' => 'ISO']],
        ];
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'language' => Yii::t('app', 'Course Language'),
            'courseName' => Yii::t('app', 'Course Name'),
            'courseCategory' => Yii::t('app', 'Course Category'),
            'courseDescription' => Yii::t('app', 'Course Description'),
            'img' => Yii::t('app', 'Upload Image'),
            'addDate' => Yii::t('app', 'Add Date'),
            'author' => Yii::t('app', 'Author'),
            'price' => Yii::t('app', 'Price'),
            'courseCategory0.name' => Yii::t('app', 'Category'),

        ];
    }



    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }


    /**
     * Gets query for [[CourseCategory0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseCategory0()
    {
        return $this->hasOne(Category::className(), ['id' => 'courseCategory']);
    }

    /**
     * Gets query for [[Language0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage0()
    {
        return $this->hasOne(Language::className(), ['ISO' => 'language']);
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['courseID' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::className(), ['FK_courseID' => 'id']);
    }

    /**
     * Gets query for [[UserCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourses()
    {
        return $this->hasMany(UserCourse::className(), ['course_id' => 'id']);
    }


    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_course', ['course_id' => 'id']);
    }

    public static function getNextId(){
        $query = Course::find()->limit(1)->orderBy('id DESC')->one();
        return $query->id + 1;
    }

    public function findLesson($id){
        $les=Course::findOne($id)->getLessons()
            ->all();
        return $les;
    }

    public function countLesson($id){
        $lessons= Course::findone($id)->getLessons()->count();
        return $lessons;

    }
    public function countReview($id){
        $Reviews= Course::findone($id)->getReviews()->count();
        return $Reviews;
    }
    public function averageReview($id){
        $avgReviews= Course::findone($id)->getReviews()
            ->select('rating' )
            ->average('rating');
        return  round($avgReviews,0);
    }


    public static function getAllCourseAsArray(){
        $query=Course::find()
            ->orderBy([
                'courseName' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'courseName');
        return($data);
    }

    public static function getMyCourseAsArray(){
        $query=Course::find()
            ->where(['author' => Yii::$app->user->id])
            ->orderBy([
                'courseName' => SORT_ASC,
            ]);
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'courseName');
        return($data);
    }

    public function  getReview($id){
        $review=Review::find()
            ->where('FK_courseID=:c_id',['c_id'=>$id])
            ->all();

        return $review;
    }

    public function  findReviewer($id){
        $reviewer = Profile::find()
            ->where('user_id=:u_id',['u_id'=>$id])
            ->One();

        return $reviewer;
    }

//    public  function findUser($id){
//        $user=User::find()
//            ->innerJoin('review','user.id=review.FK_courseID')
//            ->where('FK_courseID=:c_id',['c_id'=>$id])
//            ->all();
//
//
//        return $user;
//    }

    public function countQuiz($id){
        $quiz = Lesson::findOne($id)->getQuizzes()->count();
        return $quiz;
    }

    public function  countVideos($id){
        $videos=Lesson::findOne($id)->getVideos()->count();
        return $videos;
    }

    public function  countUnits($id){
        $units=Lesson::findOne($id)->getUnits()->count();
        return $units;
    }

    public static function getAllAuthorAsArray(){
        $query=Profile::find()
        ->innerJoin('course', 'author = user_id');
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'user_id', 'full_name');
        return($data);
    }

    public static function getAllCategoryAsArray(){
        $query=Category::find()
            ->innerJoin('course', 'courseCategory = category.id');
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'id', 'name');
        return($data);
    }

    public static function getAllLanguageAsArray(){
        $query=Language::find()
            ->innerJoin('course', 'course.language = ISO');
        $items = $query->asArray()->all();
        $data=ArrayHelper::map($items, 'ISO', 'language');
        return($data);
    }


    public function subscribe($user_id)
    {
        $res = false;
        $user = User::findOne($user_id);
        if ($user) {
            $userCourse = new UserCourse();
            $userCourse->course_id = $this->id;
            $userCourse->user_id = $user->id;
            $userCourse->subscribed_at = time();
            $res = $userCourse->save();
        }
        return ($res);
    }

    public function unsubscribe($user_id)
    {
        $res = false;
        $user = User::findOne($user_id);
        if ($user) {
            UserCourse::deleteAll(['user_id' => $user->id, 'course_id' => $this->id]);
            $res=true;
        }
        return ($res);
    }

    public function isSubscribed($user_id){
        return $this->getUserCourses()->where(['user_id' => $user_id])->one();
    }

    public static function lessonsAsMenu($id){
        $menu = array();
        $menu[0] = array(
            'label'=>'Course Overview',
            'url'=>['study/overview', 'id'=> $id],
            'iconType' => 'far',
            'icon' => 'eye'
        );
        $i=1;
        $lessons=Lesson::find()->where(['courseID'=>$id])->orderBy('order')->all();
        foreach ($lessons as $les){
            $menu[$i] = array('label'=>substr($les->lessonTitle,0,15). '...','url'=>'#','iconType' => 'fas', 'icon' => 'book');
            $unit=Unit::find()->where(['lessonID'=>$les->id])->all();
            $j=0;
            foreach ($unit as $uni){
                $menu[$i]['items'][$j] = array('label'=>substr($uni->unitTitle,0,15).'...' ,'url'=>['study/unit', 'id'=> $uni->id],'iconType' => 'fas', 'icon' => 'book-reader');
                $j++;
            }

            $video=Video::find()->where(['lessonID'=>$les->id])->all();
            foreach ($video as $vid){
                $menu[$i]['items'][$j] = array('label'=>substr($vid->videoTitle,0,15).'...' ,'url'=>['study/video', 'id'=> $vid->id],'iconType' => 'fab', 'icon' => 'youtube');
                $j++;
            }

            $i++;


        }

        return $menu;
    }


    public static function isMyCourse($id){
        $myC = Course::findOne($id);
        if($myC==null){
            throw new NotFoundHttpException(Yii::t('app', 'Oops Wrong Link !!!!!'));

        }
        return ($myC->author == Yii::$app->user->id);
    }


    public static function totalCoursesOfTeacher(){
        $id = Yii::$app->user->id;
        $query = Course::find()->where(['author' => $id]);
        return $query->count();
    }

    public static function totalCourses(){
        $query = Course::find();
        return $query->count();
    }





}
