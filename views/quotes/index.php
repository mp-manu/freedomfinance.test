<?php

use yii\helpers\Html;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\models\QuotesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Котировки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quotes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить котировку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            [
                'attribute' => 'ticker_id',
                'value' => function ($model) {
                    return $model->ticker->short_name;
                },
                'filter' => $tickersFilter
            ],
            'bbp',
            'bap',
            'spred',
            [
                'attribute' => 'ltt',
                'filterType' => GridView::FILTER_DATE_RANGE,
                'filterWidgetOptions' => [
                    'convertFormat'=>true,
                    'language' => 'ru',
                    'pluginOptions' => [
                        'opens'=>'right',
                        'locale' => [
                            'cancelLabel' => 'Закрыть',
                            'applyLabel' => 'Поиск',
                            'format' => 'Y-m-d',
                        ]
                    ]
                ],
            ],
            'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
