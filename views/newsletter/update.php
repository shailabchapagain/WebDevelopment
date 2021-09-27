<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Newsletter */

$this->title = Yii::t('app', 'Update Newsletter: {name}', [
    'name' => $model->newsletteremail,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Newsletters'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->newsletteremail, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="newsletter-update container-fluid my-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
