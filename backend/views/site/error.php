<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        При формировании вашего запроса к web-серверу произошла ошибка.
    </p>
    <p>
        Пожалуйста, напишите нам если вы считаете, что это проблема сервера. Благодарим за внимание.
    </p>

</div>
