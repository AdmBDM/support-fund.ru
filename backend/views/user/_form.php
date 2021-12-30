<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username') ?>

	<?= $form->field($model, 'auth_key') ?>

	<?php if (Yii::$app->user->identity->id < 3) {
		echo $form->field($model, 'pswd')->input('text', ['id' => 'pswd']);

		echo $form->field($model, 'pswd_hash')->input('text', ['readonly' => true, 'id' => 'pswd_hash']);

		echo '<button type="button" id="btn-generate-pswd" class="btn btn-info">Генерировать пароль</button>';
	} ?>

	<?= $form->field($model, 'email') ?>

	<?= $form->field($model, 'phone_number')->widget(MaskedInput::class, ['mask' => '(999)-999-99-99']) ?>

	<?= $form->field($model, 'admin')->checkbox(['disabled ' => !Yii::$app->user->identity->admin,]) ?>

	<?= $form->field($model, 'oper')->checkbox(['disabled ' => !(Yii::$app->user->identity->admin || (bool)Yii::$app->user->identity->oper),]) ?>

	<div class="form-group">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	</div>

	<?php ActiveForm::end(); ?>
</div>
