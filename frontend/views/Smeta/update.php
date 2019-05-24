<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Smeta */

$this->title = 'Update Smeta: ' . $model->ItemID;
$this->params['breadcrumbs'][] = ['label' => 'Smetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ItemID, 'url' => ['view', 'id' => $model->ItemID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="smeta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
