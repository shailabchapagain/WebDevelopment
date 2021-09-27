<?php


namespace app\assets;


use yii\web\AssetBundle;

class dashboardAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/css/dashboard.css',
    ];
    public $js = [

    ];
    public $depends = [

        'dmstr\adminlte\web\AdminLteAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];
}