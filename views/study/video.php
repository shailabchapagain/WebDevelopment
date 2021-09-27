<?php

use app\models\Video;
use lesha724\youtubewidget\Youtube;
use yii\helpers\Html;
use yii\web\YiiAsset;

YiiAsset::register($this);
$video=Video::findOne($id);
$course=$video->lesson->course->id;

$this->title=Html::encode($video->videoTitle);
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['page/courses']];
$this->params['breadcrumbs'][] = ['label' => $video->lesson->course->courseName, 'url' => ['page/course-single', 'id' => $video->lesson->course->id]];
$this->params['breadcrumbs'][] = ['label' => $video->lesson->lessonTitle];

?>
<div class="container py-2">
    <div class="row mx-5">

        <?= Youtube::widget([
            'video' => $video->videoURL,
            'iframeOptions' => [ /*for container iframe*/
                'class' => 'youtube-video'
            ],
            'divOptions' => [ /*for container div*/
                'class' => 'youtube-video-div'
            ],
            'height'=>420,
            'width'=>820,
            'playerVars'=>[
                'autoplay' =>0,
                'controls' =>1,
                'showinfo' =>0,
                'start' =>0,
                'end' =>0,
                'loop ' =>1,
                'modestbranding'=>1,
                'fs'=>1,
                'rel'=>0,
                'disablekb'=>0,
                'version'=>3,
                'iv_load_policy'=>3,
                'enablejsapi'=>1,
                'autohide'=>0,
                'cc_load_policy'=>1,
            ],
            'events'=>[
                'onReady'=> 'function (event){
// event.target.playVideo();
}',
            ]
        ]);
        ?>

    </div>
</div>