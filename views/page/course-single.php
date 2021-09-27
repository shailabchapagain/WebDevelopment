
<?php
/**
 * @var $course
 * @var Course $courseSub
 * @var \app\models\Review $reviewmodel

 */


use app\assets\CourseSingleAssets;
use app\widgets\Alert;
use kartik\rating\StarRating;
use yii\bootstrap4\Accordion;
use yii\bootstrap4\Button;
use yii\helpers\Html;
use app\models\Course;

use yii\helpers\Url;
use yii\widgets\ActiveForm;


CourseSingleAssets::register($this);
$theme = $this->theme;
$course=Course::findOne($id);
$le= $course->findLesson($course->id);

$this->title = Html::encode("{$course->courseName}");
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['courses']];
$this->params['breadcrumbs'][] = ['label' => $course->courseCategory0->name, 'url' => ['courses?CourseSearch%5BcourseCategory%5D='.$course->courseCategory0->id]];
$this->params['breadcrumbs'][] = $this->title

?>

<div class="container-fluid gradient-background">
    <div class="container h-200">
        <div class="row my-auto h-100">
            <div class="col-md-8 py-4" >
                <span class="text-justify course-description">
                   <?php echo $course->courseDescription; ?>
                </span>
            </div>
            <div class="col-md-4 d-none d-md-block ">
                <img id="course-single-header-image" src="<?= Yii::getAlias('@web').$course->imageURL;?>"/>
            </div>

        </div>
        <div class="row">
            <div class="col-md-7 py-4">


   <?php

    if (Yii::$app->session->hasFlash('success')){
        echo Alert::widget();
    }
    elseif (Yii::$app->session->hasFlash('success')){
        echo Alert::widget();
    }

   $user_id = Yii::$app->user->id;

         if (!$courseSub->isSubscribed($user_id)) {
             ?>
            </div>
<div class="form-group">
                <?php
                if(Yii::$app->user->isGuest){
                    $button = '<h5 class="text-white">

                    Please Login or register to Subscribe to this course.

                    </h5>';

                }else{

                    $button = Html::submitButton('Subscribe Subject', ['class' => 'btn btn-success btn-lg', 'name' => 'action', 'value' => 'subscribe', 'data' => [
                        'confirm' => 'At this stage you\'ll be redirected to external payment services like Paypal, MBWay to make the payment. But since this is only demo we decided to leave it out. Thank You. please hit OK to Subscribe.'
                    ]]);
                }
       ?>
            </div>
           <?php
         } else {
            $button = Html::submitButton('Unsubscribe Subject', ['class' => 'btn btn-danger btn-lg', 'name' => 'action', 'value' => 'unsubscribe', 'data' => [
                'confirm' => 'Are you sure want to Unsubscribe?'
            ]]); ?>
            <div class="form-group">
                <?php

                    echo Html::a('<span class="btn-label ">View Course</span>', ['study/overview','id'=>$id], ['class' => 'btn btn-primary btn-lg']);

                }?>

</div>


 <?php  $form= ActiveForm::begin();
   echo Html::hiddenInput("id", $courseSub->id);
       echo "<div class='pb-3'>".$button."</div>";
       ActiveForm::end();

?>

            </div>
        </div>
    </div>
</div>

<div class="container" id="course-single-tabs">
    <div class="row py-5">
        <div class="col-lg-7">
            <ul id="myTab2" role="tablist" class="nav nav-tabs nav-pills with-arrow lined flex-column flex-sm-row text-center">
                <li class="nav-item flex-sm-fill">
                    <a id="about-tab" data-toggle="tab" href="#pill-about" role="tab" aria-controls="about" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 active">About</a>
                </li>
                <li class="nav-item flex-sm-fill">
                    <a id="curr-tab" data-toggle="tab" href="#pill-curr" role="tab" aria-controls="curriculum" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0">Curriculum</a>
                </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pill-about" role="tabpanel" aria-labelledby="about-tab">


                    <h3 class="single-course-heading">About this course</h3>

                    <section class="text-justify">
                        <?= Html::encode("{$course->courseDescription}")  ?>
                    </section>
                    </div>




            <div class="tab-pane fade" id="pill-curr" role="tabpanel" aria-labelledby="curr-tab">
