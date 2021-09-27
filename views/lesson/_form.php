<?php

use app\models\Course;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lesson */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'lessonTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lessonDescription')->widget(TinyMce::className(), [
        'options' => ['rows' => 6],
        'language' => 'en',
        'clientOptions' => [
            'plugins' => [
                "advlist autolink lists link charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        ]
    ]);?>
    <?php
    if (Yii::$app->user->can('manager')){
        $course = Course::getAllCourseAsArray();
    }elseif (Yii::$app->user->can('teacher')){
        $course = Course::getMyCourseAsArray();
    }else{
        throw new NotFoundHttpException(Yii::t('app', 'Not enought permissions .. uuu oooo'));
    }


    echo $form->field($model, 'courseID')->dropDownList($course, ['prompt' => Yii::t('app','--Select One Course--')]) ; ?>


    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
