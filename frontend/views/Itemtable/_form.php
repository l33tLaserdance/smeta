<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Itemtable */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itemtable-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ItemArt')->textInput() ?>

    <?= $form->field($model, 'ItemName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ItemInfo')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'ItemCost')->textInput() ?>

    <?= $form->field($model, 'ItemMeasurement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TypeID')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
