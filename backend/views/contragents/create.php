<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Contragents */

$this->title = 'Добавить контрагента';
$this->params['breadcrumbs'][] = ['label' => 'Contragents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contragents-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
