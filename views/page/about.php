<?php

/* @var $this yii\web\View */

use app\assets\AboutAssets;
use app\components\CustomElements;

AboutAssets::register($this);
$theme = $this->theme;
$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title

?>

<div class="site-about pt-5">
    <div class="container-fluid bg-light ">
        <div class="container pb-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="display-4 font-open-sans"> <span class="border-3 rounded"> Who are we </span></h1>
                </div>
            </div>
            <div class="row h-100 mt-5">
                <div class="col-md-7 col-sm-12 text-justify my-auto">
                    <p>
                        We are the Educational Institute. That's likely over-simplified, but its cleaner than a long list of descriptors. We Tdot mainly focus on the technology and Artificial intelligence so we provide quality online education through this online platform.
                    </p>

                    <p>
                        We provide a quality e-learning to each individuals to study effectively. Here We help you to learn different course in several language through video media and many other and also one can have many choices here who are willing to learn.

                    </p>

                </div>

                <div class="offset-md-1 col-md-4 d-none d-md-block ">
                    <img id="about-us" src="<?= $theme->getUrl('/images/about/about-header-side.png'); ?>"/>

                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid about-background parallax" id="about-us-counter">
        <div class="container">
            <div class="row text-white text-center">
                <div class="col-md-4">
                    <i class="fa fa-users fa-fw fa-3x" aria-hidden="true"></i>
                    <h2 id="students-served" class="pt-3 display-4 font-josefin-sans"> 50 </h2>
                    <h2 class="display-5 font-josefin-sans">Students served</h2>
                </div>

                <div class="col-md-4 border-left-right">
                    <i class="fa fa-file-alt fa-fw fa-3x" aria-hidden="true"></i>
                    <h2 id="lessons-taught" class="pt-3 display-4 font-josefin-sans"> 75 </h2>
                    <h2 class="display-5 font-josefin-sans">Lessons taught</h2>

                </div>

                <div class="col-md-4">
                    <i class="fa fa-coffee fa-fw fa-3x" aria-hidden="true"></i>
                    <h2 id="coffee-cups" class="pt-3 display-4 font-josefin-sans"> 150 </h2>
                    <h2 class="display-5 font-josefin-sans">Coffee cups</h2>

                </div>
            </div>
        </div>
    </div>


    <div class="team-grid py-5">
        <div class="container">

            <h1 class="display-4 font-open-sans text-center"> Meet The Team </h1>
            <p class="text-center">The people that keep it running</p>
            <div class="row people">

                <?php
                CustomElements::teamCard("Roshan Poudel", "Developer", $theme->getUrl("/images/about/roshan-back.jpg"), $theme->getUrl("/images/about/roshan.jpg"), "roshan@tdot.com","https://www.facebook.com/pdl.roshan1");
                CustomElements::teamCard("Susan Babu Pandey", "Developer", $theme->getUrl("/images/about/susan-back.jpg"), $theme->getUrl("/images/about/susan.jpeg"), "susan@tdot.com","https://www.facebook.com/susan.pandey.16");
                CustomElements::teamCard("Shailab Chapagain", "Developer", $theme->getUrl("/images/about/shailab-back.jpg"), $theme->getUrl("/images/about/shailab.jpg"), "shailab@tdot.com","https://www.facebook.com/shailab.chapagain");

                ?>


            </div>
        </div>
    </div>


    <div class="container-fluid parallax about-background">
        <div class="container h-100">
            <div class="row my-auto h-100">
                <div class="col-md-12 align-self-center text-center text-white mx-auto">
                    <h3 class="display-4 font-mansalva text-white text-center"> Start Your Journey with us ...</h3>
                    <h6 class="font-montserrat text-white text-center" style="font-size: 125%"> Come on Lets dive in Tdot for deep learning and acquiring vast knowledge.We heartly welcome you here.Walk with us and we will help you to reach your goal.  </h6>
                    <a class="btn btn-lg btn-danger mt-4 mx-auto" href="index.html"> Start Now </a>
                </div>
            </div>
        </div>
    </div>




</div>
