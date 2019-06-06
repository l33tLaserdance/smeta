<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Contragents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contragents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ContrName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ContrFullName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'INN')->textInput() ?>

    <?= $form->field($model, 'KPP')->textInput() ?>

    <?= $form->field($model, 'OGRN')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
