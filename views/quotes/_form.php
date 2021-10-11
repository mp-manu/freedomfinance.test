<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quotes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ticker_id')->dropDownList(\yii\helpers\ArrayHelper::map($tickers, 'id', 'short_name')) ?>

    <?= $form->field($model, 'bbp')->textInput() ?>

    <?= $form->field($model, 'bap')->textInput() ?>

    <?= $form->field($model, 'spred')->textInput() ?>

    <?= $form->field($model, 'ltt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
