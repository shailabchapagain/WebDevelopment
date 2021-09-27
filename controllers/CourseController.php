<?php

namespace app\controllers;

use Yii;
use app\models\Course;
use app\models\search\CourseSearch;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    public $layout = 'dashboard.php';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'create', 'update','delete'],
                        'allow' => true,
                        'roles' => ['admin','manager'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],

                    [
                        'actions' => ['index', 'create','view'],
                        'allow' => true,
                        'roles' => ['teacher'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],

                    [
                        'actions' => ['subscribed'],
                        'allow' => true,
                        'roles' => ['@'],
                        'denyCallback' => function($rule, $action) {
                            Yii::$app->response->redirect(['user/login']);
                        },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Course models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Course model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Course();
        $imageName = Course::getNextId();

        if ($model->load(Yii::$app->request->post())) {
            //get instance of the uploaded file
            $model->img= UploadedFile::getInstance($model,'img');
            $model->img->saveAs(Yii::getAlias('@webroot').'/resources/images/courses/'.$imageName.'.'.$model->img->extension);

            //save the path to imageurl
            $model->imageURL='/resources/images/courses/'.$imageName.'.'.$model->img->extension;


            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $imageName = $id;

        if ($model->load(Yii::$app->request->post())) {

            //get instance of the uploaded file
            $model->img= UploadedFile::getInstance($model,'img');
            $model->img->saveAs(Yii::getAlias('@webroot').'/resources/images/courses/'.$id.'.'.$model->img->extension);

            //save the path to imageurl
            $model->imageURL='/resources/images/courses/'.$imageName.'.'.$model->img->extension;
            if($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }


    public function actionSubscribed(){
        $query = CourseSearch::find()->joinWith('userCourses','user_course.course_id = course.id')
            ->where('user_course.user_id ='.Yii::$app->user->id)->orderBy('user_course.subscribed_at DESC');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('subscribed', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
