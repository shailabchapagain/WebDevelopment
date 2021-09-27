<?php

use app\models\Lesson;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\web\NotFoundHttpException;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?php
    if (Yii::$app->user->can('manager')){
        $lesson=Lesson::getAllLessonAsArray();
    }elseif (Yii::$app->user->can('teacher')){
        $lesson=Lesson::getAllMyLessonAsArray();
    }else{
        throw new NotFoundHttpException(Yii::t('app', 'Not enought permissions .. uuu oooo'));
    }

    echo $form->field($model, 'unitTitle')->textInput(['maxlength' => true]);

   echo $form->field($model, 'unitText')->widget(TinyMce::className(), [
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
    ]);

    echo $form->field($model, 'img')->fileInput();

    echo $form->field($model, 'lessonID')->dropDownList($lesson, ['prompt' => Yii::t('app','--Select One Lesson--')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
