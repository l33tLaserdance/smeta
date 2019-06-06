<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Smeta */

$this->title = $model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Smetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="smeta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->ItemID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->ItemID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этот товар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ItemID',
            'ItemName',
            'ItemMeasurement',
            'Amount',
            'ItemCost',
            'ItemSumm',
            'ServiceName',
            'ServiceCost',
            'ServiceSumm',
        ],
    ]) ?>

</div>
