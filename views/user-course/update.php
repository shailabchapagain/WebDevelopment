<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCourse */

$this->title = Yii::t('app', 'Update User Enrollment: {name}', [
    'name' => $model->course->courseName.' : '. $model->user->username,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->course->courseName.' : '. $model->user->username, 'url' => ['view', 'user_id' => $model->user_id, 'course_id' => $model->course_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="user-course-update container-fluid my-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
