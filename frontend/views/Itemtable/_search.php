<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ItemtableSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="itemtable-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ItemID') ?>

    <?= $form->field($model, 'ItemArt') ?>

    <?= $form->field($model, 'ItemName') ?>

    <?= $form->field($model, 'ItemInfo') ?>

    <?= $form->field($model, 'ItemCost') ?>

    <?php // echo $form->field($model, 'ItemMeasurement') ?>

    <?php // echo $form->field($model, 'TypeID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
