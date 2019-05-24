<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use kartik\grid\GridView;
use yii\helpers\Url;
use kartik\export\ExportMenu;
use kartik\editable\Editable;
use yii\helpers\Json;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ItemtableSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itemtable-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	<p>
		<?= Html::button('Добавить строку', ['class' => 'btn btn-default', 'id' => 'addrow']) ?>
	</p>

	<?php
		$gridColumns = [
			'ItemID',
            'ItemArt',
            'ItemName',
            'ItemInfo:ntext',
            'ItemCost',
            'ItemMeasurement',
            'TypeID'
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
		'id' => 'tab1',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			/*[
				'class'=>'kartik\grid\EditableColumn',
				'header'=>'Itemtable',
				'attribute'=>'ItemName',
			],*/
            'ItemID',
            'ItemArt',
            'ItemName',
            'ItemInfo:ntext',
            'ItemCost',
            'ItemMeasurement',
            'TypeID',

            ['class' => 'yii\grid\ActionColumn'],
        ],
		'containerOptions' => ['style' => 'overflow: auto'],
		'headerRowOptions' => ['class' => 'kartik-sheet-style'],
		'filterRowOptions' => ['class' => 'kartik-sheet-style'],
		'toolbar' => [
			[
				'content' =>
					Html::button('<i class="fas fa-plus"></i>', [
						'class' => 'btn btn-success',
						'title' => /*Yii::t('tab1', */'Добавить строку'/*)*/,
						/*'onclick' => 
							'var button = document.getElementById('addrow');
							button.addEventListener("click", function(){
							var d = document;
							var tbody = d.getElementsByTagName('tbody')[0];
							//alert(tbody.innerHTML);
							var row = d.createElement("tr");
							tbody.appendChild(row);
							var td1 = d.createElement("td");
							var td2 = d.createElement("td");
							var td3 = d.createElement("td");
							var td4 = d.createElement("td");
							var td5 = d.createElement("td");
							var td6 = d.createElement("td");
							var td7 = d.createElement("td");
							var td8 = d.createElement("td");
							var td9 = d.createElement("td");
							row.appendChild(td1);
							row.appendChild(td2);
							row.appendChild(td3);
							row.appendChild(td4);
							row.appendChild(td5);
							row.appendChild(td6);
							row.appendChild(td7);
							row.appendChild(td8);
							row.appendChild(td9);'*/
					]).' '.
					Html::a('<i class="fas fa-redo"></i>', ['grid-demo'], [
						'class' => 'btn btn-outline-secondary',
						'title'=>/*Yii::t('tab1', */'Очистить смету'/*)*/,
						'data-pjax' => 0,
					]),
				'options' => ['class' => 'btn-group mr-2']
			],
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
			//'heading' => $heading,
		],
		'persistResize' => false,
    ]); ?>
	<?php
	$check = frontend\models\Itemtable::find()
		->select(['ItemName', 'ItemInfo', 'ItemCost'])
		->from('itemtable')
		->where(['ItemName' => 'TR-D2111IR3'])
		->asArray()
		->all();
	var_dump($check);
?>
</div>
<?php
$script = <<< JS
  
	var button = document.getElementById('addrow');
	button.addEventListener("click", function(){
	var d = document;
	var tbody = d.getElementsByTagName('tbody')[0];
	//alert(tbody.innerHTML);
	var row = d.createElement("tr");
    tbody.appendChild(row);
	var td1 = d.createElement("td");
    var td2 = d.createElement("td");
	var td3 = d.createElement("td");
	var td4 = d.createElement("td");
	var td5 = d.createElement("td");
	var td6 = d.createElement("td");
	var td7 = d.createElement("td");
	var td8 = d.createElement("td");
	var td9 = d.createElement("td");
    row.appendChild(td1);
    row.appendChild(td2);
	row.appendChild(td3);
	row.appendChild(td4);
	row.appendChild(td5);
	row.appendChild(td6);
	row.appendChild(td7);
	row.appendChild(td8);
	row.appendChild(td9);
	var tables = document.querySelectorAll('td');
	for (var i = 0; i < tables.length; i++) {
	tables[i].addEventListener('click', function typein() {
		var input = document.createElement('input');
		input.value = this.innerHTML;
		this.innerHTML = '';
		this.appendChild(input);
			
		var table = this;
		input.addEventListener('blur', function() {
			table.innerHTML = this.value;
			table.addEventListener('click', typein);
		});
		
		this.removeEventListener('click', typein);
	});
 }
  });
JS;
$this->registerJs($script);
?>
<?php
	/*$script = <<< JS
	$(document).ready(function(e) {
       var $table = $('#tab1'); //gridViewId = your grid view 'id'

       var $rows = $table.find('tr');
       var rowNum = $rows.size(); 
       var columnsNum = $($rows[0]).find('td').size(); 

       for(var i = 0; i < rowNum; i++) {
           var $row = $($rows[i]);

           //add a row after
           $($row).after('<tr><td colspan='+ columnsNum +'>Lore Ipsum</td></tr>');
       }       
    });
JS;
$this->registerJs($script);*/
?>