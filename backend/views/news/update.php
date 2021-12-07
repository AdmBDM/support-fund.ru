<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = 'Редактирование новостей: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Новость', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'id=' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';

?>
<div class="news-update">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
