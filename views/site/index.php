<?php
/* @var $model app\models\Newsletter */

/* @var $this yii\web\View */

$this->title = 'Home - TDOT - Get filled with knowledge.';

use app\assets\IndexAssets;
use app\components\CustomElements;
use app\components\tdotcard\Categorycard;
use app\models\Category;
use app\models\Course;
use app\models\Profile;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use app\modules\user\models\User;

IndexAssets::register($this);
$theme = $this->theme;
?>

<div class="container-fluid home-background parallax mb-4">
    <div class="row h-100 " style="padding-top: 80px">

        <div class="col-12 text-center my-auto">

            <h1 class="display-3 font-open-sans text-white">TDot Academy</h1>
            <h5 class="text-white-50">
                An online learning platform for you to learn anything at your own pace.
            </h5>
            <div class="text-center mt-3">

                <?php
                if (Yii::$app->user->isGuest){
                    echo Html::a('Login Now', ['user/login'], ['class' => 'btn btn-secondary btn-lg rounded-0 mr-3']);
                    echo Html::a('Register Now', ['user/register'] , ['class' => 'btn btn-success btn-lg rounded-0']);
                }else{
                    if(Yii::$app->user->can('manager')) {
                        echo Html::a('Visit Dashboard', ['dashboard/admindash'], ['class' => 'btn btn-secondary btn-lg rounded-0 mr-3']);
                    }
                    elseif(Yii::$app->user->can('teacher')) {
                        echo Html::a('Visit Dashboard', ['dashboard/teacherdash'], ['class' => 'btn btn-secondary btn-lg rounded-0 mr-3']);
                    }
                    else{
                        echo Html::a('Visit Dashboard', ['dashboard/userdash'], ['class' => 'btn btn-secondary btn-lg rounded-0 mr-3']);
                    }
                    echo Html::a('My Enrolled Courses', ['course/subscribed'] , ['class' => 'btn btn-success btn-lg rounded-0']);
                }

                ?>

            </div>
        </div>

    </div>
</div>

<div class="py-5 text-center">
    <div class="container-fluid container-fluid-80">
        <div class="my-4">
            <h1 class="text-center font-weight-bold font-montserrat">Our Top Features</h1>
            <p class="text-muted text-center">Why choose us to fulfill your educational needs.</p>
        </div>
        <div class="row">

            <?php
            customElements::featureCard("fas fa-language fa-fw fa-5x", "#508BEE", "Multiple Languages", "Courses are available in multiple languages to study.");
            customElements::featureCard("fas fa-chart-line fa-fw fa-5x", "#3e184e", "Personalized Dashboard", "Track your progress through personalized dashboard");
            customElements::featureCard("fab fa-youtube fa-fw fa-5x", "#E91508", "Multimedia Lessons", "All courses have lessons in text and video formats.");
            customElements::featureCard("fas fa-university fa-fw fa-5x", "#723b8c", "University Search", "Search universities for your further formal education.");
            ?>

        </div>
    </div>
</div>

<div class="container-fluid py-5" id="top_categories">
    <div class="container">
        <div class="my-4">
            <h1 class="font-weight-bold my-2 font-montserrat">Some Categories</h1>
            <p class="font-italic text-muted">Some of course categories that you can study on TDot.</p>
        </div>

        <div class="row mx-auto my-auto">
            <?php
            /** @var Category[] $categories */
            foreach ($categories as $cat) {
                    echo Categorycard::widget(['name'=>$cat->name, 'image'=>$cat->imgURL, 'description'=>$cat->description]);
                }
            ?>
        </div>
    </div>

</div>

<div class="carousel_section my-5 pt-4">
    <div class="my-4">
        <h1 class="text-center font-weight-bold font-montserrat">Most Enrolled Courses</h1>
        <p class="text-muted text-center">Our courses with most number of students enrolled.</p>
    </div>

    <div class="container-fluid container-fluid-80">
        <div class="carousel_content">
            <div class="owl-carousel owl-theme">

                <?php

                /** @var Course[] $courses */
                foreach ($courses as $item) {
                    CustomElements::carouselItem($item['id'], $item['courseName'], $item['imageURL'], $item['courseDescription'], $item['price']);

                }
                ?>


            </div>
        </div>
    </div>
</div>

<div class="testimonials-clean py-5">
    <div class="container">
        <div class="pb-2 pt-4">
            <h1 class="text-center font-weight-bold font-montserrat">Testimonals</h1>
            <p class="text-muted text-center">Listen what some of the industry leaders have said about our products. </p>
        </div>
        <div class="row people text-justify">

            <?php
            //text-justify
            CustomElements::testimonialCard(
                'Gavin Belson',
                $theme->getUrl('/images/index/people/1.jpg'),
                'This is the great platform for one who wants to learn professionally.They provide really many feature and quality education which is sure that you will achieve your goal.',
                'CEO of Hooli'
            );
            CustomElements::testimonialCard(
                'Monica Hall',
                $theme->getUrl('/images/index/people/2.jpg'),
                'Wow its just amazing.Tdot has always been best for students. I heartly recommend to Students and teacher to join here for getting and providing quality education. ',
                'Associate partner at Raviga'
            );
            CustomElements::testimonialCard(
                'Dinesh Chugtai',
                $theme->getUrl('/images/index/people/3.jpg'),
                'Here are many teachers who are highly accomplished.I recommend Tdot mostly for the beginners because they teach you everything from the basic level to professional level.',
                'Software Engineer at Ratmeggedon.'
            );
            ?>

        </div>
    </div>
</div>

<?php if (Yii::$app->session->hasFlash('newsletterFormSubmitted')): ?>

    <div class="container-fluid alert alert-success">
        <div class="container">
            Thank you for subscribing to our newsletter.
        </div>
    </div>

<?php elseif(Yii::$app->session->hasFlash('newsletterAlreadySubscribed')): ?>

    <div class="container-fluid alert alert-success">
        <div class="container">
            You are already subscribed to our Newsletter, Thank You Again.
        </div>
    </div>

<?php else: ?>

    <section class="newsletter container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-7">
                    <h1 class="font-weight-bold font-montserrat text-white"> Subscribe to our Newsletter</h1>
                    <p class="text-white-50">Subscribe to get the latest updates and special offers directly in your inbox.</p>
                </div>

                <div class="col-sm-12 col-lg-5 my-auto newsletter-form">


                    <?php $form = ActiveForm::begin(['options'=>['class' => 'newsletter-form']]); ?>

                    <div class="input-group">
                        <?= $form->field($model, 'newsletteremail', [
                            'inputOptions' => [
                                'placeholder' => 'Enter your email',
                                'id' => 'newsletteremail',
                                ]])->textInput()->label(false)
                        ?>
                        <div class="input-group-btn">
                            <?= Html::submitButton('Subscribe Now', ['id'=> 'newsletterbtn','class' => 'btn my-auto', 'name' => 'newsletter-button']) ?>

                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>