<?php
$l= $course->findLesson($course->id);
  foreach ($l as $item) {
      echo Accordion::widget([
          'autoCloseItems'=>false,
          'items' => [
              [
                  'label' => $item->lessonTitle,
                  'content' => $item->lessonDescription,
                  'options' => ['class' => 'card bg-white'],
                  'contentOptions' => ['class' => 'out']

              ]
          ]
      ]);
  }?>
            </div>
            </div>
                 </div>

        <?php
        $star=$course->averageReview($course->id);
        $rate=$course->countReview($course->id);

        $max_star=5;
       ?>

        <div class="col-lg-4 offset-lg-1">
            <div class="sidebar-right pt-5">
                <div class="widget widget-features shadow-lg">
                    <div class="widget-title">
                        Average User Rating
                    </div>
                    <div class="content average-rating">
                        <h3 class="font-montserrat py-1"><?= $course->averageReview($course->id); ?><small> / </small><?= $max_star ?> </h3>
                        <?php
                                 for($i=0;$i<$star;$i++){
                    echo  ' <i class="fas fa-star fa-fw fa-2x"></i>';
                     }

                        for($j=0;$j<$max_star-$star;$j++){
                            echo " <i class='far fa-star fa-fw fa-2x '></i>";
                        }

                        ?>
                        <h6 class="pt-3 text-muted"> <i class="fas fa-user fa-fw"></i> <?= $course->countReview($course->id)?></h6>
                    </div>

                </div>

                <div class="widget widget-features shadow-lg">
                    <div class="widget-title">
                        Course Features
                    </div>
                    <div class="content">
                        <ul class="features">
                            <li>
                                <i class="fas fa-euro-sign pr-3"></i>
                                <span>Price</span>
                                <span class="right"> <?php if(($course->price)>0) {echo "$course->price";}
                                    else echo "Free"; ?> </span>
                            </li>
                            <li>
                                <i class="fas fa-book pr-3"></i>
                                <span>Lessons</span>
                                <span class="right"><?= $course->countLesson($course->id)?></span>
                            </li>
                            <li>
                                <i class="far fa-sticky-note pr-3"></i>
                                <span>Units</span>
                                <span class="right"><?= $course->countUnits($course->id)?></span>
                            </li>
                            <li>
                                <i class="fab fa-youtube pr-3"></i>
                                <span>Videos</span>
                                <span class="right"><?= $course->countVideos($course->id)?></span>
                            </li>


                            <li>
                                <i class="fas fa-sliders-h pr-3"></i>
                                <span>Field</span>
                                <span class="right"><?= $course->courseCategory0->name ?></span>
                            </li>
                        </ul>


                        <section class="share-via">
                            <h5>
                                Share via
                            </h5>

                            <?= \ymaker\social\share\widgets\SocialShare::widget([
                                'configurator'  => 'socialShare',
                                'url'           => Yii::$app->request->url,
                                'title'         => 'Title of the page',
                                'description'   => $course->courseName,
                                'imageUrl'      => Yii::getAlias('@web').$course->imageURL,
                                'containerOptions' => ['tag' => 'ul', 'class' => 'no-bullet list-horizontal']
                            ]); ?>

                        </section>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


 <?php
 $reviewlist=$course->getReview($course->id);



 $rating=5;
 ?>

<div class="container-fluid bg-light">
    <div class="container">
        <div class="row">
            <!-- User Reviews -->
            <div class="col-lg-7 py-5">
                <h1 class="font-comic-neue text-secondary">Reviews (<?= $rate; ?>)</h1>
<?php
  foreach ($reviewlist as $rev){
      $user=$course->findReviewer($rev->FK_userID);


      ?>
                <div class="row py-4">
                    <div class="col-10">

                        <h4 class="font-josefin-sans"><?= $user->full_name?></h4>

                        <section class="user-rating">
                            <?php
                            for ($j=0;$j<round($rev->rating);$j++) {
                                ?>
                                <i class="fas fa-star" aria-hidden="true"></i>
                                <?php
                            }
                            ?>
                        </section>

                        <p class="text-justify">
                            <?= $rev->reviewtext; ?>
                        </p>
                    </div>
                </div>

<?php
}
  ?>
            </div>

            <!-- Add Review -->

            <div class="col-lg-4 offset-lg-1 py-5">
                <div class="add_review">
                    <?php
                    if (Yii::$app->user->isGuest){
                        ?>
                        <div>
                            <h1 class="font-comic-neue text-secondary">Leave a Review</h1>
                        </div>

                        Please, <?= Html::a('Login', ['user/login'], ['class' => 'profile-link']) ?> or,
                        <?= Html::a('Sign Up', ['user/register'], ['class' => 'profile-link']) ?> to give review
                        <?php
                    }
                    elseif(Yii::$app->session->hasFlash('ReviewSubmitted')){
                        ?>

                            <div class="container-fluid alert alert-success">
                                <div class="container">
                                    Thank you for the review.
                                </div>
                            </div>
                        <?php }
                                else{ ?>
                            <div>
                                <h1 class="font-comic-neue text-secondary">Leave a Review</h1>
                            </div>
                            <div class="post-user-rating">
                                <h4 class="font-josefin-sans">Your Rating :</h4>

                                <?php
                                $form = ActiveForm::begin([
                                    'id' => 'review-form',
                                    'options' => ['class' => 'form-horizontal'],
                                ]) ?>

                                <?= $form->field($reviewmodel, 'rating')->widget(StarRating::classname(), [
                                    'pluginOptions' => ['step' => 1]
                                ])->label(false); ?>

                                <?= $form->field($reviewmodel, 'reviewtext')->textarea() ?>


                                <div class="form-group">
                                    <div class="col-lg-offset-1 col-lg-11">
                                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                                    </div>
                                </div>
                                <?php ActiveForm::end() ?></div>

                        <?php } ?>

                </div>

                </div>
            </div>
</div>
</div>
