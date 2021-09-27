<?php

use app\models\Course;
use app\models\Note;
use app\models\UserCourse;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
$theme = $this->theme;

?>
<div class="container">
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Recent Subscriptions</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <?php
                            $recentCourses = UserCourse::getMyEnrollments();
                            foreach ($recentCourses as $course){
                                $courseObj = $course->course;
                                echo "
                                
                                <li class='item'>
                                <div class='product-img'>
                                    <img src='". Yii::getAlias('@web').$courseObj->imageURL . "' alt='Product Image' class='img-size-50'>
                                </div>
                                <div class='product-info'>";

                                echo Html::a($courseObj->courseName, ['page/course-single', 'id' => $courseObj->id]);

                                echo "
                                    <span class='product-description'>
                                        ".substr($courseObj->courseDescription, 0, 50)." ... 
                                    </span>
                                </div>
                            </li>
                                ";
                            }
                            ?>



                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <?= Html::a('View All Subscriptions', ['course/subscribed']) ?>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Notes</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="products-list product-list-in-card pl-2 pr-2">
                            <?php
                            $notes = Note::getMyNotes();
                            foreach ($notes as $note){
                                echo "
                                
                                <li class='item'>

                                <div class='product-info'>
                                    $note->title
                                    <span class='product-description'>
                                    $note->notetext
                                    </span>
                                </div>
                            </li>
                                ";
                            }
                            ?>



                        </ul>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                        <?= Html::a('View All Notes', ['note/index']) ?>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>


        </div>
    </section>
</div>