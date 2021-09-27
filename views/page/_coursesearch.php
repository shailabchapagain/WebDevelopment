<?php

use app\models\Category;
use app\models\Course;
use app\models\Language;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['courses'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]);
    $category  = Course::getAllCategoryAsArray();
    $author = Course::getAllAuthorAsArray();
    $language = Course::getAllLanguageAsArray();

    ?>



    <div class="row filter-back rounded pt-3">
        <div class="col-12">
            <div class="dropdown float-left mx-2">
                <?= $form->field($model, 'language',['inputOptions' => ['class' => 'btn']])->label(false) ->dropDownList($language, ['prompt' => Yii::t('app','Language')])?>
            </div>

            <div class="dropdown float-left mx-2">
                <?= $form->field($model, 'courseCategory' , ['inputOptions' => ['class' => 'btn']])->label(false)->dropDownList($category, ['prompt' => Yii::t('app','Category')]) ?>
            </div>

            <div class="dropdown float-left mx-2">
                <?= $form->field($model, 'author', ['inputOptions' => ['class' => 'btn']])->label(false)->dropDownList($author, ['prompt' => Yii::t('app','Author')]) ?>
            </div>

            <div class="dropdown float-left mx-2">
                <?= $form->field($model, 'courseName',['inputOptions' => ['placeholder' => 'Course Name', 'class' => 'form-control']])->label(false)?>
            </div>





            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Filter'), ['class' => 'btn btn-info px-4 mx-2 ']) ?>
                <?= Html::a('Reset', ['courses'], ['class'=>'btn btn-dark px-4 mx-2 ']) ?>

            </div>

        </div>
    </div>





    <?php ActiveForm::end(); ?>

</div>
