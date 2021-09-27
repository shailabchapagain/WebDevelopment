<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 *
 *About us page asset bundle
 */
class AboutAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

       'themes/custom/css/about.css'
    ];
    public $js = [
        'themes/custom/js/about.js'
    ];
    public $depends = [

    ];
}