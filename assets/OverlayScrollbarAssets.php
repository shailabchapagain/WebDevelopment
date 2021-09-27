<?php


namespace app\assets;


class OverlayScrollbarAssets extends \yii\web\AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/overlayScrollbar/css/OverlayScrollbars.css',

    ];
    public $js = [
        'themes/custom/overlayScrollbar/js/jquery.overlayScrollbars.js',
        'themes/custom/overlayScrollbar/js/OverlayScrollbars.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];

}