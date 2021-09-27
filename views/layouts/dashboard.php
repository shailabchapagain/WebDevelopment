<?php
/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\dashboardAssets;
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
                    <?= Html::a($fullName, ['user/profile', ['class' => 'd-block'] ])?>



                </div>

            </div>

            <nav class="mt-2">
                <?php
                $dashboard='dashboard/userdash';
                if (Yii::$app->user->can('manager')){
                    $dashboard = 'dashboard/admindash';
                }
                elseif(Yii::$app->user->can('teacher')){
                    $dashboard = 'dashboard/teacherdash';
                }
                ?>
                <?= Menu::widget(
                    [
                        'options' => ['class' => 'nav nav-pills nav-sidebar flex-column', 'data-widget' => 'treeview'],
                        'items' => [


                            [
                                'label' => 'My Dashboard',
                                'iconType' => 'fas',
                                'icon' => 'tachometer-alt',
                                'url' => [$dashboard],
                            ],

                            [
                                'label' => 'Course',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['course/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['course/create'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'My Subscriptions', 'iconType' => 'fas', 'icon' => 'bell', 'url' => ['course/subscribed']],
                                    ['label' => 'My Courses', 'iconType' => 'fas', 'icon' => 'graduation-cap', 'url' => ['owncourse/index'], 'visible' => Yii::$app->user->can('teacher')],


                                ],
                            ],
                            [
                                'label' => 'Category',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'list-alt',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['category/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['category/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],

                            [
                                'label' => 'Language',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'language',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['language/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['language/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],
                            [
                                'label' => 'Lesson',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'book-open',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['lesson/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['lesson/create'], 'visible' => Yii::$app->user->can('teacher')],
                                ],
                            ],
                            [
                                'label' => 'Newsletter',
                                'visible' => Yii::$app->user->can('manager'),
                                'icon' => 'newspaper',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['newspaper/index'], 'visible' => Yii::$app->user->can('manager')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['newspaper/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],
                            [
                                'label' => 'Note',
                                'icon' => 'sticky-note',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['note/index'] ],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['note/create']],
                                ],
                            ],


                            [
                                'label' => 'Review',
                                'visible' => Yii::$app->user->can('manager'),
                                'icon' => 'star',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['review/index'], 'visible' => Yii::$app->user->can('manager')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['review/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],
                            [
                                'label' => 'Role',
                                'visible' => Yii::$app->user->can('manager'),
                                'icon' => 'user-tag',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['role/index'], 'visible' => Yii::$app->user->can('manager')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['role/create'], 'visible' => Yii::$app->user->can('admin')],
                                ],
                            ],
                            [
                                'label' => 'Unit',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'book-reader',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['unit/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['unit/create'], 'visible' => Yii::$app->user->can('teacher')],
                                ],
                            ],
                            [
                                'label' => 'University',
                                'icon' => 'university',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['university/index']],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['university/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],
                            [
                                'label' => 'User Enrollments',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'user-graduate',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['user-course/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['user-course/create'], 'visible' => Yii::$app->user->can('manager')],
                                ],
                            ],
                            [
                                'label' => 'video',
                                'visible' => Yii::$app->user->can('teacher'),
                                'icon' => 'video',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['video/index'], 'visible' => Yii::$app->user->can('teacher')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['video/create'], 'visible' => Yii::$app->user->can('teacher')],
                                ],
                            ],
                            [
                                'label' => 'User',
                                'visible' => Yii::$app->user->can('manager'),
                                'icon' => 'user',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'List', 'iconType' => 'fas', 'icon' => 'list', 'url' => ['usercrud/index'], 'visible' => Yii::$app->user->can('manager')],
                                    ['label' => 'Create', 'icon' => 'plus-square', 'url' => ['usercrud/create'], 'visible' => Yii::$app->user->can('admin')],
                                ],
                            ],




                        ],
                    ]
                ) ?>
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
