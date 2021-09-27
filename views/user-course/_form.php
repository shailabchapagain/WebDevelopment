<?php

use app\models\Course;
use app\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-course-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php
    $user=User::getAllUserAsArray();
    $course=Course::getAllCourseAsArray();

    echo $form->field($model, 'user_id')->dropDownList($user, ['prompt' => Yii::t('app','--Select One User--')]) ;


    echo $form->field($model, 'course_id')->dropDownList($course, ['prompt' => Yii::t('app','--Select One Course--')])
    ?>

    <?= $form->field($model, 'subscribed_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
