<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contragents */

$this->title = 'Update Contragents: ' . $model->CID;
$this->params['breadcrumbs'][] = ['label' => 'Contragents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CID, 'url' => ['view', 'id' => $model->CID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contragents-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
