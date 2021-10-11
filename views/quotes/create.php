<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Quotes */

$this->title = 'Добавить';
$this->params['breadcrumbs'][] = ['label' => 'Котировки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'tickers' => $tickers
    ]) ?>

</div>
