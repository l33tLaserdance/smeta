<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Itemtable */

$this->title = 'Добавить товар';
$this->params['breadcrumbs'][] = ['label' => 'Добавление товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="itemtable-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
