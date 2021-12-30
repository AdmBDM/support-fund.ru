$(document).ready(function() {
	let $url = '#';
	let $sc_main = $('#section-main');
	let $sc_about = $('#section-about');
	let $sc_info = $('#section-info');
	let $sc_license = $('#section-license');
	let $sc_open_data = $('#section-open_data');
	let $sc_news = $('#section-news');
	let $sc_contact = $('#section-contact');
	//Начальное включение блоков
	$sc_main.show();
	$sc_about.show();
	$sc_info.show();
	$sc_license.show();
	$sc_open_data.hide();
	$sc_news.hide();
	$sc_contact.hide();

	//организация "карусели" на главной странице
	// Owl Carousel
	let main_slider = $("#main-slider");
	main_slider.owlCarousel({
		// items: 3,
		items: 1,
		// margin: 10,
		margin: 3,
		loop: true,
		nav: false,
		dots: true,
		autoplay: true,
		autoplayTimeout: 7000,
		smartSpeed: 500,
	});

	$("[href*='/#btn-menu']").each(function () {
		let $id = $(this).attr('href').split('#'),
			$newEl = $("<div class='" + $(this).attr('class') +
					"' id='" + $id[1] + "'>" +
					$(this).html() + "</div>");
		$(this).replaceWith($newEl);
	});

	//включение-выключение блоков согласно нажатой кнопке меню
	$("[id*='btn-menu-']").click(function() {
		$sc_main.hide();
		$sc_about.hide();
		$sc_info.hide();
		$sc_license.hide();
		$sc_open_data.hide();
		$sc_news.hide();
		$sc_contact.hide();
		$url = '#';

		if ($(this).attr('id') === 'btn-menu-main' || $(this).attr('id') === 'btn-menu-f-main') {
			$sc_main.show();
			$sc_about.show();
			$sc_info.show();
			$sc_license.show();
			// window.location.href = '/#section-about';
			$url = '/#section-about';
		}

		// if ($(this).attr('id') === 'btn-menu-main' || $(this).attr('id') === 'btn-menu-f-main') {
		// 	$sc_main.show();
		// 	$sc_about.show();
		// 	$sc_info.show();
		// 	$sc_license.show();
		// }

		if ($(this).attr('id') === 'btn-menu-open_data' || $(this).attr('id') === 'btn-menu-f-open_data') {
			$sc_open_data.show();
			// window.location.href = $url;
		}

		if ($(this).attr('id') === 'btn-menu-news' || $(this).attr('id') === 'btn-menu-f-news') {
			$sc_news.show();
			// window.location.href = '#';
		}

		if ($(this).attr('id') === 'btn-menu-contact' || $(this).attr('id') === 'btn-menu-f-contact') {
			$sc_contact.show();
			// window.location.href = '#';
		}

		if ($(this).attr('id') === 'btn-menu-feedback' || $(this).attr('id') === 'btn-menu-f-feedback') {
			$sc_contact.show();
			$url = '/#section-feedback';
		}

		window.location.href = $url;
	});

	//фиксация верхнего меню при прокрутке
	$(window).scroll(function () {
		if($(this).scrollTop() > 170){
			// $('.header-nav').addClass('fixed');
			$('#ukp-nav').addClass('fixed');
		}
		else if ($(this).scrollTop() < 170){
			// $('.header-nav').removeClass('fixed');
			$('#ukp-nav').removeClass('fixed');
		}
	});
});

$('#btn-generate-pswd').click(function () {
	$.ajax({
		"type": 'post',
		"url": '../generate-pswd',
		"data": {
			'pswd': $('#pswd').val(),
		},
		"success": function (res) {
			if (res.alert) $('#pswd_hash').val(res.pswd); else alert('Пароль не может быть пустым!');
		},
		"error": function (request, status, error) {
			alert('Ошибка вышла!');
		},
	})
});
