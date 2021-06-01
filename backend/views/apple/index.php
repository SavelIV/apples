<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AppleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Apples';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-index">

    <p>
        <?= Html::a('Generate Apple Tree', ['generate-apple-tree'], ['class' => 'btn btn-success']) ?>
    </p>

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'color',
                'filter' => $searchModel::getColorList(),
                'value' => function ($model) {
                    return "<div class='apple_color' style='background-color: " . Html::encode($model->getColorName()) . "'></div> " . Html::encode($model->getColorName());
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'status',
                'filter' => $searchModel::getStatusList(),
                'value' => function ($model) {
                    return $model->getStatusName();
                },
                'format' => 'raw',
            ],
            'size',
            'createdAt:datetime',
            'fallenAt:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
