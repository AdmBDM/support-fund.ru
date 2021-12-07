<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DocsGroup */

$this->title = 'Create Docs Group';
$this->params['breadcrumbs'][] = ['label' => 'Docs Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="docs-group-create">
	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
