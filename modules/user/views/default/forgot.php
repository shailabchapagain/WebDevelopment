<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\forms\ForgotForm $model
 */

$this->title = Yii::t('user', 'Forgot password');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-forgot">


    <?php if ($flash = Yii::$app->session->getFlash('Forgot-success')): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-12">
                <?php $form = ActiveForm::begin([
                    'id' => 'forgot-form',
                    'fieldConfig' => [
                        'template' => "{label}\n<div class=\"col-12 px-0\">{input}</div>\n<div class=\"col-12 text-danger px-0\">{error}</div>",
                        'labelOptions' => ['class' => 'col-sm-12 control-label px-0'],
                    ],
                ]); ?>
                    <?= $form->field($model, 'email') ?>
                    <div class="form-group">
                        <?= Html::submitButton(Yii::t('user', 'Submit'), ['class' => 'btn btn-primary']) ?>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

    <?php endif; ?>

</div>
