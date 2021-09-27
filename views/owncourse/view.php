<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Course */

$this->title = $model->courseName;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
            'id',
            'courseName',
            [
                'label' => 'Language',
                'attribute'=>'language',
                'value'=>$model->language0->language,

            ],
            [
                'label' => 'Category',
                'attribute'=>'courseCategory',
                'value'=>$model->courseCategory0->name,

            ],
            [
                'label' => 'Author',
                'attribute'=>'author',
                'value'=>$model->author0->username,

            ],
            'courseDescription',
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
                'label' => 'Added on',

                'attribute' => 'addDate',
                'value' => function ($model, $key) {
                    return date('Y-m-d', $model->addDate);
                },
            ],
            [
                'label' => 'Price (€)',
                'attribute'=>'price',
                'value'=>$model->price,

            ],
            [
                'label' => 'Number of Lessons',
                'attribute'=>'lessons',
                'value'=>$model->countLesson($model->id),

            ],

        ],
    ]) ?>

</div>
