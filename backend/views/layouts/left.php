<?php
$itemHead = [
	['label' => 'Меню (IDus-' . Yii::$app->user->identity->id . ')', 'options' => ['class' => 'header']],
];

$itemsAdmin = [
	[
		'label' => 'Инструменты',
		'icon' => 'cogs',
		'url' => '#',
		'items' => [
			['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
			['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
		],
	],
];

$itemsExample = [
	[
		'label' => 'Пример меню',
		'icon' => 'share',
		'url' => '#',
		'items' => [
			[
				'label' => 'Level One',
				'icon' => 'circle-o',
				'url' => '#',
				'items' => [
					['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
					[
						'label' => 'Level Two',
						'icon' => 'circle-o',
						'url' => '#',
						'items' => [
							['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
							['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
						],
					],
				],
			],
		],
	],
];

$itemsWork = [
	['label' => 'Новости', 'icon' => 'newspaper', 'url' => '/admin/news',],
];

$itemsDocs = [
	[
		'label' => 'Раскрытие',
		'icon' => 'fa-route',
		'url' => '#',
		'items' => [
			['label' => 'Группы информации', 'icon' => 'sitemap', 'url' => ['/gii']],
			['label' => 'Документы УК', 'icon' => 'file', 'url' => ['/gii']],
			['label' => 'Собственные ср-ва', 'icon' => 'list-ul', 'url' => ['/gii']],
			['label' => 'Финансы / Аудит', 'icon' => 'book', 'url' => ['/gii']],
		],
	],
];
?>

<aside class="main-sidebar">

	<section class="sidebar">
		<?= dmstr\widgets\Menu::widget(
			[
				'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
				'items' => array_merge(
					  $itemHead
					, Yii::$app->user->identity->id <= 2 ? $itemsAdmin : []
//					, $itemsExample
					, $itemsWork
					, $itemsDocs
				),
			]
		) ?>
	</section>
</aside>
