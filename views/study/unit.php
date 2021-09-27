<?php
use yii\helpers\Html;
use app\models\Unit;
use yii\web\YiiAsset;


YiiAsset::register($this);
$theme = $this->theme;
$unit = Unit::findOne($id);

echo Html::a('<span class="btn-label text-white">Generate PDF <i class="fas fa-file-pdf"></i></span>',['unitpdf','id'=>$id],['class'=>'btn btn-info btn-small float-right']);
$this->title=Html::encode($unit->unitTitle);
$this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['page/courses']];
$this->params['breadcrumbs'][] = ['label' => $unit->lesson->course->courseName, 'url' => ['page/course-single', 'id' => $unit->lesson->course->id]];
$this->params['breadcrumbs'][] = ['label' => $unit->lesson->lessonTitle];





?>

<div class="container-fluid">
    <div class="row mx-5">
        <div class="col-md-6 offset-3">
            <img id="image" style="max-height: 250px" src="<?= Yii::getAlias('@web').$unit->imageURL;?>"/>
        </div>
    </div>

    <div class="row mx-5">
        <div class="col-md-12">
            <h4 class="font-open-sans mt-5"> <?=$unit->unitTitle?> </h4><br>
            <div class="text-justify"> <?=$unit->unitText?> </div>
        </div>
    </div>
</div>