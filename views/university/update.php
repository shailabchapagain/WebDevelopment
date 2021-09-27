<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\University */

$this->title = Yii::t('app', 'Update University: {name}', [
    'name' => $model->universityname,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Universities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->universityname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="university-update container-fluid my-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
