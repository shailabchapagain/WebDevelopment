<?php
use yii\widgets\ListView;
use app\assets\CoursesAssets;
use yii\widgets\Pjax;

/**
 *
 */

CoursesAssets::register($this);
$theme = $this->theme;

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container my-5">

    <?php
    /**
     * @var $dataProvider \yii\debug\models\timeline\DataProvider
     * @var $searchModel \app\models\search\CourseSearch
     */
    ?>

    <div class="container">
        <div class="row my-4">
            <div class="col-12 font-josefin-sans">
                <h2> All of our courses </h2>
                <h5> <i class="far fa-calendar-check fa-fw"></i> We offer great choices for you to study. </h5>
            </div>
        </div>

    </div>








    <?php
    Pjax::begin();
    echo $this->render('_coursesearch', ['model' => $searchModel]);

    echo ListView::widget([

        'dataProvider' => $dataProvider,

        'layout' => '
                    <div class="row my-3">
        <div class="col-12">
            <div class="dropdown float-right">
                <button class="btn dropdown-toggle btn-transparent" type="button" id="sortButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="fas fa-stream fa-fw"></i> Sort by 
                </button>
                               {sorter}

            </div>
        </div>
    </div>

                    {items}{pager}{summary}',
        'sorter' => [
            'options' => [
                'id' => 'course-sorter',
                'class' => 'dropdown-menu'
            ],
            'attributes' => [
                'courseNameAsc',
                'courseNameDesc',
                'priceAsc',
                'priceDesc',
                'addDateAsc',
                'addDateDesc',
            ],

        ],


        'itemView' => '_courselist',
        'emptyText' => 'No Courses Found.',

        'pager' => [
            'prevPageLabel' =>'<i class="fas fa-angle-double-left"></i>',
            'nextPageLabel' => '<i class="fas fa-angle-double-right"></i>',
            'options' => [
                'tag' => 'div',
                'class' => 'float-right list-unstyled',
                'id' => 'pagination'
            ],

            'linkOptions' => [
                'class'=>'btn',
                'role'=>'button'
            ],



        ],
    ]);

    Pjax::end(); ?>

    </section>

</div>
</div>
</div>
