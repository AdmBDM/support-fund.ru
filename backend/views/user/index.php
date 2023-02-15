<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">
	<p><?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?></p>

	<?php Pjax::begin(); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			[
				'class' => ActionColumn::class,
// Определяем набор кнопок. По умолчанию {view} {update} {delete}
//				'template' => '{view} {update}' . (Yii::$app->user->identity->id > 2 ?: ' {delete}'),
				'template' => '{view}' .
							((Yii::$app->user->identity->admin || Yii::$app->user->identity->oper) ? ' {update}' : '') .
							(Yii::$app->user->identity->admin ? ' {delete}' : ''),
				'header'=>'Действия',
				'options' => ['width' => '100'],
			],
//			'id',
//			'username',
			[
				'attribute' => 'username',
				'options' => ['width' => '200'],
			],
//			'auth_key',
//			'password_hash',
//			'password_reset_token',
			//'email:email',
			[
				'attribute' => 'email',
				'options' => ['width' => '200'],
			],
			//'status',
			//'created_at',
			[
				'attribute' => 'created_at',
				'format' => ['date', 'php:d.m.Y H:i'],
				'options' => ['width' => '200'],
//				'contentOptions' => ['style'=>'text-align: center;'],
			],
			//'updated_at',
			//'verification_token',
			//'phone_number',
			[
				'attribute' => 'phone_number',
				'options' => ['width' => '150'],
			],
			//'admin:boolean',
			//'oper:boolean',
			//'when_ed',
// пустая колонка для выравнивания
			[
				'label' => '',
				'format' => 'text',
				'contentOptions' => ['style'=>'white-space: normal;'],
				'value' => function() {return '';},
			],
		],
	]); ?>
	<?php Pjax::end(); ?>
</div>
