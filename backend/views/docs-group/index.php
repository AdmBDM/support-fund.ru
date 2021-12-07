<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Docs Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docs-group-index">
	<p>
		<?= Html::a('Создать группу', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php Pjax::begin(); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'columns' => [
			[
				'class' => ActionColumn::class,
// Определяем набор кнопок. По умолчанию {view} {update} {delete}
				'template' => '{view} {update}' . (Yii::$app->user->identity->id > 2 ?: ' {delete}'),
				'header'=>'Действия',
				'options' => ['width' => '100'],
			],
//			'id',
			'name_group',
			'dir_group',

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
