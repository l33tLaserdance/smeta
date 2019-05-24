<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Itemtable;
use kartik\typeahead\Typeahead;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SmetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Смета';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="smeta-index">
	
	<div class="row">
		<div class="col-lg-4">
			<h1><?= Html::encode($this->title) ?></h1>
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
		<div class="col-lg-4">
			<?php $form = ActiveForm::begin(); ?>
			<?= $form->field($modelCID, 'ContrFullName')->textInput(['maxlength' => true]) ?>
			<?= $form->field($modelCID, 'INN')->textInput() ?>
			<?= $form->field($modelCID, 'KPP')->textInput() ?>
			<?= $form->field($modelCID, 'OGRN')->textInput() ?>
			<?php ActiveForm::end(); ?>
		</div>
		<div class="col-lg-4">
		<label class="control-label">Контрагент</label>
		<?php
			$gg = Yii::$app->getRequest()->getQueryParam('x');
			echo $gg;
		?>
		<?php Pjax::begin(); ?>
			<?=  Typeahead::widget([
				'name' => 'ContrFullName',
				'options' => ['placeholder' => 'Введите контрагента'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'remote' => [
							'url' => Url::to(['smeta/contr-full-name']) . '?q=%QUERY',
							'wildcard' => '%QUERY'
						]
					]
				]
			]);
			?>
		<?php Pjax::end(); ?>
		<label class="control-label">ИНН</label>
			<?=  Typeahead::widget([
				'name' => 'INN',
				'options' => ['placeholder' => 'Введите ИНН'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'prefetch' => Url::to(['smeta/i-n-n']),
						'limit' => 10
					]
				]
			]);
			?>
		<label class="control-label">КПП</label>
			<?=  Typeahead::widget([
				'name' => 'KPP',
				'options' => ['placeholder' => 'Введите КПП'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'prefetch' => Url::to(['smeta/k-p-p']),
						'limit' => 10
					]
				]
			]);
			?>
		<label class="control-label">ОГРН</label>
			<?=  Typeahead::widget([
				'name' => 'OGRN',
				'options' => ['placeholder' => 'Введите ОГРН'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'prefetch' => Url::to(['smeta/o-g-r-n']),
						'limit' => 10
					]
				]
			]);
			?>
		</div>
	</div>
	
    <p>
        <?= Html::a('Добавить услугу/товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	<p><?= $model::find()->sum('ItemSumm') ?> </p> 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ItemID',
            'ItemName',
            'ItemMeasurement',
            'Amount',
			[
				'attribute' => 'ItemCost',
				'footer' => 'ИТОГО: оборудование ',
			],
            [
				'attribute' => 'ItemSumm',
				'footer' => $model::find()->sum('ItemSumm'),
			],
            'ServiceName',
			[
				'attribute' => 'ServiceCost',
				'footer' => 'ИТОГО: услуги ',
			],
            [
				'attribute' => 'ServiceSumm',
				'footer' => $model::find()->sum('ServiceSumm'),
			],
			
            ['class' => 'yii\grid\ActionColumn'],
        ],
		'showFooter' => true,
    ]); ?>
</div>
<input type="checkbox" id="nav-toggle" hidden>
<nav class="nav">
<label for="nav-toggle" class="nav-toggle" onclick></label>
<?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'ItemName')->textInput(['maxlength' => true]) ?> <!--widget(Select2::classname(), [
		'data' => ArrayHelper::map(Itemtable::find()->all(), 'ItemID', 'ItemName'),
		'language' => 'en',
		'options' => ['placeholder' => 'Выберите товар', 'id' => 'ItemName'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); -->
	
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

$("#smeta-itemsumm").blur(function calc() {
	var summ = 0;
	var elem = $('#smeta-amount').val();
	var elem2 = $('#smeta-itemcost').val();
	summ = elem*elem2;
	//alert(summ);
	//console.log(summ);
	$('#smeta-itemsumm').val(summ);
});

$('#smeta-amount').blur(function calc() {
	var summ = 0;
	var elem = $('#smeta-amount').val();
	var elem2 = $('#smeta-itemcost').val();
	summ = elem*elem2;
	//alert(summ);
	//console.log(summ);
	$('#smeta-itemsumm').val(summ);
});

$("#smeta-itemcost").blur(function calc() {
	var summ = 0;
	var elem = $('#smeta-amount').val();
	var elem2 = $('#smeta-itemcost').val();
	summ = elem*elem2;
	//alert(summ);
	//console.log(summ);
	$('#smeta-itemsumm').val(summ);
});

$("#smeta-servicecost").blur(function calc() {
	var summ = 0;
	var elem = $('#smeta-amount').val();
	var elem2 = $('#smeta-servicecost').val();
	summ = elem*elem2;
	//alert(summ);
	//console.log(summ);
	$('#smeta-servicesumm').val(summ);
});

$("#smeta-servicesumm").blur(function calc() {
	var summ = 0;
	var elem = $('#smeta-amount').val();
	var elem2 = $('#smeta-servicecost').val();
	summ = elem*elem2;
	//alert(summ);
	//console.log(summ);
	$('#smeta-servicesumm').val(summ);
});

JS;
$this->registerJs($script);//document.getElementById('smeta-amount');
?>
