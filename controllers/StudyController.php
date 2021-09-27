<?php


namespace app\controllers;


use app\models\Lesson;
use app\models\Quiz;
use app\models\Unit;
use app\models\Video;
use Mpdf\Mpdf;
use Yii;
use yii\base\Exception;
use yii\web\Controller;
use app\models\Course;
use yii\web\NotFoundHttpException;

class StudyController extends Controller
{

    public $layout='studylayout.php';


    public function actionUnit($id){


        $unit = Unit::findOne($id);
        if($unit == null){
            throw new NotFoundHttpException(Yii::t('app', 'You are trying to access unit page that does\'t exist'));
        }
        $course=Course::findOne($unit->lesson->course->id);
        $this->view->params['courseid']=$course->id;

        if($course->isSubscribed(Yii::$app->user->id)) {
            return $this->render('unit', [
                'id' => $id,
            ]);
        }
        else{
            throw new NotFoundHttpException(Yii::t('app', 'You are not subscribed to this course.'));

        }
    }

    public function actionUnitpdf($id){
        $unit = Unit::findOne($id);
        $course=Course::findOne($unit->lesson->course->id);
        $this->view->params['courseid']=$course->id;

        $mpdf=new Mpdf();
        if($course->isSubscribed(Yii::$app->user->id)) {
            $pdfcontent = $this->renderPartial('unitpdf', ['id' => $id]);
            $mpdf->SetTitle($unit->unitTitle);
            $mpdf->WriteHTML($pdfcontent);
            $mpdf->Output($unit->unitTitle.'.pdf','I');
            exit;
        }
        else{
            throw new NotFoundHttpException(Yii::t('app', 'You are not subscribed to this course.'));

        }
    }



    public function actionVideo($id){

        $video = Video::findOne($id);
        if($video == null){
            throw new NotFoundHttpException(Yii::t('app', 'You are trying to access video page that does\'t exist'));
        }
        $course=Course::findOne($video->lesson->course->id);
        $this->view->params['courseid']=$course->id;


        if($course->isSubscribed(Yii::$app->user->id)) {
            return $this->render('video', [
                'id' => $id,
            ]);
        }
        else{
            throw new NotFoundHttpException(Yii::t('app', 'You are not subscribed to this course.'));

        }
    }

    public function actionOverview($id){


        $course = Course::findOne($id);
        if($course == null){
            throw new NotFoundHttpException(Yii::t('app', 'You are trying to access Overview page that does\'t exist'));
        }
        $this->view->params['courseid']=$id;

        if($course->isSubscribed(Yii::$app->user->id)) {
            return $this->render('overview', [
                'id' => $id,
            ]);
        }
        else{
            throw new NotFoundHttpException(Yii::t('app', 'You are not subscribed to this course.'));

        }
    }

}