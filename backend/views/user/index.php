<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
	<div class="row">
	<h1><?= Html::encode($this->title) ?></h1>
		<div class="col-lg-4">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
			<?= GridView::widget([
				'dataProvider' => $dataProvider,
				'filterModel' => $searchModel,
				'columns' => [
					['class' => 'yii\grid\SerialColumn'],

					'id',
					'username',
					//'auth_key',
					//'password_hash',
					//'password_reset_token',
					//'email:email',
					//'status',
					//'created_at',
					//'updated_at',

					['class' => 'yii\grid\ActionColumn'],
				],
			]); ?>
		</div>
		<div class="col-lg-4">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать роль', ['authitem/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider2,
        'filterModel' => $searchModel2,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'type',
            //'description:ntext',
            //'rule_name',
            //'data',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
		</div>
		<div class="col-lg-4">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Присвоить роль', ['authassignment/create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider3,
        'filterModel' => $searchModel3,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            'user_id',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
		</div>
	</div>
</div>
