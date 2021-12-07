<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\OpenDocs */
/* @var $currentGroup */

$this->title = 'Раскрытие информации';
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['index?gr=' . $currentGroup]];
$this->params['breadcrumbs'][] = ['label' => 'id-' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>

<div class="open-docs-update">
	<?= $this->render('_form', [
		'model' => $model,
		'currentGroup' => $currentGroup,
	]) ?>

</div>
