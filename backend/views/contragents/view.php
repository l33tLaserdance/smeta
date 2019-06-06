<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Contragents */

$this->title = $model->CID;
$this->params['breadcrumbs'][] = ['label' => 'Контрагенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="contragents-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->CID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->CID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить этого контрагента?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CID',
            'ContrName',
            'ContrFullName',
            'INN',
            'KPP',
            'OGRN',
        ],
    ]) ?>

</div>
