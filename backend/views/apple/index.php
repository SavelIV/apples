<?php

use backend\models\Apple;
use yii\bootstrap\Html as BootstrapHtml;
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
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Actions',
                'template' => '{fall-on-the-ground}  {bite-off}  {delete}',
                'visibleButtons' =>
                    [
                        'fall-on-the-ground' => function ($model) {
                            return $model->status === Apple::STATUS_ON_THE_TREE;
                        },
                        'bite-off' => function ($model) {
                            return $model->status === Apple::STATUS_FALLEN;
                        },
                        'delete' => function ($model) {
                            return $model->status === Apple::STATUS_ROTTEN;
                        },
                    ],
                'buttons' => [
                    'fall-on-the-ground' => function ($url, $model) {
                        return Html::a(BootstrapHtml::icon('arrow-down'),
                            ['fall-on-the-ground', 'id' => $model->id],
                            ['title' => 'Fall on the Ground', 'class' => 'btn btn-default btn-sm']
                        );
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(BootstrapHtml::icon('trash'),
                            ['delete', 'id' => $model->id],
                            [
                                'title' => 'Delete',
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this Apple?',
                                    'method' => 'post',
                                ],
                                'class' => 'btn btn-default btn-sm',
                            ]
                        );
                    },
                    'bite-off' => function ($url, $model) {
                        return Html::a(BootstrapHtml::icon('cutlery'),
                            ['bite-off', 'id' => $model->id],
                            ['title' => 'Bite off', 'class' => 'btn btn-default btn-sm']
                        );
                    }
                ],
            ],
        ],
    ]); ?>
</div>
