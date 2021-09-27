<?php

namespace app\controllers;

use app\models\ContactForm;
use app\models\Course;

use app\models\Lesson;
use app\models\Question;
use app\models\Review;
use app\models\search\CourseSearch;
use app\models\User;
use app\models\UserCourse;
use Yii;

use yii\base\Exception;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\Controller;



class PageController extends Controller
{
    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $this->layout = 'main';
        return $this->render('about');
    }


    public function actionFaq()
    {
        $this->layout = 'main';

        return $this->render('faq');
    }

    public function actionPolicy()
    {
        $this->layout = 'main';
        return $this->render('policy');
    }

    public function actionTerms()
    {
        $this->layout = 'main';
        return $this->render('terms');
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $this->layout = 'main';
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionCourses(){

        $this->layout='main';

        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = ['pageSize' => 5,];
        $dataProvider->sort->attributes['courseNameAsc'] = [
            'asc' => ['course.courseName' => SORT_ASC],
            'desc' => ['course.courseName' => SORT_ASC],
            'label' => 'Name (A to Z)'
        ];

        $dataProvider->sort->attributes['courseNameDesc'] = [
            'asc' => ['course.courseName' => SORT_DESC],
            'desc' => ['course.courseName' => SORT_DESC],
            'label' => 'Name (Z to A)'
        ];

        $dataProvider->sort->attributes['priceAsc'] = [
            'asc' => ['course.price' => SORT_ASC],
            'desc' => ['course.price' => SORT_ASC],
            'label' => 'Price (Lowest)'
        ];

        $dataProvider->sort->attributes['priceDesc'] = [
            'asc' => ['course.price' => SORT_DESC],
            'desc' => ['course.price' => SORT_DESC],
            'label' => 'Price (Highest)'
        ];

        $dataProvider->sort->attributes['addDateAsc'] = [
            'asc' => ['course.addDate' => SORT_ASC],
            'desc' => ['course.addDate' => SORT_ASC],
            'label' => 'Most Recent'
        ];

        $dataProvider->sort->attributes['addDateDesc'] = [
            'asc' => ['course.addDate' => SORT_DESC],
            'desc' => ['course.addDate' => SORT_DESC],
            'label' => 'Oldest'
        ];

        $searchModel = new CourseSearch();

        return $this->render('courses',[
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);

    }

    public function actionCourseSingle($id)
    {

        $review = new Review();
       $coursesub = $this->findCourseModel($id);

        $this->_subscribeUnsubscribe();

        $review->FK_courseID = $id;
        $review->FK_userID = YII::$app->user->id;

        if ($review->load(Yii::$app->request->post()) && $review->save()) {
            Yii::$app->session->setFlash('ReviewSubmitted');
            return $this->refresh();
        }

        return $this->render('course-single',[

                'id'=>$id,
               'courseSub' => $coursesub,
                'reviewmodel' => $review,
        ]);
    }



    private function _subscribeUnsubscribe(){
        if (Yii::$app->request->isPost) {
            $course_id = Yii::$app->request->post('id');
            $course = Course::findOne($course_id);
            if($course) {
                $user_id = Yii::$app->user->id;
                $action = Yii::$app->request->post('action');

                if($action == 'subscribe') {
                    if ($course->subscribe($user_id)) {
                        Yii::$app->session->setFlash("success", "Subject {$course->courseName} subscribed");
                    } else {
                        Yii::$app->session->setFlash("fail", "Error subscribing Subject {$course->courseName}");
                    }
                }

                else if($action == 'unsubscribe') {
                    if ($course->unsubscribe($user_id)) {
                        Yii::$app->session->setFlash("success", "Subject {$course->courseName} unsubscribed");
                    } else {
                        Yii::$app->session->setFlash("fail", "Error subscribing Subject {$course->courseName}");
                    }
                }else{
                    Yii::$app->session->setFlash("fail", "Invalid option");
                }
            }

            else{
                Yii::$app->session->setFlash("fail", "Subject unavailable");
            }
        }
    }
    protected function findCourseModel($id)
    {
        if (($coursesub = Course::findOne($id)) !== null) {
            return $coursesub;
       }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
   }









}
