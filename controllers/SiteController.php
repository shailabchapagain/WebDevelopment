<?php

namespace app\controllers;

use app\models\Category;
use app\models\Course;
use app\models\Newsletter;
use app\models\Profile;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'main';
        $model = new Newsletter();
        if ($model->load(Yii::$app->request->post())) {

            if (!(Newsletter::find()
                ->where("newsletteremail = :email", ['email'=>$model->newsletteremail])
                ->exists())){

                $model->subscribed_on = time();
                $model->save();

                $model->newsletter($model->newsletteremail);
                Yii::$app->session->setFlash('newsletterFormSubmitted');

            }else{
                Yii::$app->session->setFlash('newsletterAlreadySubscribed');
            }
            return $this->refresh();
        }

        $querycourse = Course::find()
            ->select('course.*, count(user_course.course_id) as subs')
            ->leftJoin('user_course', 'id = course_id')
            ->groupBy('course.id')
            ->orderBy('subs DESC')->asArray()->limit(10);

        $courses = $querycourse->all();


        $querycategories = Category::find();
        $categories = $querycategories->limit(4)->all();



        return $this->render('index', [
            'courses' => $courses,
            'model' => $model,
            'categories' => $categories,
        ]);
    }

}
