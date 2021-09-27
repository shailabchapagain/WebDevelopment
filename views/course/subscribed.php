<?php

use app\models\search\UserCourseSearch;
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'My Subscribed courses');
$this->params['breadcrumbs'][] = $this->title;
\app\assets\CoursesAssets::register($this);
?>
<div class="course-index">


    <?php Pjax::begin(); ?>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => '_courselist',
        'emptyText' => '<h4> You have no subscriptions. Please visit the course page to and subscribe.</h4>',
    ]) ?>

    <?php Pjax::end(); ?>

</div>
