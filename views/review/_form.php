<?php

use app\models\Course;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'reviewtext')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rating')->textInput() ?>
    <?php
    $user=User::getAllUserAsArray();
    $course=Course::getAllCourseAsArray();

    echo $form->field($model, 'FK_userID')->dropDownList($user, ['prompt' => Yii::t('app','--Select One User--')])  ;

    echo $form->field($model, 'FK_courseID')->dropDownList($course, ['prompt' => Yii::t('app','--Select One course--')])  ;
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
