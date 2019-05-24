<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Itemtable;

/* @var $this yii\web\View */
/* @var $model frontend\models\Smeta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="smeta-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'ItemName')->widget(Select2::classname(), [
		'data' => ArrayHelper::map(Itemtable::find()->all(), 'ItemID', 'ItemName'),
		'language' => 'en',
		'options' => ['placeholder' => 'Выберите товар', 'id' => 'ItemName'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); ?>
	
    <?= $form->field($model, 'ItemMeasurement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Amount')->textInput() ?>

    <?= $form->field($model, 'ItemCost')->textInput() ?>

    <?= $form->field($model, 'ItemSumm')->textInput() ?>

    <?= $form->field($model, 'ServiceName')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ServiceCost')->textInput() ?>

    <?= $form->field($model, 'ServiceSumm')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$script = <<< JS

$('#ItemName').change(function(){
	var ItemID = $(this).val();
	$.get('frontend/web/itemtable/get-info', { ItemID : ItemID }, function(data){
		var data = $.parseJSON(data);
		alert(data);
		$('#smeta-itemmeasurement').attr('value', data.ItemMeasurement);
		$('#smeta-itemcost').attr('value', data.ItemCost);
	});
});

JS;
$this->registerJs($script);
?>
