<?php
use yii\helpers\Html;

?>


<div class="container-fluid">

    <div class="row my-3 course-shadow py-3 h-100">

        <div class="col-4 col-md-3">

            <?=Html::a('', ['page/course-single', 'id' => $model->id], ['class' => 'stretched-link'])?>
            <div class="course-image h-100">
                <img src="<?= Yii::getAlias('@web').$model->imageURL;?>" alt="course" class="course-image h-100">
            </div>


        </div>

        <div class="col-8 col-md-6">
            <?=Html::a('', ['page/course-single', 'id' => $model->id], ['class' => 'stretched-link'])?>
            <div class="row">
                <div class="col-12">
                    <h3 class="font-open-sans mt-2"> <?= $model->courseName ?></h3>
                    <small class="mx-2"> Lessons :    <?= $model->countLesson($model->id)?> </small>
                    <small class="text-muted mx-2"><i class="fas fa-tag fa-fw"></i>
                        <?= $model->courseCategory0->name ?></small>
                    <small class="text-muted mx-2"> <i class="fas fa-language"></i>   <?= $model->language0->language?> </small>
                </div>




                <div class="col-12">
                    <p class="text-justify my-2 text-muted">
                        <?= substr($model->courseDescription, 0, 200) . ' . . .' ?>
                    </p>
                </div>

            </div>
        </div>

        <!-- Mobile Only -->
        <div class="offset-4 col-8 mt-3 mb-1 d-md-none">

            <div class="col-7 float-left">
                <section>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </section>
                <small>40 <i class="fas fa-user fa-fw"></i> Reviews </small>

            </div>
            <div class="col-5 float-right">
                <h2 class="font-open-sans text-dark">
                    <?php
                    $price=$model->price;
                    if($price > 0 ){
                        echo "<i class='fas fa-euro-sign'></i> " . $price;
                    }
                    else echo "FREE";
                    ?>
                </h2>


            </div>
        </div>
        <!-- Mobile Only End-->

        <div class="col-md-3 d-none d-md-block text-center align-self-center">

            <h2 class="text-center font-open-sans text-dark">
                <?php
                $price=$model->price;

                if($price > 0 ){
                    echo "<i class='fas fa-euro-sign'></i> " . $price;
                }
                else echo "FREE";
                ?></h2>
            <section>
                <?php
                $avgstar=$model->averageReview($model->id);

                for($i=0;$i<$avgstar;$i++){
                    echo " <i class='fas fa-star fa-fw'></i>";
                }
                for($j=0;$j<5-$avgstar;$j++){
                    echo " <i class='far fa-star fa-fw'></i>";
                }

                ?>
            </section>

            <h6>
                <?=$model->averageReview($model->id)?>
                star
                (  <?= $model->countReview($model->id)?>  <i class="fas fa-user fa-fw"></i> Reviews) </h6>



        </div>


    </div>


</div>

