<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tickers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tickers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'default_ticker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nt_ticker')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_date')->textInput(['type' => 'date']) ?>

    <?= $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'min_step')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
