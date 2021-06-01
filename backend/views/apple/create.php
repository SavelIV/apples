<?php

use backend\forms\GenerateAppleTreeForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model GenerateAppleTreeForm */
/* @var $model backend\models\Apple */

$this->title = 'Create Apple Tree';
$this->params['breadcrumbs'][] = ['label' => 'Apples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="apple-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="apple-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'appleQuantity')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
