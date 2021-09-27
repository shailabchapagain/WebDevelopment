<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;

use app\assets\LoginRegisterAssets;
use yii\helpers\Url;

LoginRegisterAssets::register($this);
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
<?php $this->beginBody()?>

<div class="wrap vertical-center">

    <div class="container" id="floating-box">
        <div class="row">
            <div class="col-sm-12">
                <div class="signup-form">



                    <?php if(Yii::$app->session->hasFlash('pagerestricted')): ?>

                    <div class="container-fluid alert alert-danger">
                        <div class="container">
                            Hmm ... you were trying to view a restricted page.
                        </div>
                    </div>
                    <div class="container-fluid alert alert-info">
                        <div class="container">
                            Please login to continue or go back to home.
                        </div>
                    </div>
                    <?php endif; ?>


                    <div class="shadow-lg wrapper">
                        <div class="text-right"><a href="<?= Url::home()?>">Go home <i class="fa fa-home fa-fw fa-2x"></i></a></div>

                        <h1 class="font-open-sans py-4"> <?= $this->title ?></h1>


                        <?= $content ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
