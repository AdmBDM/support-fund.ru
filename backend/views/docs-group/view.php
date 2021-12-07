<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DocsGroup */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Docs Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>

<div class="docs-group-view">
	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--		--><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//			'class' => 'btn btn-danger',
//			'data' => [
//				'confirm' => 'Are you sure you want to delete this item?',
//				'method' => 'post',
//			],
//		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'name_group',
			'dir_group',
		],
	]) ?>

</div>
