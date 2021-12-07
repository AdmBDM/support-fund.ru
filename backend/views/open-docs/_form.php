<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\OpenDocs */
/* @var $form yii\widgets\ActiveForm */
/* @var $currentGroup */
?>

<div class="open-docs-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'docs_group_id')->textInput() ?>

	<?= $form->field($model, 'original_file_name')->textInput() ?>

	<?= $form->field($model, 'system_file_name')->textInput() ?>

	<?= $form->field($model, 'pub_date_start')->textInput() ?>

	<?= $form->field($model, 'pub_date_end')->textInput() ?>

	<div class="form-group">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
