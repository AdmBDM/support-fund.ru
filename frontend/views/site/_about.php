<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

?>

<div class="site-about" id="section-about">
	<div class="about-block">
		<div class="about-block-item">
			<div class="about-img">
				<?= Html::img('/images/about.jpg', ['alt' => '']) ?>
			</div>
		</div>
		<div class="about-block-item">
			<div class="about-text-items">
				<div class="about-text-header">Специализированный фонд<br>управления целевым капиталом<br>«Фонд поддержки»</div>

				<div class="about-text-item" hidden>
					<div class="info-item">
						<div class="service-img">
							<div class="service-img-round">
								<?= Html::img('/images/rocket.png', ['alt' => '']) ?>
							</div>
						</div>
						<div class="service-txt">
							<div class="service-header">Управление финансами</div>
							<div class="service-text">Приумножайте ваши доходы с помощью наших инструментов</div>
						</div>
					</div>
				</div>

				<div class="about-text-item" hidden>
					<div class="info-item">
						<div class="service-img">
							<div class="service-img-round">
								<?= Html::img('/images/team.png', ['alt' => '']) ?>
							</div>
						</div>
						<div class="service-txt">
							<div class="service-header">Торговая платформа</div>
							<div class="service-text">Надёжное управление вашими активами, широкий выбор инвестиционных возможностей</div>
						</div>
					</div>
				</div>

				<div class="about-text-item" hidden>
					<div class="info-item">
						<div class="service-img">
							<div class="service-img-round">
								<?= Html::img('/images/doc.png', ['alt' => '']) ?>
							</div>
						</div>
						<div class="service-txt">
							<div class="service-header">Консалтинг</div>
							<div class="service-text">Мы предлагаем инвестиционные решения под разные цели, сроки и суммы, не требующие от вас опыта или времени на управление деньгами</div>
						</div>
					</div>
				</div>

				<div class="about-text-item" hidden>
					<div class="info-item">
						<div class="service-img">
							<div class="service-img-round">
								<?= Html::img('/images/cash.png', ['alt' => '']) ?>
							</div>
						</div>
						<div class="service-txt">
							<div class="service-header">Надёжность</div>
							<div class="service-text">Деятельность управляющей компании контролируется специализированным депозитарием и ЦБ РФ</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
