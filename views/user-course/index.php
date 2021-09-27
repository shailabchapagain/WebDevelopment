<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UserCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User Enrollments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-course-index container-fluid my-5">


    <p>
        <?php
        if ((Yii::$app->user->can('manager'))){
            echo Html::a(Yii::t('app', 'Create User Course'), ['create'], ['class' => 'btn btn-success']) ;
        }
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php
    if ((Yii::$app->user->can('manager'))){
        echo Html::a(Yii::t('app', 'Create User Course'), ['create'], ['class' => 'btn btn-success']) ;
    }
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            [
                'label' => 'User',
                'attribute'=>'user_id',
                'value'=>'user.username',

            ],
            [
                'label' => 'Course',
                'attribute'=>'course_id',
                'value'=>'course.courseName',

            ],
            [
                'label' => 'Subscribed on',

                'attribute' => 'subscribed_at',
                'value' => function ($model, $key) {
                    return date('Y-m-d    h:m:s A', $model->subscribed_at);
                },
            ],

            ['class' => 'kartik\grid\ActionColumn', 'visible' => Yii::$app->user->can('manager')],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
