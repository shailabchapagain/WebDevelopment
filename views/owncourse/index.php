<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\OwncourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">


    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id',
            'courseName',
            [
                'label' => 'Language',
                'attribute'=>'language',
                'value'=>'language0.language',

            ],
            [
                'label' => 'Category',
                'attribute'=>'courseCategory',
                'value'=>'courseCategory0.name',

            ],
            //'courseDescription',
            [
                'attribute' => 'imageURL',
                'label'=>'Image',
                'format' => 'html',
                'value' => function ($model) {
                    return  Html::img(Yii::getAlias('@web'). $model['imageURL'],
                        ['class'=>'auto','height'=>'61px']);
                },
            ],
            //'addDate',
            [
                'label' => 'Author',
                'attribute'=>'author',
                'value'=>'author0.username',
            ],
            [
                'label' => 'Price (€)',
                'attribute'=>'price',
                'value'=>'price',

            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
