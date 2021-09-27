<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Create Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [['class' => 'kartik\grid\SerialColumn'],

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
                'label' => 'Author',
                'attribute'=>'author',
                'value'=>'author0.username',
            ],


            [
                'attribute' => 'imageURL',
                'label'=>'Image',
                'format' => 'html',
                'value' => function ($model) {
                    return  Html::img(Yii::getAlias('@web'). $model['imageURL'],
                        ['class'=>'auto','height'=>'61px']);
                },
            ],




            [
                'label' => 'Price (€)',
                'attribute'=>'price',
                'value'=>'price',

            ],
            ['class' => 'kartik\grid\ActionColumn', 'visible' => Yii::$app->user->can('manager')]],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
