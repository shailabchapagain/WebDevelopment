<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UniversitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Universities');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="university-index container-fluid my-5">


    <p>
        <?php
        if (Yii::$app->user->can('manager')){
            echo Html::a(Yii::t('app', 'Create University'), ['create'], ['class' => 'btn btn-success']);
        }
        ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    Pjax::begin();

    echo ListView::widget([

        'dataProvider' => $dataProvider,


        'itemView' => '_viewuni',
        'emptyText' => 'No University Found.',
    ]);

    Pjax::end(); ?>

</div>
