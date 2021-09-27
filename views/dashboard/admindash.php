    <?php

use app\models\Course;
use app\models\User;
use app\models\UserCourse;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Html;

$this->title = Yii::t('app', 'Dashboard');
$this->params['breadcrumbs'][] = $this->title;
?>

<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row mt-5">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Students</span>
                        <span class="info-box-number">
                            <?= UserCourse::totalStudents() ?>
                </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Courses</span>
                        <span class="info-box-number">
                            <?= Course::totalCourses() ?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-book-reader"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Most Popular Course</span>
                        <span class="info-box-number">
                            <?= UserCourse::mostPopularCourse();?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-euro-sign"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total revenue</span>
                        <span class="info-box-number">
                            <?php
                            echo FAS::icon('euro-sign')->fixedWidth();
                            echo number_format((float)UserCourse::totalRevenue(), 2, '.', '');?>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->




        <div class="row my-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Last 7 Days Report</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>

                                <div class="progress-group">
                                    New Enrollments
                                    <span class="float-right"><b>
                                            <?php
                                                $targetEnroll = 20;
                                                $last7daysenrollment = UserCourse::last7DaysEnrollments();
                                                echo $last7daysenrollment;
                                                $last7daysenrollmentpercent = round(($last7daysenrollment/$targetEnroll)*100, 0);
                                            ?>
                                        </b>/<?=$targetEnroll?></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-primary" style="width: <?=$last7daysenrollmentpercent?>%"></div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    New Registered Users
                                    <span class="float-right"><b>

                                    <?php
                                    $targetRegistration = 25;
                                    $last7daysRegistration = User::last7DaysRegistrations();
                                    echo $last7daysRegistration;
                                    $last7daysRegistrationpercent = round(($last7daysRegistration/$targetRegistration)*100, 0);
                                    ?>
                                        </b>/<?=$targetRegistration?></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-success" style="width: <?=$last7daysRegistrationpercent?>%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Revenue</span>
                                    <span class="float-right"><b>

                                    <?php
                                    $targetRevenue = 200;
                                    $last7daysrevenue = round(UserCourse::last7DaysRevenue(),2);
                                    echo FAS::icon('euro-sign')->fixedWidth();
                                    echo $last7daysrevenue;
                                    $last7daysrevenuepercent = round(($last7daysrevenue/$targetRevenue)*100, 0);
                                    ?>
                                        </b>/<?=$targetRevenue?></span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: <?=$last7daysrevenuepercent?>%"></div>
                                    </div>
                                </div>

                                <!-- /.progress-group -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Most Popular Courses</h3>

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
                            $popularCourses = UserCourse::mostPopularCourseList();
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
                            $enrollments = UserCourse::mostRecentEnrollment();
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

