<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ContragentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contragents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contragents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Contragents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CID',
            'ContrName',
            'ContrFullName',
            'INN',
            'KPP',
            //'OGRN',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
