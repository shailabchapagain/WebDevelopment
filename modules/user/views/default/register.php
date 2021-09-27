<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\Module $module
 * @var app\modules\user\models\User $user
 * @var app\modules\user\models\User $profile
 * @var string $userDisplayName
 */

$module = $this->context->module;

$this->title = Yii::t('user', 'Register');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-register">

    <?php if ($flash = Yii::$app->session->getFlash("Register-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>

    <?php else: ?>

        <?php $form = ActiveForm::begin([
            'id' => 'register-form',
            'options' => ['class' => 'form-horizontal'],
            'fieldConfig' => [
                'template' => "{label}\n<div class=\"col-12\">{input}</div>\n<div class=\"col-12 text-danger\">{error}</div>",
                'labelOptions' => ['class' => 'col-sm-12 my-auto mx-auto control-label'],
            ],
            'enableAjaxValidation' => true,
        ]); ?>

        <?= $form->field($profile, 'full_name') ?>

        <?php if ($module->requireUsername): ?>
            <?= $form->field($user, 'username') ?>
        <?php endif; ?>

        <?php if ($module->requireEmail): ?>
            <?= $form->field($user, 'email') ?>
        <?php endif; ?>

        <?= $form->field($user, 'newPassword')->passwordInput() ?>
        <?= $form->field($user, 'newPasswordConfirm')->passwordInput() ?>



        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-10">
                <?= Html::submitButton(Yii::t('user', 'Register'), ['class' => 'btn btn-primary']) ?>

                <br/><br/>
                Already have an account? <?= Html::a(Yii::t('user', 'Login'), ["/user/login"]) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

        <?php if (Yii::$app->get("authClientCollection", false)): ?>
            <div class="col-lg-offset-2 col-lg-10">
                <?= yii\authclient\widgets\AuthChoice::widget([
                    'baseAuthUrl' => ['/user/auth/login']
                ]) ?>
            </div>
        <?php endif; ?>

    <?php endif; ?>

</div>