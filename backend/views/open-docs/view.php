<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\OpenDocs */
/* @var $currentGroup */

$this->title = 'Раскрытие информации';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index?gr=' . $currentGroup]];
$this->params['breadcrumbs'][] = $model->id;
YiiAsset::register($this);
?>

<div class="open-docs-view">
	<p>
		<?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			'id',
			'docs_group_id',
			'original_file_name',
			'system_file_name',
			'pub_date_start',
			'pub_date_end',
		],
	]) ?>

</div>
