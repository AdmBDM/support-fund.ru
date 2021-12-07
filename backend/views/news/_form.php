<?php

use kartik\datetime\DateTimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */


$model->news_date = date('d.m.Y', strtotime($model->news_date));
$model->pub_date_start = date('d.m.Y H:i', strtotime($model->pub_date_start));
$model->pub_date_end = $model->pub_date_end ? date('d.m.Y H:i', strtotime($model->pub_date_end)) : null;

?>

<div class="news-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'news_date')->widget(DateTimePicker::class, [
		'options' => ['placeholder' => 'Дата новости',],
		'pluginOptions' => [
			'todayHighlight' => true,
			'format' => 'dd.mm.yyyy',
			'autoclose' => true,
		]
	]) ?>

	<?= $form->field($model, 'news_anons')->textInput() ?>

	<?= $form->field($model, 'news_text')->textarea(['rows' => 6]) ?>

	<?= $form->field($model, 'published')->checkbox() ?>

<!--	--><?//= $form->field($model, 'pub_date_start')->textInput() ?>
	<?= $form->field($model, 'pub_date_start')->widget(DateTimePicker::class, [
		'options' => ['placeholder' => 'Дата и время начала публикации',],
		'pluginOptions' => [
			'format' => 'dd.mm.yyyy H:i',
			'autoclose' => true,
		]
	]) ?>

<!--	--><?//= $form->field($model, 'pub_date_end')->textInput() ?>
	<?= $form->field($model, 'pub_date_end')->widget(DateTimePicker::class, [
		'options' => ['placeholder' => 'Дата и время окончания публикации',],
		'pluginOptions' => [
			'format' => 'dd.mm.yyyy H:i',
			'autoclose' => true,
		]
	]) ?>

	<div class="form-group">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
