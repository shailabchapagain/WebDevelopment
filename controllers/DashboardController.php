<?php


namespace app\controllers;


use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DashboardController extends Controller
{
    public $layout = 'dashboard.php';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['admindash'],
                        'allow' => true,
                        'roles' => ['admin','manager'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],

                    [
                        'actions' => ['teacherdash'],
                        'allow' => true,
                        'roles' => ['teacher'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],

                    [
                        'actions' => ['userdash'],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionAdmindash()
    {
        return $this->render('admindash');
    }

    public function actionTeacherdash()
    {
        return $this->render('teacherdash');
    }

    public function actionUserdash()
    {
        return $this->render('userdash');
    }

}