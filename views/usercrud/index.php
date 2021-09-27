<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\UsercrudSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index container-fluid my-5">

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],

            'id',
            [
                'label' => 'Role',
                'attribute'=>'role_id',
                'value'=>'role.name',

            ],
            'status',
            'email:email',
            'username',
            //'password',
            //'auth_key',
            //'access_token',
            //'logged_in_ip',
            //'logged_in_at',
            //'created_ip',
            //'created_at',
            //'updated_at',
            //'banned_at',
            //'banned_reason',

            ['class' => 'kartik\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
