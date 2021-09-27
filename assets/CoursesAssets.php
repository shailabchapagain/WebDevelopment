<?php


namespace app\assets;


use yii\web\AssetBundle;

class CoursesAssets extends AssetBundle
{
    /**
     *
     *Courses page asset bundle
     */
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'themes/custom/css/courses.css',

    ];
    public $depends = [


    ];

}