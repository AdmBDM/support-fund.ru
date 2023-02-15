<?php

	use common\models\DocsGroup;

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
	['label' => 'Пользователи', 'icon' => 'users', 'url' => '/admin/user',],
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

	$itemsWork = [['label' => 'Группы информации', 'icon' => 'sitemap', 'url' => ['/docs-group']]];
	foreach (DocsGroup::find()->orderBy('id')->all() as $group) {
		$itemsWork[] = [
				'label' => $group['short_name_group'],
				'icon' => 'file',
				'url' => ['/open-docs/index?gr=' . $group['id']],
		];
	}

$itemsDocs = [
	[
		'label' => 'Раскрытие',
		'icon' => 'comment',
		'url' => '#',
		'items' => $itemsWork
	],
];

	$itemsWork = [
			['label' => 'Новости', 'icon' => 'inbox', 'url' => '/admin/news',],
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
