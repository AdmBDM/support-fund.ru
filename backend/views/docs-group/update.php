<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocsGroup */

$this->title = 'Update Docs Group: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Docs Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="docs-group-update">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
