<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\ContactForm */

use app\assets\ContactAssets;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\captcha\Captcha;

ContactAssets::register($this);
$this->title = 'Contact Us';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-contact">
    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="container-fluid alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

    <?php else: ?>

        <div class="d-flex justify-content-center align-items-center container py-5">
            <div class="row border-danger">
                <div class="col-md-12 mx-auto">
                    <h1 class="text-center display-4 font-open-sans"> <span class="border-3 rounded"> Get in Touch </span></h1>

                    <div id="contact-form" class="my-5">

                        <?php $form = ActiveForm::begin(['options'=>['class' => 'contact-form']]); ?>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">

                                    <?= $form->Field($model, 'firstName', [
                                        'inputOptions' => [
                                            'placeholder' => 'John']])->textInput(['autofocus' => true])  ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'lastName', [
                                        'inputOptions' => [
                                            'placeholder' => 'Doe']])->textInput(['autofocus' => true]) ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'email', [
                                'inputOptions' => [
                                    'placeholder' => 'john.doe@tdot.com']])->textInput()->hint('We\'ll never share your email with anyone else.')->label('Email Address')
                            ?>

                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'streetAddress', [
                                'inputOptions' => [
                                    'placeholder' => 'Rua da Santa Apolonia, N 26']]) ?>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <?= $form->field($model, 'country') ?>

                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'city', [
                                        'inputOptions' => [
                                            'placeholder' => 'Braganca']]) ?>
                                </div>
                                <div class="col">
                                    <?= $form->field($model, 'zipCode', [
                                        'inputOptions' => [
                                            'placeholder' => '7630-614']]) ?>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= $form->field($model, 'phoneNumber', [
                                'inputOptions' => [
                                    'placeholder' => '910026412']]) ?>
                        </div>

                        <div class="form-group">
                            <?php
                            $topic=[
                                '1'=> 'Business Proposal',
                                '2'=> 'Complaint',
                                '3'=> 'Suggestion',
                                '4'=> 'Bug Report',
                                '5'=> 'Other',
                            ]
                            ?>

                            <?= $form->field($model, 'topic')->dropDownList($topic, ['prompt' => 'Please choose a topic']) ?>
                        </div>



                        <div class="form-group">
                            <?= $form->field($model, 'body', [
                                'inputOptions' => [
                                    'placeholder' => 'Here you type your message for us .... ']])->textarea(['rows' => 6]) ?>

                        </div>

                        <br/>

                        <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        ]) ?>

                        <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-success mt-2', 'name' => 'contact-buxAtton']) ?>

                            <?= Html::resetButton('Reset', ['class' => 'btn btn-dark mt-2 mx-3', 'name' => 'reset-button']) ?>

                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div  class="container-fluid bg-light  py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 mx-auto my-auto">
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2974.4879419484964!2d-6.770245584171009!3d41.79624797922866!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd3a4a1ee035460b%3A0x72fde1e40776b97b!2sESTIG!5e0!3m2!1sen!2spt!4v1585400655269!5m2!1sen!2spt"></iframe>
                </div>

                <div class="col-lg-4 col-md-12 mx-auto my-auto pt-smaller-990">

                    <h1 class="font-open-sans">Our Offices</h1>
                    <address class="mt-3">
                        <h3>Head Office</h3>
                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="far fa-map"></i></span> Av. Santa Apolonia, <br> Braganca, Portugal<br></li>
                            <li><span class="fa-li"><i class="far fa-paper-plane"></i></span> portugal@tdot.com<br></li>
                            <li><span class="fa-li"><i class="fas fa-mobile-alt"></i></i></span> +351 960056121<br></li>
                        </ul>

                        <h3>Nepal Branch</h3>

                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="far fa-map"></i></span>  JP Marg, Thamel <br> Kathmandu, Nepal<br></li>
                            <li><span class="fa-li"><i class="far fa-paper-plane"></i></span> nepal@tdot.com<br></li>
                            <li><span class="fa-li"><i class="fas fa-mobile-alt"></i></i></span> +977 9802583122<br></li>
                        </ul>

                    </address>

                </div>
            </div>
        </div>
    </div>



</div>
