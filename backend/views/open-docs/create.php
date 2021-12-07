<?php

//use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OpenDocs */
/* @var $currentGroup */

$this->title = 'Раскрытие информации';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index?gr=' . $currentGroup]];
$this->params['breadcrumbs'][] = 'Создание нового документа';
?>
<div class="open-docs-create">
	<?= $currentGroup; ?>

	<?= $this->render('_form', [
		'model' => $model,
		'currentGroup' => $currentGroup,
	]) ?>

</div>
