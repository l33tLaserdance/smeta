<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\SmetaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smeta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ItemID') ?>

    <?= $form->field($model, 'ItemName') ?>

    <?= $form->field($model, 'ItemMeasurement') ?>

    <?= $form->field($model, 'Amount') ?>

    <?= $form->field($model, 'ItemCost') ?>

    <?php // echo $form->field($model, 'ItemSumm') ?>

    <?php // echo $form->field($model, 'ServiceName') ?>

    <?php // echo $form->field($model, 'ServiceCost') ?>

    <?php // echo $form->field($model, 'ServiceSumm') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
