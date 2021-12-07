<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Новости', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="news-view">
	<p>
		<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--		--><?//= Html::a('Удалить', ['delete', 'id' => $model->id], [
//			'class' => 'btn btn-danger',
//			'data' => [
//				'confirm' => 'Вы действительно хотите удалить запись?',
//				'method' => 'post',
//			],
//		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
//			'id',
//			'news_date',
			[
				'attribute' => 'news_date',
				'value' => $model->news_date,
				'format' => ['date', 'php:d.m.Y'],
			],
			'news_anons',
			'news_text:ntext',
			'published:boolean',
//			'pub_date_start',
			[
				'attribute' => 'pub_date_start',
				'value' => $model->pub_date_start,
				'format' => ['date', 'php:d.m.Y H:i'],
			],
//			'pub_date_end',
			[
				'attribute' => 'pub_date_end',
				'value' => $model->pub_date_end,
				'format' => ['date', 'php:d.m.Y H:i'],
			],
		],
	]) ?>

</div>
