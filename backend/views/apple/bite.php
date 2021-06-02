<?php

use backend\forms\BiteOffAppleForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model BiteOffAppleForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Bite off Apple';
$this->params['breadcrumbs'][] = ['label' => 'Apples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-bite">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="apple-form">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'percent')->textInput() ?>
        <div class="form-group">
            <?= Html::submitButton('Bite', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
