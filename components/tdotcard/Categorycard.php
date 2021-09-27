<?php


namespace app\components\tdotcard;


use Yii;


class Categorycard extends \yii\base\Widget
{
    public $name;
    public $image;
    public $description;

    public function init() {
        // your logic here
        parent::init();
        if ($this->name === null) {
            $this->name = 'Missing Name';
        }
        if($this->image === null){
            $this->image = 'MISSING IMAGE';
        }
        if ($this->description === null){
            $this->description = 'Missing Description';
        }

    }
    public function run(){
        // you can load & return the view or you can return the output variable
        return $this->render('categorybox', ['name' => $this->name, 'image' => $this->image, 'description' => $this->description]);
    }
}
?>

