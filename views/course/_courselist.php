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

        <div class="col-8 col-md-9">
            <?=Html::a('', ['page/course-single', 'id' => $model->id], ['class' => 'stretched-link'])?>
            <div class="row">
                <div class="col-12">
                    <h3 class="font-open-sans mt-2"> <?= $model->courseName ?></h3>
                    <small>    <?= $model->countLesson($model->id)?> </small>
                    <small class="text-muted"><i class="fas fa-tag fa-fw"></i>
                        <?= $model->courseCategory0->name ?></small>
                </div>




                <div class="col-12">
                    <p class="text-justify my-2 text-muted">
                        <?= substr($model->courseDescription, 0, 500) . ' . . .' ?>
                    </p>
                </div>

            </div>
        </div>




    </div>


</div>

