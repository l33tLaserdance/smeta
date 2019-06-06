<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ContragentsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contragents-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CID') ?>

    <?= $form->field($model, 'ContrName') ?>

    <?= $form->field($model, 'ContrFullName') ?>

    <?= $form->field($model, 'INN') ?>

    <?= $form->field($model, 'KPP') ?>

    <?php // echo $form->field($model, 'OGRN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
