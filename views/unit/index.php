<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Units');
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="unit-index container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Create Unit'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id',
            'unitTitle',
            'unitText:ntext',
            [
                'attribute' => 'imageURL',
                'label'=>'Image',
                'format' => 'html',
                'value' => function ($model) {
                  return  Html::img(Yii::getAlias('@web'). $model['imageURL'],
                        ['width'=>'auto','height'=>'61px']);
                },
            ],
            [
                'label' => 'Lesson',
                'attribute'=>'lessonID',
                'value'=>'lesson.lessonTitle',

            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
