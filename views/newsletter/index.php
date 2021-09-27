<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\NewsletterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Newsletters');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="newsletter-index  container-fluid my-5">


    <p>
        <?= Html::a(Yii::t('app', 'Create Newsletter'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id',
            'newsletteremail:email',
            [
                'label' => 'Added on',

                'attribute' => 'subscribed_on',
                'value' => function ($model, $key) {
                    return date('Y-m-d H:m:s', $model->subscribed_on);
                },
            ],

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
