<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Smeta */

$this->title = 'Добавление товара';
$this->params['breadcrumbs'][] = ['label' => 'Smetas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="smeta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
