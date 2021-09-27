<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Language */

$this->title = Yii::t('app', 'Update Language: {name}', [
    'name' => $model->language,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Languages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->language, 'url' => ['view', 'id' => $model->ISO]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="language-update container-fluid my-5">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
