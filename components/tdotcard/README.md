Caregory card
=============
Creates a category simple card layout.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist tdot/yii2-categorycard "*"
```

or add

```
"tdot/yii2-categorycard": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= \app\components\tdotcard\Categorycard::widget(['name' => 'something', 'image' => 'image URL', 'description' => 'something']); ?>
```
