<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?php
    use Bitrix\Main\Page\Asset;

    $contacts = Return_All(
		Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PHONE_HEADER", "PROPERTY_WATSAPP_HEADER")
	);

	// if($_SERVER['REMOTE_ADDR'] == '37.193.78.35')
	// {
	// 	debug($contacts);
	// }
?>

<!DOCTYPE html> 
<html>
<head>
	<?php $APPLICATION->ShowHead() ?>
	<title><?php $APPLICATION->ShowTitle() ?></title>
	<?php
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/css/styles.css');
        Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/jquery-3.6.0.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/maskedinput.js');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/js/functions.js');

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/fancybox/jquery.fancybox.min.css');
        Asset::getInstance()->addJs(SITE_TEMPLATE_PATH.'/libraries/fancybox/jquery.fancybox.min.js');
    ?>
</head>
<body>
	<div id="panel"><?php $APPLICATION->ShowPanel(); ?></div>
	<header>
		<div class="wrap">
			<div class="wats-menu-butt-mobile" style="display: none">
				<a href="https://api.whatsapp.com/send/?phone=<?=  $contacts[0]['PROPERTY_WATSAPP_HEADER_VALUE']; ?>&amp;text&amp;app_absent=0" target="_blank">
					<img class="wats-app" src="<?=SITE_TEMPLATE_PATH?>/img/wats-app.svg">
				</a>
				
				<div id="open-mobile-menu-button">
					<div>
						<div class="button-line"></div>
						<div class="button-line"></div>
						<div class="button-line"></div>
					</div>
				</div>
			</div>

			<div class="menu-line">
				<a class="head-logo" href="/">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Слой_1" x="0px" y="0px" viewBox="0 0 405.4 60" style="enable-background:new 0 0 405.4 60;" xml:space="preserve"> <style type="text/css"> .st0{fill:#1D4687;} </style> 
						<g> 
							<path class="st0" d="M2.6,2.08h32.3c5.38,0,9.52,1.33,12.4,4c2.88,2.67,4.32,5.97,4.32,9.9c0,3.3-1.03,6.13-3.08,8.49 c-1.37,1.57-3.38,2.82-6.02,3.73c4.01,0.97,6.96,2.62,8.85,4.97c1.89,2.35,2.84,5.3,2.84,8.85c0,2.89-0.67,5.5-2.02,7.81 c-1.35,2.31-3.19,4.14-5.52,5.48c-1.45,0.84-3.63,1.45-6.55,1.83c-3.88,0.51-6.46,0.76-7.73,0.76H2.6V2.08z M20,23.98h7.5 c2.69,0,4.56-0.46,5.62-1.39c1.05-0.93,1.58-2.27,1.58-4.02c0-1.62-0.53-2.89-1.58-3.81c-1.05-0.91-2.89-1.37-5.5-1.37H20V23.98z M20,45.92h8.8c2.97,0,5.07-0.53,6.28-1.58c1.22-1.05,1.83-2.47,1.83-4.25c0-1.65-0.6-2.98-1.81-3.98c-1.21-1-3.32-1.5-6.34-1.5H20 V45.92z">
							</path> 
							<path class="st0" d="M91.86,48.7H72.27l-2.72,9.22H51.93L72.92,2.08h18.82l20.98,55.83H94.65L91.86,48.7z M88.28,36.63l-6.16-20.07 l-6.1,20.07H88.28z">
							</path> 
							<path class="st0" d="M147.5,2.08h17.21v33.27c0,3.3-0.51,6.41-1.54,9.34c-1.03,2.93-2.64,5.49-4.84,7.69 c-2.2,2.19-4.5,3.74-6.91,4.62c-3.35,1.24-7.38,1.87-12.07,1.87c-2.72,0-5.68-0.19-8.89-0.57c-3.21-0.38-5.9-1.14-8.06-2.26 c-2.16-1.13-4.13-2.73-5.92-4.81s-3.02-4.22-3.68-6.43c-1.07-3.55-1.6-6.7-1.6-9.44V2.08h17.21v34.06c0,3.04,0.84,5.42,2.53,7.14 c1.69,1.71,4.03,2.57,7.03,2.57c2.97,0,5.3-0.84,6.99-2.53c1.69-1.69,2.53-4.08,2.53-7.17V2.08z"></path> 
							<path class="st0" d="M171.58,2.08h22.69l8.75,33.97l8.69-33.97h22.68v55.83h-14.13V15.34l-10.89,42.58h-12.79l-10.87-42.58v42.58 h-14.13V2.08z">

							</path> 
							<path class="st0" d="M240.99,2.08h46.24V14h-28.95v8.87h26.85v11.39h-26.85v11.01h29.78v12.64h-47.07V2.08z">

							</path> 
							<path class="st0" d="M330.16,35.07l15.12,4.57c-1.02,4.24-2.62,7.78-4.8,10.63c-2.18,2.84-4.89,4.99-8.13,6.44 c-3.24,1.45-7.36,2.17-12.36,2.17c-6.07,0-11.03-0.88-14.87-2.65c-3.85-1.76-7.17-4.87-9.96-9.31c-2.79-4.44-4.19-10.12-4.19-17.05 c0-9.24,2.46-16.33,7.37-21.29c4.91-4.96,11.86-7.44,20.85-7.44c7.03,0,12.56,1.42,16.59,4.27c4.02,2.84,7.01,7.21,8.97,13.1 l-15.23,3.39c-0.53-1.7-1.09-2.95-1.68-3.73c-0.97-1.32-2.15-2.34-3.54-3.05c-1.4-0.71-2.96-1.07-4.68-1.07 c-3.91,0-6.91,1.57-8.99,4.72c-1.58,2.33-2.36,6-2.36,10.99c0,6.19,0.94,10.43,2.82,12.73c1.88,2.29,4.52,3.44,7.92,3.44 c3.3,0,5.79-0.93,7.48-2.78C328.17,41.29,329.4,38.59,330.16,35.07z"></path>
							<path class="st0" d="M349.37,2.08h17.25v19.54h18.85V2.08h17.33v55.83h-17.33V35.33h-18.85v22.58h-17.25V2.08z">

							</path> 
						</g> 
					</svg> 
				</a>

				<div class="menu-box">
					<div>
						<div class="close-mobile-line" style="display: none;">
							<svg id="close-mobile-menu" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 371.23 371.23" style="enable-background:new 0 0 371.23 371.23;" xml:space="preserve">
								<polygon points="371.23,21.213 350.018,0 185.615,164.402 21.213,0 0,21.213 164.402,185.615 0,350.018 21.213,371.23 185.615,206.828 350.018,371.23 371.23,350.018 206.828,185.615 "/>
							</svg>
						</div>

						<svg class="logo-mobile hide" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Слой_1" x="0px" y="0px" viewBox="0 0 405.4 60" style="enable-background:new 0 0 405.4 60;" xml:space="preserve"> <style type="text/css"> .st0{fill:#1D4687;} </style> 
							<g> 
								<path class="st0" d="M2.6,2.08h32.3c5.38,0,9.52,1.33,12.4,4c2.88,2.67,4.32,5.97,4.32,9.9c0,3.3-1.03,6.13-3.08,8.49 c-1.37,1.57-3.38,2.82-6.02,3.73c4.01,0.97,6.96,2.62,8.85,4.97c1.89,2.35,2.84,5.3,2.84,8.85c0,2.89-0.67,5.5-2.02,7.81 c-1.35,2.31-3.19,4.14-5.52,5.48c-1.45,0.84-3.63,1.45-6.55,1.83c-3.88,0.51-6.46,0.76-7.73,0.76H2.6V2.08z M20,23.98h7.5 c2.69,0,4.56-0.46,5.62-1.39c1.05-0.93,1.58-2.27,1.58-4.02c0-1.62-0.53-2.89-1.58-3.81c-1.05-0.91-2.89-1.37-5.5-1.37H20V23.98z M20,45.92h8.8c2.97,0,5.07-0.53,6.28-1.58c1.22-1.05,1.83-2.47,1.83-4.25c0-1.65-0.6-2.98-1.81-3.98c-1.21-1-3.32-1.5-6.34-1.5H20 V45.92z">
								</path> 
								<path class="st0" d="M91.86,48.7H72.27l-2.72,9.22H51.93L72.92,2.08h18.82l20.98,55.83H94.65L91.86,48.7z M88.28,36.63l-6.16-20.07 l-6.1,20.07H88.28z">
								</path> 
								<path class="st0" d="M147.5,2.08h17.21v33.27c0,3.3-0.51,6.41-1.54,9.34c-1.03,2.93-2.64,5.49-4.84,7.69 c-2.2,2.19-4.5,3.74-6.91,4.62c-3.35,1.24-7.38,1.87-12.07,1.87c-2.72,0-5.68-0.19-8.89-0.57c-3.21-0.38-5.9-1.14-8.06-2.26 c-2.16-1.13-4.13-2.73-5.92-4.81s-3.02-4.22-3.68-6.43c-1.07-3.55-1.6-6.7-1.6-9.44V2.08h17.21v34.06c0,3.04,0.84,5.42,2.53,7.14 c1.69,1.71,4.03,2.57,7.03,2.57c2.97,0,5.3-0.84,6.99-2.53c1.69-1.69,2.53-4.08,2.53-7.17V2.08z"></path> 
								<path class="st0" d="M171.58,2.08h22.69l8.75,33.97l8.69-33.97h22.68v55.83h-14.13V15.34l-10.89,42.58h-12.79l-10.87-42.58v42.58 h-14.13V2.08z">

								</path> 
								<path class="st0" d="M240.99,2.08h46.24V14h-28.95v8.87h26.85v11.39h-26.85v11.01h29.78v12.64h-47.07V2.08z">

								</path> 
								<path class="st0" d="M330.16,35.07l15.12,4.57c-1.02,4.24-2.62,7.78-4.8,10.63c-2.18,2.84-4.89,4.99-8.13,6.44 c-3.24,1.45-7.36,2.17-12.36,2.17c-6.07,0-11.03-0.88-14.87-2.65c-3.85-1.76-7.17-4.87-9.96-9.31c-2.79-4.44-4.19-10.12-4.19-17.05 c0-9.24,2.46-16.33,7.37-21.29c4.91-4.96,11.86-7.44,20.85-7.44c7.03,0,12.56,1.42,16.59,4.27c4.02,2.84,7.01,7.21,8.97,13.1 l-15.23,3.39c-0.53-1.7-1.09-2.95-1.68-3.73c-0.97-1.32-2.15-2.34-3.54-3.05c-1.4-0.71-2.96-1.07-4.68-1.07 c-3.91,0-6.91,1.57-8.99,4.72c-1.58,2.33-2.36,6-2.36,10.99c0,6.19,0.94,10.43,2.82,12.73c1.88,2.29,4.52,3.44,7.92,3.44 c3.3,0,5.79-0.93,7.48-2.78C328.17,41.29,329.4,38.59,330.16,35.07z"></path>
								<path class="st0" d="M349.37,2.08h17.25v19.54h18.85V2.08h17.33v55.83h-17.33V35.33h-18.85v22.58h-17.25V2.08z">

								</path> 
							</g> 
						</svg>

						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"main_menu",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "left",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "N",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "main",
								"USE_EXT" => "N"
							)
						);?>

					</div>

					<a style="display: none;" class="all-popup-button" data-fancybox="" id="call-back-mobile" data-src="#pop-up" href="javascript:;">Обратный звонок</a>
				</div>

				<div class="mobile-shade hide"></div>

				<a class="head-phone" href="tel:<?= $contacts[0]['PROPERTY_PHONE_HEADER_VALUE']; ?>">
					<img style="display: none;" src="<?=SITE_TEMPLATE_PATH?>/img/phone.svg">
					<span><?= $contacts[0]['PROPERTY_PHONE_HEADER_VALUE']; ?></span>
				</a>
			</div>

		</div>
	</header>


	<!-- Прокрутка вверх -->
	<div id="scroll-up" class="hide">
		<svg role="presentation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="50px" height="50px" viewBox="0 0 48 48" enable-background="new 0 0 48 48" xml:space="preserve"><path style="fill:#ffcc00;" d="M43.006,47.529H4.964c-2.635,0-4.791-2.156-4.791-4.791V4.697c0-2.635,2.156-4.791,4.791-4.791h38.042
			c2.635,0,4.791,2.156,4.791,4.791v38.042C47.797,45.373,45.641,47.529,43.006,47.529z M25.503,16.881l6.994,7.049
			c0.583,0.588,1.532,0.592,2.121,0.008c0.588-0.583,0.592-1.533,0.008-2.122l-9.562-9.637c-0.281-0.283-0.664-0.443-1.063-0.443
			c0,0,0,0-0.001,0c-0.399,0-0.782,0.159-1.063,0.442l-9.591,9.637c-0.584,0.587-0.583,1.537,0.005,2.121
			c0.292,0.292,0.675,0.437,1.058,0.437c0.385,0,0.77-0.147,1.063-0.442L22.5,16.87v19.163c0,0.828,0.671,1.5,1.5,1.5
			s1.5-0.672,1.5-1.5L25.503,16.881z"></path></svg>
		</div>
		<!-- Прокрутка вверх -->

		<!-- Успешный попап форма на сайте -->
		<a id="pop-up-success-button" data-fancybox="pop-up-success" data-src="#pop-up-success" href="javascript:;" style="display: none;">
			Открыть окно
		</a>

		<div style="display: none;" id="pop-up-success">
			<svg class="success-popup-galka" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 612 612" style="enable-background:new 0 0 612 612;" xml:space="preserve"><g><g id="_x31__30_"><g><path d="M421.267,173.425c-9.142-5.278-20.847-2.142-26.125,7L272.837,392.272l-68.429-63.112 c-7.229-7.707-19.316-8.108-27.024-0.88c-7.707,7.229-8.109,19.316-0.879,27.043l87.439,80.65 c7.229,7.707,19.316,8.108,27.023,0.88c2.333-2.181,137.317-237.284,137.317-237.284 C433.545,190.409,430.408,178.704,421.267,173.425z M306,0C136.992,0,0,136.992,0,306s136.992,306,306,306s306-136.992,306-306 S475.008,0,306,0z M306,573.75C158.125,573.75,38.25,453.875,38.25,306C38.25,158.125,158.125,38.25,306,38.25 c147.875,0,267.75,119.875,267.75,267.75C573.75,453.875,453.875,573.75,306,573.75z"/></g></g></g></svg>
			<p class="thanks">Спасибо! Данные успешно отправлены.</p>
		</div>
		<!-- Успешный попап форма на сайте -->

		<!-- Попап -->
		<div style="display: none;" id="pop-up">
			<img class="pop-up-img" src="<?=SITE_TEMPLATE_PATH?>/img/pop-up-img.jpg">
			<div class="popup-body">
				<h2 class="pop-up-title">
					Оставьте заявку!
				</h2>
				<p class="pop-up-descr">
					Наш менеджер свяжется с вами и ответит на все интересующие вас вопросы
				</p>

				<form class="form-box">
					<div class="input-box name-input-box-popup">
						<input id="popup-name" type="text" placeholder="Ваше имя">
						<p class="popup-error hide">Пожалуйста, заполните все обязательные поля</p>
					</div>

					<div class="input-box phone-input-box-popup">
						<input id="popup-phone" type="text">
						<p class="popup-error hide">Пожалуйста, заполните все обязательные поля</p>
					</div>

					<input type="hidden" id="form-separator">

					<div class="error-bun hide">
						Пожалуйста, заполните все обязательные поля
					</div>

					<button id="send-popup-form">Скачать каталог</button>
				</form>

				<div class="success-box hide">
					Спасибо! Данные успешно отправлены.
				</div>
			</div>
		</div>
		<!-- Попап -->

		<!-- Красный баннер валидации -->
		<div class="form-banner-error hide">
			<div class="svg-box">
				<svg id="close-form-banner-error" xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"></path></svg>
			</div>
			<div class="text-box">
				Пожалуйста, заполните все обязательные поля
			</div>
		</div>
		<!-- Красный баннер валидации -->
