<?php


namespace app\assets;

use yii\web\AssetBundle;

/**
 *
 *Faq page asset bundle
 */
class FaqAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'themes/custom/resources/css/faq.css'
    ];
    public $depends = [

    ];
}