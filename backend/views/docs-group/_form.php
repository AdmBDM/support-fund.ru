<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DocsGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="docs-group-form">

	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'name_group')->textInput() ?>

	<?= $form->field($model, 'dir_group')->textInput() ?>

	<div class="form-group">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>

</div>
