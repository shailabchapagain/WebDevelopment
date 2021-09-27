<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\dashboardAssets;
use app\models\Course;
use app\models\Unit;
use dmstr\adminlte\widgets\Menu;
use rmrevin\yii\fontawesome\FAS;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;

dashboardAssets::register($this);


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
<body  class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody()?>


<div class="wrapper">
    <!-- Navbar -->
    <?php
    NavBar::begin([
        'innerContainerOptions' => ['class' => 'container-fluid'],
        'options' => [
            'class' => 'main-header navbar navbar-expand navbar-white navbar-light',
        ],]);
    ?>
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


    <?php
    echo Nav::widget([
        'options' => ['class' => 'ml-lg-auto  navbar-nav'],
        'items' => [
            ['label' => FAS::icon('sign-out-alt')->fixedWidth().'Logout', 'url' => ['user/logout'], 'linkOptions' => ['data-method' => 'post'], 'encode' => false],
            ['label' => FAS::icon('angle-double-right')->fixedWidth().'Main website', 'url' => ['site/index'],'encode' => false]
        ]]);
    ?>

    <?php NavBar::end(); ?>





    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?= Url::toRoute('site/index') ?>" class="brand-link">

            <?= Html::img($theme->getUrl('/images/logo-icon.png'), ['alt' => 'TDot Academy Logo', 'class' => 'brand-image']); ?>

            <span class="brand-text font-weight-bold">TDot Academy</span>
        </a>        <div class="sidebar">

            <div class="user-panel container-fluid mt-3 pb-3 mb-3 d-flex">
                <?php

                $fullName = Yii::$app->user->getDisplayName();
                $email = Yii::$app->user->get_email();
                $image = Yii::$app->user->get_gravatar($email);

                ?>
                <img src="<?= $image ?>" width="48" height="48" style="border-radius: 100%" />

                <div class="info">
                    <a href="#" class="d-block"> <?php echo $fullName ?></a>
                </div>
            </div>

            <nav class="mt-2">
                <?php
                $courses = Course::findOne(\Yii::$app->view->params['courseid']);
                $menuItems = Course::lessonsAsMenu(\Yii::$app->view->params['courseid']);


                echo  Menu::widget(
                    [

                        'options' => ['class' => 'nav nav-pills nav-sidebar flex-column', 'data-widget' => 'treeview'],
                        'items' =>
                                                                 $menuItems




                        ]

                ); ?>
            </nav>

        </div>

    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <?php
        if (isset($this->params['breadcrumbs'])) {
            ?>
            <div class="container-fluid">

                <h1 class="font-caveat display-4 ml-2 pt-2"> <?= Html::encode($this->title) ?>  </h1>


                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    'options' => ['style' => 'background-color: transparent !important'],
                ]) ?>

            </div>


        <?php } ?>


        <!-- Main content -->
        <section class="content">

            <?= $content ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->




    <footer class="main-footer">
        <strong>  &copy; TDot Academy <?php echo date("Y"); ?> </strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            Made with Yii2 and a lot of hardwork
        </div>
    </footer>

</div>








<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
