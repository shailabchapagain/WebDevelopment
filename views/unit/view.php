<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unit */

$this->title = $model->unitTitle;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Units'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unit-view container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php
        if (Yii::$app->user->can('manager')){


            echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        }?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'unitTitle',
            'unitText:ntext',
            [
                'attribute' => 'imageURL',
                'label'=>'Image',
                'format' => 'html',
                'value' => function ($model) {
                    return  Html::img(Yii::getAlias('@web'). $model['imageURL'],
                        ['width' => '248px','height'=>'161px']);
                },
            ],
            [
                'label'=>'Image URL',
                'attribute'=>'imageURL'
            ],
            [
                'label' => 'Lesson',
                'attribute'=>'lessonID',
                'value'=>$model->lesson->lessonTitle,
            ],
            [
                'label' => 'Course',
                'value'=>$model->lesson->course->courseName,
            ],
        ],
    ]) ?>

</div>
