<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TickersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'short_name') ?>

    <?= $form->field($model, 'default_ticker') ?>

    <?= $form->field($model, 'nt_ticker') ?>

    <?= $form->field($model, 'first_date') ?>

    <?php // echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'min_step') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
