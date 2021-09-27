<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class LoginRegisterAssets
 * @package app\assets
 */
class LoginRegisterAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/css/login-register.css',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle',
    ];

}