<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LanguageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Languages');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="language-index container-fluid my-5">


    <p>
        <?php

        if (Yii::$app->user->can('manager')){
            echo Html::a(Yii::t('app', 'Create Language'), ['create'], ['class' => 'btn btn-success']);


        }
        else {
            echo "<h5> You only have permission to list view the contents of this page </h5>";

        }
        ?>    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'kartik\grid\SerialColumn'],
            'ISO',
            'language',
            ['class' => 'kartik\grid\ActionColumn', 'visible' => Yii::$app->user->can('manager')]]
    ]); ?>

    <?php Pjax::end(); ?>

</div>
