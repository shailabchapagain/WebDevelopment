<?php

use app\assets\CourseSingleAssets;
use yii\helpers\Html;

\app\assets\CoursesAssets::register($this);

?>

<div class="container border-3">

    <div class="row my-3 course-shadow py-3 h-100 mx-5">
<div class="col-2 offset-1">

        <div class="course-image h-100">
            <i class="fas fa-university fa-6x"></i>
        </div>
</div>

    <div class="col-8">
        <div class="row">
            <div class="col-12">
                <h3 class="font-open-sans mt-2"> <?= $model->universityname ?></h3>
            </div>
            <div class="col-12">
                <p class="text-justify my-2 text-muted">
                    <?= $model->universitycountry ?>
                </p>
            </div>





    </div>
    </div>


        </div>
</div>




