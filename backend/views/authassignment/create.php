<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\authassignment */

$this->title = 'Присвоение роли';
$this->params['breadcrumbs'][] = ['label' => 'Присвоение роли', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="authassignment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
