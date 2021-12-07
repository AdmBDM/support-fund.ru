<?php

use yii\grid\ActionColumn;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
	<p>
		<?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?php Pjax::begin(); ?>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
//		'filterModel' => $searchModel,
		'columns' => [
			[
				'class' => ActionColumn::class,
// Определяем набор кнопок. По умолчанию {view} {update} {delete}
				'template' => '{view} {update}' . (Yii::$app->user->identity->id > 2 ?: ' {delete}'),
				'header'=>'Действия',
				'options' => ['width' => '100'],
			],
//			'id',
//			[
//				'attribute' => 'id',
//				'options' => ['width' => '70'],
//				'contentOptions'=>['style'=>'text-align: center;'],
//			],
//			'news_date',
			[
				'attribute' => 'news_date',
				'value' => $searchModel->news_date,
				'format' => ['date', 'php:d.m.Y'],
				'options' => ['width' => '100'],
				'contentOptions' => ['style'=>'text-align: center;'],
			],
//			'news_anons',
			[
				'attribute' => 'news_anons',
				'options' => ['width' => '500'],
			],
//			'news_text:ntext',
//			[
//				'attribute' => 'news_text',
//				'options' => ['width' => '250'],
//			],
//			'published:boolean',
			[
				'attribute' => 'published',
				'format' => 'boolean',
				'options' => ['width' => '100'],
				'contentOptions' => ['style'=>'text-align: center;'],
			],
//			'pub_date_start',
			[
				'attribute' => 'pub_date_start',
				'format' => ['date', 'php:d.m.Y H:i'],
				'options' => ['width' => '150'],
				'contentOptions' => ['style'=>'text-align: center;'],
			],
//			'pub_date_end',
			[
				'attribute' => 'pub_date_end',
				'format' => ['date', 'php:d.m.Y H:i'],
				'options' => ['width' => '150'],
				'contentOptions' => ['style'=>'text-align: center;'],
			],

//	        ['class' => 'yii\grid\SerialColumn'],
//			['class' => 'yii\grid\ActionColumn'],
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
