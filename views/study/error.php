<?php
use yii\helpers\Html;


?>
<div class="container" style="padding: 10%">
<?php
echo Html::a('You are trying to enter to Unsubscribed Course. Please Subscribe here', ['page/course-single', 'id' => $course->id], ['class' => 'page-link']);
?>
</div>
