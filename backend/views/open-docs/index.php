<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $currentGroup */

$this->title = 'Раскрытие информации';
$this->params['breadcrumbs'][] = $this->title;
Yii::$app->params[] = ['curGr' => '$currentGroup'];


?>

<div class="open-docs-index">
	<p>
		<?= Html::a('Создать документ', ['create'], ['class' => 'btn btn-success']) ?>
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
//			'docs_group_id',
//			[
//				'label' => 'CurGr',
//				'attribute' => 'curGr',
//				'value' => $currentGroup,
//			],
			'original_file_name',
			'system_file_name',
			'pub_date_start',
			//'pub_date_end',
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
