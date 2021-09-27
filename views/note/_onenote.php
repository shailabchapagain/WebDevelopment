<?php

use app\assets\CourseSingleAssets;
use yii\helpers\Html;

\app\assets\CoursesAssets::register($this);

?>

<div class="container border-3">

    <div class="row my-3 course-shadow py-3 h-100 mx-5">


        <div class="col-12">
            <?=Html::a('', ['note/view', 'id' => $model->id], ['class' => 'stretched-link'])?>
            <div class="row mx-3">
                <div class="col-12">
                    <h3 class="font-open-sans mt-2"> <?= $model->title ?></h3>
                </div>

                <div class="col-12">
                    <p class="text-justify my-2 text-muted">
                        <?= substr($model->notetext, 0, 200) . ' . . .' ?>
                    </p>
                </div>

            </div>
        </div>


    </div>


</div>

