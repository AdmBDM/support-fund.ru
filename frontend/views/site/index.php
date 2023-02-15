<?php

	/* @var $this yii\web\View */
	/* @var $model ContactForm */

	use frontend\models\ContactForm;
	use yii\helpers\Html;

	//$this->title = 'Фонд УЦК «Фонд поддержки»';

	Yii::$app->name = '«Фонд поддержки»';
	$this->title = Yii::$app->name;
?>

<div class="site-index" id="section-main">
	<div id="main-slider" class="owl-carousel owl-theme">
		<div class="item">
			<div class="item-text-half_left">
				<div class="slide-1">
					<h2>Приветствуем Вас на сайте</h2>
					<h2>«Фонд поддержки»</h2>
					<h3>в разделе меню "Раскрытие информации" Вы можете найти раскрываемую информацию</h3>
				</div>
			</div>
			<?= Html::img('/images/slider1.jpg', ['alt' => '']) ?>
		</div>

		<div class="item">
			<div class="item-text-centered">
				<div class="slide-2">
					<h3>Специализированный фонд управления целевым капиталом</h3>
					<h1>«ФОНД ПОДДЕРЖКИ»</h1>
					<a href="#" target="_self">Обратная связь</a>
				</div>
			</div>
			<?= Html::img('/images/slider2.jpg', ['alt' => '']) ?>
		</div>
	</div>
</div>

<?= $this->render('_about')?>

<?= $this->render('_info')?>

<?= $this->render('_open_data')?>

<?= $this->render('_news')?>

<?= $this->render('_contact', [
		'model' => $model,
])?>
