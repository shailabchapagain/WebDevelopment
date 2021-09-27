<?php
namespace app\components;

use Yii;
use yii\helpers\Html;

class CustomElements
{
    public static function featureCard($icon, $color, $title, $description) {
        echo "
        <div class='col-sm-6 col-lg-3 mb-5'>
        
                <i class= '$icon py-3' style='color: $color'></i>
                <h5> $title </h5>
                <p class='text-muted'> $description </p>
            </div>        
        ";
    }


    public static function testimonialCard($name, $image, $description, $title) {
        echo "
        <div class='col-md-4 item'>
                <div class='box'>
                    <p class='description'>$description</p>
                </div>
                <div class='author'><img class='rounded-circle' src='$image'>
                    <h5 class='name'>$name</h5>
                    <p class='title'>$title</p>
                </div>
            </div>
        ";
    }

    public static function carouselItem($id, $title, $image, $description, $price) {

        echo "
            <div class='carousel_item'>
                    <div class='carousel_image mx-auto'>";?>
                        <img alt='$title' class='img-fluid' src="<?= Yii::getAlias('@web').$image;?> ">
        <?php echo "</div>
                    <div class='carousel_details'>
                        <div class='carousel_title'>
                            <h4 class='font-open-sans'>". str_pad(substr($title, 0 , 40), 40, ' ', STR_PAD_RIGHT). "... </h4>
                        </div>

                        <hr>

                        <p>".substr($description, 0 , 100). " . . . </p>

                        <h5 class='font-open-sans'>
                        ";
        if ($price > 0 ) echo "<i class='fas fa-euro-sign'></i> " . $price;
        else echo "FREE";
        echo "</h5>" .
              Html::a('Learn More', ['page/course-single', 'id' =>$id], ['class' => 'btn btn-lg btn-dark rounded-0 text-light'])
        . "</div>
                </div>
        ";

    }

    public static function teamCard($name, $title, $background, $front, $email, $facebook){

        echo "
                            <div class='col-md-4 py-5 col-sm-9 mx-auto col-10'>
                    <div class='card team-card'>
                        <div class='background-block'>
                            <img src='$background' alt='Team member Background' class='background'/>
                        </div>
                        <div class='profile-thumb-block'>
                            <img src='$front' alt='Team member Image' class='profile'/>
                        </div>
                        <div class='card-content'>
                            <h4 class='pt-3'>$name</h4>
                            <p>$title</p>
                            <section class='share-via'>
                                <a href='mailto:$email'>
                                    <span class='fa-stack'>
                                        <i class='fas fa-circle fa-stack-2x email-back'></i>
                                        <i class='fas fa-at fa-stack-1x fa-inverse'></i>

                                    </span>
                                </a>
                                
                                <a href='$facebook'>
                                    <span class='fa-stack'>
                                        <i class='fas fa-circle fa-stack-2x facebook-back'></i>
                                        <i class='fab fa-facebook-f fa-stack-1x fa-inverse'></i>
                                    </span>
                                </a>


                            </section>

                        </div>
                    </div>
                </div>
        ";
    }
}