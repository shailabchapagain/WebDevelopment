<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserCourse */

$this->title = $model->course->courseName.' : '. $model->user->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'User Enrollments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-course-view container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'user_id' => $model->user_id, 'course_id' => $model->course_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'user_id' => $model->user_id, 'course_id' => $model->course_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'User',
                'attribute'=>'user_id',
                'value'=>$model->user->username,

            ],
            [
                'label' => 'Course',
                'attribute'=>'course_id',
                'value'=>$model->course->courseName,

            ],

            [
                'label' => 'Subscribed on',

                'attribute' => 'subscribed_at',
                'value' => function ($model, $key) {
                    return date('Y-m-d    h:m:s A', $model->subscribed_at);
                },
            ],
        ],
    ]) ?>

</div>
