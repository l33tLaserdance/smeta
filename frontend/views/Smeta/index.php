<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use frontend\models\Itemtable;
use kartik\export\ExportMenu;
use kartik\typeahead\Typeahead;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use frontend\assets\SmetaAsset;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SmetaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Смета';
$this->params['breadcrumbs'][] = $this->title;
SmetaAsset::register($this);
?>

<div class="smeta-index">
	
	<div class="row">
		<div class="col-lg-4">
			<h1><?= Html::encode($this->title) ?></h1>
			<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		</div>
		<div class="col-lg-8">
		<label class="control-label">Контрагент</label>
		<?php
			//$gg = Yii::$app->getRequest()->getQueryParam('x');
			//echo $gg;
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
		</div>
	<div class="row">
		<?php Pjax::begin(); ?>
		<div class="col-lg-2">
		<label class="control-label">ИНН</label>
			<?=  Typeahead::widget([
				'name' => 'INN',
				'options' => ['placeholder' => 'Введите ИНН'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'remote' => [
							'url' => Url::to(['smeta/i-n-n']) . '?q=%QUERY',
							'wildcard' => '%QUERY'
						]
					]
				]
			]);
			?>
		</div>
		<div class="col-lg-2">
		<label class="control-label">КПП</label>
			<?=  Typeahead::widget([
				'name' => 'KPP',
				'options' => ['placeholder' => 'Введите КПП'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'remote' => [
							'url' => Url::to(['smeta/k-p-p']) . '?q=%QUERY',
							'wildcard' => '%QUERY'
						]
					]
				]
			]);
			?>
		</div>
		<div class="col-lg-2">
		<label class="control-label">ОГРН</label>
			<?=  Typeahead::widget([
				'name' => 'OGRN',
				'options' => ['placeholder' => 'Введите ОГРН'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'remote' => [
							'url' => Url::to(['smeta/o-g-r-n']) . '?q=%QUERY',
							'wildcard' => '%QUERY'
						]
					]
				]
			]);
			?>
		</div>
			<?php Pjax::end(); ?>
	</div>
	
    <p>
        <?= Html::a('Добавить услугу/товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
		<?php
		$gridColumns = [
			'ItemID',
            'ItemName',
            'ItemMeasurement',
            'Amount',
            'ItemCost',
            'ItemSumm',
            'ServiceName',
			'ServiceCost',
			'ServiceSumm'
		];
		echo ExportMenu::widget([
			'dataProvider' => $dataProvider,
			'columns' => $gridColumns,
		]);
		?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'pjax' => true,
		'id' => 'tab2',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'ItemID','format'=>['integer'], 'hAlign'=>'center', 'width'=>'10px'],
            ['attribute'=>'ItemName','format'=>['text'], 'hAlign'=>'center', 'width'=>'200px','footer' => 'ИТОГО: оборудование '],
			['attribute'=>'ItemMeasurement','format'=>['text'], 'hAlign'=>'center', 'width'=>'20px'],
			['attribute'=>'ItemCost','format'=>['text'], 'hAlign'=>'center', 'width'=>'20px'],
            ['attribute'=>'Amount','format'=>['integer'], 'hAlign'=>'center', 'width'=>'20px'],
			['attribute'=>'ItemSumm','format'=>['text'], 'hAlign'=>'center', 'width'=>'20px','footer' => $model::find()->sum('ItemSumm')],
			['attribute'=>'ServiceName','format'=>['text'], 'hAlign'=>'center', 'width'=>'300px','footer' => 'ИТОГО: услуги '],
			['attribute'=>'ServiceCost','format'=>['text'], 'hAlign'=>'center', 'width'=>'20px'],
			['attribute'=>'ServiceSumm','format'=>['text'], 'hAlign'=>'center', 'width'=>'20px','footer' => $model::find()->sum('ServiceSumm')],
			
            ['class' => 'yii\grid\ActionColumn'],
        ],
		'toolbar' => [
			'{export}',
			'{toggleData}',
		],
		'toggleDataContainer' => ['class' => 'btn-group mr-2'],
		'export' => [
			'fontAwesome' => true
		],
			'bordered' => true,
			'hover' => false,
			'panel' => [
				'type' => GridView::TYPE_PRIMARY,
			],
			'persistResize' => false,
			'showFooter' => true,
    ]); ?>
</div>
<input type="checkbox" id="nav-toggle" hidden>
<nav class="nav">
<label for="nav-toggle" class="nav-toggle" onclick></label>
<?php $form = ActiveForm::begin(); ?>
	
 <!--widget(Select2::classname(), [
		'data' => ArrayHelper::map(Itemtable::find()->all(), 'ItemID', 'ItemName'),
		'language' => 'en',
		'options' => ['placeholder' => 'Выберите товар', 'id' => 'ItemName'],
		'pluginOptions' => [
			'allowClear' => true
		],
	]); -->
	<?= $form->field($model, 'ItemName')->widget(Typeahead::classname(), [ 
				'name' => 'ItemName',
				'options' => ['placeholder' => 'Наименование'],
				'scrollable' => true,
				'pluginOptions' => ['highlight'=>true],
				'dataset' => [
					[
						'remote' => [
							'url' => Url::to(['smeta/item-name']) . '?q=%QUERY',
							'wildcard' => '%QUERY'
						]
					]
				]
			]);
	?>
			
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
