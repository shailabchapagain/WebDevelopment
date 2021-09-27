<?php
namespace app\assets;

use yii\web\AssetBundle;

class IndexAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/css/index.css',
    ];
    public $js = [
        'themes/custom/js/index.js',

    ];
    public $depends = [

        'app\assets\OwlcarouselAssets',
    ];
}
