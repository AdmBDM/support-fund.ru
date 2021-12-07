<?php

/* @var $this yii\web\View */

//use yii\helpers\Html;

	use common\models\OpenDocs;

	$itemsDocs = OpenDocs::find()->all();

?>

<div class="site-open_data" id="section-open_data">
	<div class="content">
		<div class="site-open_data-logo">
			<div class="site-open_data-logo-img col-sm-8">
				<img src="/images/53.jpg" alt="">
			</div>
<!--			<div class="site-open_data-logo-block">Раскрытие информации</div>-->
		</div>

		<div id="div_block-3-10" class="ct-div-block container" hidden>
			<div id="div_block-4-10" class="ct-div-block row">
				<div id="div_block-5-10" class="ct-div-block col-lg-12">
					<div id="div_block-6-10" class="ct-div-block project-details-item">
						<div id="div_block-7-10" class="ct-div-block project-details-left"><img id="image-8-10" alt=""
																								src="/images/53.jpg"
																								class="ct-image"></div>
						<div id="div_block-9-10" class="ct-div-block project-details-right">
							<div id="div_block-11-10" class="ct-div-block project-right-text"><h2 id="headline-12-10"
																								  class="ct-headline">
									Раскрытие информации ООО «УК «Проект»</h2></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php if ($itemsDocs) {?>

		<table class="table-data">
			<caption>Документы управляющей компании</caption>
			<thead>
			<tr>
				<th class="table-col1">Наименование</th>
				<th class="table-col2">Дата публикации</th>
				<th class="table-col3">Срок доступа</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><a href="/images/reglament_01102021.pdf">Регламент признания лиц квалифицированными инвесторами Общества с ограниченной ответственностью «Управляющая компания «Проект»</a></td>
				<td>30.09.2021 17:15</td>
				<td>Бессрочно</td>
			</tr>
			<tr>
				<td><a href="/images/kriterii_otneseniya_klientov_k_inostrannym_nalogoplatelshhikam.pdf">Критерии отнесения клиентов в ООО «УК «Проект» к категории клиентов-иностранных налогоплательщиков и способы получения от них необходимой информации</a></td>
				<td>06.08.2021 18:25</td>
				<td>Бессрочно</td>
			</tr>
			<tr>
				<td><a href="/images/reglament-po-kval.-investoram.pdf">Регламент признания лиц квалифицированными инвесторами Общества с ограниченной ответственностью «Управляющая компания «Проект» (архив)</a></td>
				<td>06.08.2021 18:24</td>
				<td>Бессрочно</td>
			</tr>
			</tbody>
		</table>

		<table class="table-data">
			<caption>Расчёт размера собственных средств</caption>
			<thead>
			<tr>
				<th class="table-col1">Наименование</th>
				<th class="table-col2">Дата публикации</th>
				<th class="table-col3">Срок доступа</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><a href="/images/rss-uk-proekt-30092021.pdf">Расчет размера собственных средств ООО «УК «Проект» на 30 сентября 2021 года</a></td>
				<td>08.10.2021 10:09</td>
				<td>08.11.2024</td>
			</tr>
			<tr>
				<td><a href="/images/rss-uk-proekt-31082021.pdf">Расчет размера собственных средств ООО «УК «Проект» на 31 августа 2021 года</a></td>
				<td>09.09.2021 16:35</td>
				<td>09.10.2024</td>
			</tr>
			<tr>
				<td><a href="/images/rss-uk-proekt-31.07.2021.pdf">Расчет размера собственных средств ООО «УК «Проект» на 31 июля 2021 года</a></td>
				<td>06.08.2021 17:52</td>
				<td>06.09.2024</td>
			</tr>
			</tbody>
		</table>

		<table class="table-data">
			<caption>Финансовая отчетность и аудиторские заключения</caption>
			<thead>
			<tr>
				<th class="table-col1">Наименование</th>
				<th class="table-col2">Дата публикации</th>
				<th class="table-col3">Срок доступа</th>
			</tr>
			</thead>
			<tbody>
			<tr>
				<td><a href="/images/buh-30092021.pdf">Промежуточная бухгалтерская (финансовая) отчетность за 9 месяцев 2021 года</a></td>
				<td>27.10.2021 15:04</td>
				<td>Бессрочно</td>
			</tr>
			</tbody>
		</table>
		<?php } else {?>
			<div class="info-empty">
				<h3>Информация готовится к публикации</h3>
			</div>
		<?php }?>
	</div>
</div>
