<?php

use app\models\Course;
use yii\helpers\Html;

\app\assets\CourseSingleAssets::register($this);
$course=Course::findOne($id);
$lessons= $course->findLesson($course->id);

$this->title = Html::encode("{$course->courseName}");
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['page/courses']];
$this->params['breadcrumbs'][] = $this->title


?>

<div class="container-fluid">
    <section class="mx-5">
    <div class="display-4">Overview</div>
    <hr>
    <div class="col-md-6 offset-3">
        <img id="course-single-header-image" src="<?= Yii::getAlias('@web').$course->imageURL;?>"/>
    </div>

    <hr>
    <div class="row ">
    <section>
        <div class="h2 font-weight-lighter ">About this Course</div>
        <div class="text-justify my-2"> <?= $course->courseDescription ?></div>
        <hr>
    </section>
<section
        <div class="h2 font-weight-lighter my-3">Course Features</div>
        <div class="col-md-7">
        <div class="h4 font-weight-light mb-3"><em><b> Lessons </b></em></div>
   <?php foreach ($lessons as $le){

          echo '<div class=list-unstyled><ul><li>
'.$le->lessonTitle.'</li></ul></div>';


        } ?>

            <hr>

            <div class="row">
                <div class="h4 font-weight-light my-3 col-md-4"><em><b> Total Lessons </b></em></div>
                <div class="col-md-4 my-3"> <?= $course->countLesson($course->id)?></div>
            </div>



                     <hr>

            <div class="row">
                <div class="h4 font-weight-light my-3 col-md-4"><em><b> Total Units </b></em></div>
                <div class="col-md-4 my-3"> <?= $course->countUnits($course->id)?></div>
            </div>

            <hr>

            <div class="row">
                <div class="h4 font-weight-light my-3 col-md-4"><em><b> Total Videos </b></em></div>
                <div class="col-md-4 my-3"> <?= $course->countVideos($course->id)?></div>
            </div>

            <hr>

            <div class="row">
                <div class="h4 font-weight-light my-3 col-md-4"><em><b> Author </b></em></div>
                <div class="col-md-4 my-3"> <?php echo $course->author0->username?></div>
            </div>



            <hr>
            <div class="row">
        <div class="h4 font-weight-light my-3 col-md-4"><em><b> Price </b></em></div>
                <div class="col-md-4 my-3"><?php if(($course->price)>0) {echo $course->price.' € ';}
                    else echo "Free"; ?></div>
            </div>

        </div>

    </section>
    <hr>
        <section>
            <div class="h2 font-weight-lighter my-3"> <i class="fas fa-hand-point-left"></i> Use Navigation menu on the left to study</div>

        </section>



            </div>
    <hr>
</section>

</div>



