<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

	<?php $form = ActiveForm::begin([
		'action' => ['index'],
		'method' => 'get',
		'options' => [
			'data-pjax' => 1
		],
	]); ?>

	<?= $form->field($model, 'id') ?>

	<?= $form->field($model, 'news_date') ?>

	<?= $form->field($model, 'news_text') ?>

	<?= $form->field($model, 'published')->checkbox() ?>

	<?= $form->field($model, 'pub_date_start') ?>

	<?php // echo $form->field($model, 'pub_date_end') ?>

	<div class="form-group">
		<?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
		<?= Html::resetButton('Сброс', ['class' => 'btn btn-outline-secondary']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
