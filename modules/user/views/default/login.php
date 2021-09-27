<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-default-login"">

    <?php $form = ActiveForm::begin([
        'id' => 'login-box',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-12\">{input}</div>\n<div class=\"col-12\">{error}</div>",
            'labelOptions' => ['class' => 'col-sm-12 my-auto mx-auto control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'rememberMe', [
        'template' => "{label}<div class=\"col-offset-2 col-10\">{input}</div class=\"border-0\">\n<div class=\"col-12 text-danger\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-primary']) ?>

            <br/><br/>
            Don't have account yet? <?= Html::a(Yii::t("user", "Register"), ["/user/register"]) ?> <br>
            Cannot Login? <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?> <br>
            Lost your confirmation email? <?= Html::a(Yii::t("user", "Resend confirmation email"), ["/user/resend"]) ?> <br>
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


</div>
