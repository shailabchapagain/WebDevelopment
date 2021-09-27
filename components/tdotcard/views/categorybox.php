<?php
/** @var string $description */
/** @var string $name */
/** @var string $image */


echo "<div class='col-lg-3 col-md-6 mx-auto my-auto my-sm-2'>
                <!-- Card-->
                <div class='card rounded shadow-sm border-0'>
                    <div class='card-body p-4'> ";
?>
    <img class='top_categories_image d-block mx-auto mb-3' src="<?=
    Yii::getAlias('@web').$image;?> "
         style="height: 200px !important; width: 500px !important; object-fit: cover !important; max-width: 100% !important; object-position: center !important;">
<?php

echo "
                        <h5><a class='text-dark' href='#'>$name</a></h5>
                         <p class='small text-muted font-italic text-justify'> $description </p>
                    </div>
                </div>
            </div>";