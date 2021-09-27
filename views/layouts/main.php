<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use rmrevin\yii\fontawesome\FAS;
use rmrevin\yii\fontawesome\FAB;


use app\assets\GlobalAssets;

GlobalAssets::register($this);

$theme = $this->theme;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?=Yii::getAlias('@web'.'/favicon.ico');?>" />
    <link rel="icon" type="image/x-icon" href="<?=Yii::getAlias('@web'.'/favicon.ico');?>" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img($theme->getUrl('/images/logo.png'),['class'=>'navbar_logo','alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'innerContainerOptions' => ['class' => 'container-fluid mx-md-5'],
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-dark navbar-transparent shadow fixed-top', 'id' => 'navbar'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'mr-auto navbar-nav'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],

           ['label' => 'Courses', 'url' => ['page/courses']],
            ['label' => 'About Us', 'url' => ['page/about']],
            ['label' => 'Contact Us', 'url' => ['page/contact']],
        ],
    ]);

    $dashboard = 'dashboard/userdash';
    if (Yii::$app->user->can('manager')){
        $dashboard = 'dashboard/admindash';
    }
    elseif(Yii::$app->user->can('teacher')){
        $dashboard = 'dashboard/teacherdash';
    }

    echo Nav::widget([
        'options' => ['class' => 'ml-lg-auto  navbar-nav'],
        'items' => [
            ['label' => FAS::icon('university')->fixedWidth().'  Uni Search', 'url' => ['university/index'], 'encode' => false],

            ['label' => FAS::icon('tachometer-alt')->fixedWidth().'  Dashboard', 'url' => [$dashboard], 'encode' => false,'visible'=>!Yii::$app->user->isGuest],

            Yii::$app->user->isGuest ? ['label' => 'Register', 'url' => ['user/register'], 'encode' => false]
                :
                ['label' => ' My Profile (' . Yii::$app->user->identity->username . ')','url' => ['#'],
                'items'=>[
                        ['label' => FAS::icon('user')->fixedWidth().'Edit Profile', 'url' => ['user/profile'], 'encode' => false],

                        ['label' => FAS::icon('user-edit')->fixedWidth().'Edit Account', 'url' => ['user/account'], 'encode' => false],
                        ['label' => FAS::icon('book')->fixedWidth().'My Courses', 'url' => ['course/subscribed'], 'encode' => false],
                        ['label' => FAS::icon('sticky-note')->fixedWidth().'My Notes', 'url' => ['note/index'], 'encode' => false],
                    ]]
                ,
                Yii::$app->user->isGuest ? ['label' => FAS::icon('sign-in-alt')->fixedWidth().'Login', 'url' => ['user/login'], 'encode' => false]
                :
                ['label' => FAS::icon('sign-out-alt')->fixedWidth().'Logout', 'url' => ['user/logout'], 'linkOptions' => ['data-method' => 'post'], 'encode' => false],

        ]]);
    NavBar::end();
    ?>



    <?php
    if (isset($this->params['breadcrumbs'])){
    ?>
    <div class="container-fluid gradient-background ">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-md-12 align-self-center text-white" style="padding-top: 180px">
                    <h3 class="display-4 font-mansalva"> <?= Html::encode($this->title) ?>  </h3>


                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['style' => 'background-color: transparent !important'],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>


        <?= $content ?>







</div>

<div class="footer-basic bg-dark text-white">
    <footer>
        <div class="social">
            <?= Html::a(FAS::stack(['data-role' => 'stacked-icon'])->on(FAS::Icon('circle', ['class' => 'footer-icon-back']))->icon(FAB::Icon('facebook-f', ['class' => 'facebook-icon'])), 'https://www.facebook.com/')?>
            <?= Html::a(FAS::stack(['data-role' => 'stacked-icon'])->on(FAS::Icon('circle', ['class' => 'footer-icon-back']))->icon(FAB::Icon('twitter', ['class' => 'twitter-icon'])), 'https://www.twitter.com/')?>
            <?= Html::a(FAS::stack(['data-role' => 'stacked-icon'])->on(FAS::Icon('circle', ['class' => 'footer-icon-back']))->icon(FAB::Icon('google', ['class' => 'google-icon'])), 'https://www.google.com/')?>
            <?= Html::a(FAS::stack(['data-role' => 'stacked-icon'])->on(FAS::Icon('circle', ['class' => 'footer-icon-back']))->icon(FAB::Icon('facebook-messenger', ['class' => 'messenger-icon'])), 'https://www.messenger.com/')?>


        </div>
        <ul class="list-inline">
            <li class="list-inline-item"><?= Html::a('Terms and Condition', ['page/terms']) ?></li>
            <li class="list-inline-item"><?= Html::a('Privacy Policy', ['page/policy']) ?></li>
            <li class="list-inline-item"><?= Html::a('FAQ', ['page/faq']) ?></li>


        </ul>
        <p class="copyright"> © TDot Academy <?= date('Y') ?></p>
    </footer>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
