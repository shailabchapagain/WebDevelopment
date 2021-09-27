<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserCourse */

$this->title = Yii::t('app', 'Create New User Enrollment');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-course-create container-fluid my-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
