<?php

use app\models\Category;
use app\models\Course;
use app\models\Language;
use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?php
    $programs =Category::getAllCategoryAsArray();

    $language =Language::getAllLanguageAsArray();

    echo $form->field($model, 'language')->dropDownList($language, ['prompt' => Yii::t('app','--Select One Language--')]) ;
    echo $form->field($model, 'courseCategory')->dropDownList($programs, ['prompt' => Yii::t('app','--Select One Course Category--')]) ?>

    <?= $form->field($model, 'courseName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'courseDescription')->widget(TinyMce::className(), [
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


    <?= $form->field($model, 'img')->fileInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php


    $id= yii::$app->user->getId();


    echo $form->field($model, 'author')
        ->hiddenInput(['value' => $id])
        ->label(false);


    echo $form->field($model, 'addDate')
        ->hiddenInput(['value' => time()])
        ->label(false);
    ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
