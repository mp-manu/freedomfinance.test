<?php

/* @var $this yii\web\View */

$this->title = 'Добро пожаловать в '. Yii::$app->name;
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4"><?= $this->title ?></h1>
    </div>

    <div class="body-content">
        <p>//Чтобы запустить парсинг коректировок в фоне, запустите консольную команду:</p>
        <code>
            yii parse
        </code>
    </div>
</div>
