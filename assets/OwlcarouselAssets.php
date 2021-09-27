<?php


namespace app\assets;


use yii\web\AssetBundle;


class OwlcarouselAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/owlCarousel/assets/owl.carousel.css',
        'themes/custom/owlCarousel/assets/owl.theme.default.css',

    ];
    public $js = [
        'themes/custom/owlCarousel/owl.carousel.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}