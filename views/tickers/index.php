<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TickersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Тикеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tickers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить Тикер', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'short_name',
            'default_ticker',
            'nt_ticker',
            'first_date',
            //'currency',
            //'min_step',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
