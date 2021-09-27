<?php
use yii\helpers\Html;
use app\models\Unit;
use yii\web\YiiAsset;


YiiAsset::register($this);
$theme = $this->theme;
$unit = Unit::findOne($id);

$this->title=Html::encode($unit->unitTitle);

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