<?php

use app\models\Role;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<?php
$role=Role::getAllRoleAsArray();

echo $form->field($model, 'created_at')
    ->hiddenInput(['value' => gmdate('Y-m-d H:i:s')])
    ->label(false);

    echo $form->field($model, 'role_id')->dropDownList($role, ['prompt' => Yii::t('app','--Select One Role--')])  ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
