<?php

/* @var $this yii\web\View */

$this->title = 'Администрирование VDTECH Accountment';
?>
<div class="site-index">

    <div class="row">
			<div class="col-lg-4 logo">
			</div>
			
			<div class="col-lg-8 info">
				<h1>VDTECH Accountment</h1>

				<p class="lead">Вы успешно авторизованы в системе, <?=Yii::$app->user->identity->username?></p>
				<p class="lead">Режим работы: администраторский.</p>
			</div>
    </div>

    <div class="body-content">

        <div class="row">
		
			<div class="col-lg-6">
                <h2>Пользователи</h2>

                <p>Создание новых пользователей, а так же редактирование пользовательских данных</p>

                <p><a class="btn btn-default" href="backend/web/user/index">Перейти &raquo;</a></p>
				
				<p>Создание новых ролей или правил</p>
				
				<p><a class="btn btn-default" href="backend/web/authitem/index">Перейти &raquo;</a></p>
				
				<p>Назначение типов пользователей</p>
				
				<p><a class="btn btn-default" href="backend/web/authassignment/index">Перейти&raquo;</a></p>
            </div>
			<div class="col-lg-6">
                <h2>Работа с контрагентами</h2>

                <p>Добавление, редактирование или удаление новых контрагентов системы</p>

                <p><a class="btn btn-default" href="backend/web/contragents/index">Перейти &raquo;</a></p>
            </div>

        </div>
    </div>

</div>

