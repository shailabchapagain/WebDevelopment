<?php

use app\assets\FaqAssets;
use yii\bootstrap4\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Accordion;

FaqAssets::register($this);
$title = 'Frequently asked Questions';
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title

?>

<?php

?>



<div class="container-fluid">
    <div class="col-lg-12" style="padding-top: 50px; padding-bottom: 10px" >
   <?php
        echo Accordion::widget([
        'items' => [

        [
        'label' => 'What do Tdot courses include?',
        'content' => 'Each Tdot course is created, owned and managed by the instructors.The courses are available in several language and there are many courses related to different field for example technology, business, science and many all. Which also include videos, slides and additional resources the teacher has uploaded.In addition, instructors can add quizzes, Question, Answer, exercises, as a way to enhance the learning experience of Students.',
            'contentOptions' => ['class' => 'bg-white'],
            'options'=>['class'=>'border-0 card collapsible-link']
        ],

        [
        'label' => 'How do i take the Tdot course?',
        'content' => 'Tdot courses are entirely on-demand,which means that you can subscribe in the courses that interest you and learn at your own pace. Tdot courses can be accessed from several different platforms, including a desktop, laptop, and our Android or ios mobile. After you enroll in a course, you can access it by clicking on the course link you will receive in your confirmation email, provided you are logged into Tdot account.',
        'contentOptions'=>['class' => 'bg-white'],
            'options'=>['class'=>'border-0 card collapsible-link']

            ],

        [
        'label' => 'How long do i have to complete a Tdot course?',
        'content' =>'As noted above, there are no deadlines to begin or complete the course. Even after you complete the course, you will continue to have access to it, provided that your account’s in good standing, and Udemy continues to have a license to the course.',
        'options'=>['class'=>'border-0 card collapsible-link']
        ],
            [
                'label' => 'Is there any way to preview a course?',
                'content' =>'Yes! If you\'re not sure if a course is right for you, you can start a free preview and watch a handful of lectures the instructor has selected. ',
                'options'=>['class'=>'border-0 card collapsible-link'],
                'itemToggleOptions'=>['class'=>'custom-toogle']

            ],

            [
                'label' => 'What if I don’t like a course I purchased?',
                'content' =>'We want you to be satisfied, so if you\'re not happy with a course, you can even request a full refund within 30 days of purchasing a course. ',
                'options'=>['class'=>'border-0 card collapsible-link']

            ],

            [
                'label' => 'Can my courses ever be removed from Tdot?',
                'content' =>'On rare occasions, Tdot may be required to remove a course from the platform due to policy or legal reasons. If this does happen to a course you\'re enrolled in, please contact us and we\'ll be ready to help. ',
                'options'=>['class'=>'border-0 card collapsible-link']
            ],
        ]
        ]);?>
    </div>
</div>





