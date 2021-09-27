<?php

namespace app\controllers;

use app\models\Course;
use Yii;
use app\models\Unit;
use app\models\search\UnitSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UnitController implements the CRUD actions for Unit model.
 */
class UnitController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update'],
                        'allow' => true,
                        'roles' => ['teacher'],
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
     * Lists all Unit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UnitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Unit model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {

        $model = $this->findModel($id);
        if(Course::isMyCourse($model->lesson->course->id)){
            return $this->render('view', [
                'model' => $model,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('app', 'OOO... You don\'t have permissions.'));
    }

    /**
     * Creates a new Unit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Unit();
        $imageName = Unit::getNextId();

        if ($model->load(Yii::$app->request->post())) {
            //get instance of the uploaded file
            $model->img= UploadedFile::getInstance($model,'img');
            $model->img->saveAs(Yii::getAlias('@webroot').'/resources/images/units/'.$imageName.'.'.$model->img->extension);

            //save the path to imageurl
            $model->imageURL='/resources/images/units/'.$imageName.'.'.$model->img->extension;

            if($model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Unit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if(Course::isMyCourse($model->lesson->course->id)){


            if ($model->load(Yii::$app->request->post())) {
                $model->img= UploadedFile::getInstance($model,'img');
                $model->img->saveAs(Yii::getAlias('@webroot').'/resources/images/units/'.$id.'.'.$model->img->extension);

                //save the path to imageurl
                $model->imageURL='/resources/images/units/'.$id.'.'.$model->img->extension;
                if($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
        throw new NotFoundHttpException(Yii::t('app', 'OOO... You don\'t have permissions.'));


    }

    /**
     * Deletes an existing Unit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if(Course::isMyCourse($model->lesson->course->id)){

            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
        throw new NotFoundHttpException(Yii::t('app', 'OOO... You don\'t have permissions.'));


    }

    /**
     * Finds the Unit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Unit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Unit::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
