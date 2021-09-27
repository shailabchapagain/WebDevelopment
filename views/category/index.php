<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categories');
$this->params['breadcrumbs'][] = $this->title;


?>

<div class="category-index container-fluid my-5">


    <p>
        <?php

        if (Yii::$app->user->can('manager')){
            echo Html::a(Yii::t('app', 'Create Category'), ['create'], ['class' => 'btn btn-success']);

        }
        else {
            echo "<h5> You only have permission to list view the contents of this page </h5>";
        }
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'id',
            'name',
            [
                'attribute' => 'imgURL',
                'label'=>'Image',
                'format' => 'html',
                'value' => function ($model) {
                    return  Html::img(Yii::getAlias('@web'). $model['imgURL'],
                        ['width'=>'auto','height'=>'61px']);
                },
            ],
            'description',
            ['class' => 'kartik\grid\ActionColumn', 'visible' => Yii::$app->user->can('manager')]]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
