<?php

use app\models\Lesson;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'videoTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'videoDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'videoURL')->textInput(['maxlength' => true]) ?>
    <?php
    if (Yii::$app->user->can('manager')){
        $lesson=Lesson::getAllLessonAsArray();
    }elseif (Yii::$app->user->can('teacher')){
        $lesson=Lesson::getAllMyLessonAsArray();
    }else{
        throw new NotFoundHttpException(Yii::t('app', 'Not enought permissions .. uuu oooo'));
    }

    echo $form->field($model, 'lessonID')->dropDownList($lesson, ['prompt' => Yii::t('app','--Select One Lesson--')])  ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
