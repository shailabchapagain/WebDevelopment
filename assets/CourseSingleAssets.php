<?php


namespace app\assets;


use yii\web\AssetBundle;

class CourseSingleAssets extends AssetBundle
{
    /**
     *
     *CourseSingle page asset bundle
     */
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/css/course-single.css'
    ];
    public $depends = [

    ];

}