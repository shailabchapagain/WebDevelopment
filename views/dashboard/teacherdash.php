<?php

use app\models\Course;
use app\models\UserCourse;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
$theme = $this->theme;

?>

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mt-5">
            <div class="col-12 col-sm-12 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">My Total Students</span>
                        <span class="info-box-number">
                            <?= UserCourse::totalStudentsOfTeacher() ?>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-12 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">My Total Courses</span>
                        <span class="info-box-number">
                            <?= Course::totalCoursesOfTeacher() ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-12 col-md-4">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-reader"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Most Popular Course</span>
                        <span class="info-box-number">
                            <?= UserCourse::mostPopularCourseOfTeacher();?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">My Popular Courses</h3>

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
                            $popularCourses = UserCourse::mostPopularCourseListOfTeacher();
                            foreach ($popularCourses as $course){
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
                        <?= Html::a('View All Courses', ['owncourse/index']) ?>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Most Recent Enrollment</h3>

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
                            $enrollments = UserCourse::mostRecentEnrollmentOfTeacher();
                            foreach ($enrollments as $enrollment){
                                $courseObj = $enrollment->course;
                                $user = $enrollment->user;
                                echo "
                                
                                <li class='item'>
                                <div class='product-img'>
                                    <img src='". Yii::getAlias('@web').$courseObj->imageURL . "' alt='Product Image' class='img-size-50'>
                                </div>
                                <div class='product-info'>
                                $user->username
                                    <span class='product-description'>
                                    Enrolled Course : $courseObj->courseName
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
                        <?= Html::a('View All Enrollments', ['user-course/index']) ?>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>


        </div>

    </div>
</section>

