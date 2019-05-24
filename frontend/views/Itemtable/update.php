<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Itemtable */

$this->title = 'Update Itemtable: ' . $model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Itemtables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ItemID, 'url' => ['view', 'id' => $model->ItemID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="itemtable-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
