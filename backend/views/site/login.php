<?php

	use common\models\LoginForm;
	use yii\helpers\Html;
	use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model LoginForm */

dmstr\web\AdminLteAsset::register($this);

$this->title = 'Вход';

$fieldOptionsMail = [
		'options' => ['class' => 'form-group has-feedback'],
		'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

	$fieldOptionsName = [
		'options' => ['class' => 'form-group has-feedback'],
		'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

	$fieldOptionsMobile = [
			'options' => ['class' => 'form-group has-feedback'],
			'inputTemplate' => "{input}<span class='glyphicon glyphicon-phone form-control-feedback'></span>"
	];

	$fieldOptionsPassword = [
	'options' => ['class' => 'form-group has-feedback'],
	'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<!--<div class="container">-->
	<div class="login-box">
		<div class="login-box-body">
			<p class="login-box-msg">Для работы в данном блоке необходимо авторизоваться</p>

			<?php
				$form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

			<?= $form
					->field($model, 'username', $fieldOptionsName)
					->label(false)
					->textInput(['autofocus' => true, 'placeholder' => $model->getAttributeLabel('username')]) ?>

			<?= $form
					->field($model, 'password', $fieldOptionsPassword)
					->label(false)
					->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

			<div class="row">
				<div class="col-xs-8">
					<?= $form->field($model, 'rememberMe')->checkbox() ?>
<!--				--><?php //echo Html::a('Восстановить пароль', ['site/request-password-reset']) ?><!--.-->
				</div>

				<div class="col-xs-4" style="padding-left: 30px">
					<?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
				</div>

			</div>

			<?php ActiveForm::end(); ?>
			<a href="/">На главную</a>
		</div>
	</div>
