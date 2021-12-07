<?php

/* @var $this View */
/* @var $content string */

//use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\web\View;
?>

<header class="header-wrapper">
	<div class="up-row content">
		<div class="up-row-columns">
			<div class="up-row-col up-block-email" id="head-block-email">
				<div class="email-img">
					<figure>
						<img src="/images/message.png" alt="">
					</figure>
				</div>
				<div class="email-txt">
					<a href="mailto:main@support-fund.ru">
						<div class="info-text-block">
							<span>main@support-fund.ru</span>
						</div>
						<div class="info-text-block">
							<span style="font-size: .9em">эл. почта</span>
						</div>
					</a>
				</div>
			</div>
			<div class="up-row-col up-block-logo">
				<a href="/index.php"><img src="/images/logo.png" alt="" class="logo"></a>
			</div>
			<div class="up-row-col up-block-btn" id="head-block-btn">
				<a class="btn-main" href="/#btn-menu-feedback">Обратная связь</a>
			</div>
		</div>
	</div>

	<?php
	NavBar::begin([
		'id' => 'ukp-nav',
		'brandLabel' => '&nbsp;',
		'brandUrl' => Yii::$app->homeUrl,
		'options' => [
			'class' => 'navbar navbar-expand-md navbar-light bg-light',
		],
	]);
	$menuItems = [
		['label' => 'О компании', 'url' => ['/#btn-menu-main']],
		['label' => 'Раскрытие информации', 'url' => ['/#btn-menu-open_data']],
		['label' => 'Новости', 'url' => ['/#btn-menu-news']],
		['label' => 'Контакты', 'url' => ['/#btn-menu-contact']],
	];
	echo Nav::widget([
		'options' => ['class' => 'navbar-nav'],
		'items' => $menuItems,
	]);
	NavBar::end();
	?>
</header>
