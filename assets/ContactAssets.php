<?php


namespace app\assets;

use yii\web\AssetBundle;

class ContactAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/selector/countrySelect.css',
        'themes/custom/selector/intlTelInput.css',
        'themes/custom/css/contact.css',
    ];
    public $js = [
        'themes/custom/selector/countrySelect.js',
        'themes/custom/selector/intlTelInput.js',
        'themes/custom/js/contact.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}

