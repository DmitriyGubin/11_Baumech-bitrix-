<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "BAUMECH | Мини-спецтехники | Машиностроительное предприятие");
$APPLICATION->SetTitle("BAUMECH | Мини-спецтехники | Машиностроительное предприятие");

$bool_main_page = Check_Main_Page();
use Bitrix\Main\Page\Asset;

if($bool_main_page)
{
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick.css');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick-theme.css');

    $inserts = Return_All_Fields_Props(
		Array("IBLOCK_ID"=>10, "ACTIVE"=>"Y"),
		Array()
	);

	//debug($inserts);
}

?>

<?php if($bool_main_page): ?>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU"></script>

	<!-- <section class="head-ban">
		<div class="wrap">
			<div class="head-ban-text">
				<div class="all-text">
					<h2 class="orange-text">Новая комплектация</h2>
					<h2 class="name-mark">Мини-погрузчик</h2>
					<h2 class="name-mark mark">baumech ml-02</h2>
					<div class="head-slider">
						<div class="head-slide"><h2>освещение</h2></div>
						<div class="head-slide"><h2>спецсигнал</h2></div>
						<div class="head-slide"><h2>ящик для инструментов</h2></div>
						<div class="head-slide"><h2>каркас безопасности</h2></div>
					</div>
					<a class="all-popup-button" data-fancybox="pop-up-one" id="load-catalog" data-src="#pop-up" href="javascript:;">Скачать каталог</a>
				</div>
			</div>

			<img class="head-car" src="<?=SITE_TEMPLATE_PATH?>/img/head-car.png">
		</div>
	</section>	 -->

	<?php
		$models = Return_All(
			Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y"),
			Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PICTURE", "PROPERTY_PRICE_FROM", 'PROPERTY_PRICE_OLD')
		);

		//debug($models);
	?>

	<section class="head-main" style="background-image: url(<?= SITE_TEMPLATE_PATH.'/img/back_head_detail.jpg'; ?>);">
		<div class="wrap text-img">
			<div class="head-main-text">
				<div class="all-text">
					<h2 class="orange-text">до 20 августа</h2>
					<h2 class="head-title">УСПЕЙ КУПИТЬ</h2>
					<h2 class="head-title modify">ПО СТАРОЙ ЦЕНЕ!</h2>

					<div class="price-slider">
					<?php foreach ($models as $mod_item): ?>
						<div class="price-slide">
							<span class="price">
								<?= number_format($mod_item['PROPERTY_PRICE_FROM_VALUE'], 0, '.', ' '); ?>
							</span>
							<span class="valute">₽</span>
						</div>
					<?php endforeach; ?>
					</div>

					<a class="all-popup-button" data-fancybox="pop-up-one" id="load-catalog" data-src="#pop-up" href="javascript:;">Скачать каталог</a>
				</div>
			</div>
			<div class="head-car head-car-slider">
			<?php foreach ($models as $mod_item): ?>
				<div class="head-car-slide">
					<img src="<?= \CFile::GetPath($mod_item['DETAIL_PICTURE']); ?>">
				</div>
			<?php endforeach; ?>
			</div>
			
			<a class="all-popup-button hide" data-fancybox="" id="load-catalog-mobile" data-src="#pop-up" href="javascript:;">Скачать каталог</a>
		</div>
	</section>

	<div class="back-ground-sect">

<?php endif; ?>

		<!-- Список машин -->
		<?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"cars_listt", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "cars_listt",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "AUTO_TYPE",
			1 => "LOAD_COPACITY",
			2 => "LIFT_HEIGHT_ARROW",
			3 => "PRICE_FROM",
			4 => "NOTE",
			5 => "ENGINE",
			6 => "START_TYPE",
			7 => "ENGINE_POWER",
			8 => "ENGINE_VALUME",
			9 => "COOLING_TYPE",
			10 => "MAX_FUEL",
			11 => "FUEL_TYPE",
			12 => "MAX_PRESSURE",
			13 => "HYDRA_OIL_VOLUME",
			14 => "HYDRO_SYSTEM",
			15 => "TRANSMISSION",
			16 => "FLOW_PUMPS",
			17 => "SPEED_ONE",
			18 => "SPEED_TWO",
			19 => "DRIVE_UNIT",
			20 => "RUNNING_SYSTEM",
			21 => "TRACTION_FORCE",
			22 => "SIZE",
			23 => "ROAD_LIGHT",
			24 => "SLOPE",
			25 => "BUCKET_WEIGHT",
			26 => "ARROW_TIME",
			27 => "CATERPILLAR",
			28 => "LADLE_TIME",
			29 => "NUMBER_CYLINDERS",
			30 => "NEW_OR_NOT",
			31 => "HIT_OR_NOT",
			32 => "TIRES",
			33 => "AUTO_MODEL",
			34 => "VIDEO_ACTION",
			35 => "MINI_TRANSFORM",
			36 => "IMG_ARROW",
			37 => "DRAWING_BEFORE",
			38 => "DRAWING_SIDE",
			39 => "PRICE_OLD",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "5",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "PRICE_OLD",
			1 => "PRICE_FROM",
			2 => "NEW_OR_NOT",
			3 => "HIT_OR_NOT",
			4 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
		<!-- Список машин -->

<?php if($bool_main_page): ?>
<?php
	$adv = Return_All(
		Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT")
	);
	//debug($adv);
?>	
		<section class="advantages wrap">
			<h2 class="main-title">Преимущества техники BAUMECH</h2>
			<div class="adv-box">
			<?php foreach ($adv as $adv_item): ?>
				<div class="adv-item">
					<img src="<?= \CFile::GetPath($adv_item['PREVIEW_PICTURE']); ?>" class="adv-img">
					<h3 class="adv-title">
						<?= $adv_item['NAME']; ?>
					</h3>
					<p class="adv-text">
						<?= $adv_item['~PREVIEW_TEXT']; ?>
					</p>
				</div>
			<?php endforeach; ?>
			</div>
		</section>

		<section class="customers wrap">
		<?php foreach ($inserts[0]['props']['CUSTOMERS']['VALUE'] as $img_item): ?>
			<div class="img-box">
				<img src="<?= \CFile::GetPath($img_item); ?>">
			</div>
		<?php endforeach; ?>
		</section>
	</div>


	<section class="consult wrap">
		<h2 class="main-title">Получите консультацию менеджера по технике BAUMECH</h2>
		<p class="consult-text">
			Подробно расскажем о возможностях нашей техники и подберем комплект навесного оборудования под Ваши задачи
		</p>
		<div class="form-box">
			<form class="universal-form">
				<div class="name-input-box">
					<input type="text" placeholder="Ваше имя">
					<div class="error-box hide">
							Обязательное поле
						<div class="for-triangle">
							<div class="triangle"></div>
						</div>
					</div>
				</div>

				<div class="phone-input-box">
					<input id="phone-consult" type="text" placeholder="Контактный номер телефона">
					<div class="error-box hide">
							Обязательное поле
						<div class="for-triangle">
							<div class="triangle"></div>
						</div>
					</div>
				</div>

				<button id="send-consult-form-tech" class="button-with-border">
					Получить консультацию
				</button>
			</form>

			<img class="consult-form-img" src="<?=SITE_TEMPLATE_PATH?>/img/consult-form-img.png">
		</div>
	</section>

	
	<div class="back-ground-sect">

		<section id="our-areas-scroll" class="our-areas wrap">
			<h2 class="main-title">Сферы применения нашей техники</h2>
			<div class="our-areas-box">
			<?php foreach ($inserts[0]['props']['APPLICATIONS']['VALUE'] as $img_item): ?>
				<div class="areas-item">
					<img class="areas-img" src="<?= \CFile::GetPath($img_item); ?>">
				</div>
			<?php endforeach; ?>
			</div>

			<div class="equipment">
				<h2 class="main-title">
					Для каждой сферы разработан комплект навесного оборудования
				</h2>
				<p class="about-equipment">
					Подберите оборудование для ваших задач
				</p>

				
				<a data-fancybox="pop-up-two" data-src="#pop-up" id="pick-up-equipment" class="button-with-border all-popup-button" href="javascript:;">
					<img class="arrow-pick-up" src="<?=SITE_TEMPLATE_PATH?>/img/Arrow_1.png">
					Подобрать оборудование
				</a>
				
			</div>
		</section>


		<section class="video-about-tech wrap">
			<h2 class="main-title">Посмотрите, как работает наша техника</h2>
			<div class="video-box">
				<!-- <div class="video-item"></div> -->
				<?php foreach ($inserts[0]['props']['HOW_TECH_WORKS']['VALUE'] as $video_path): ?>
					<div class="video-item">
						<iframe loading="lazy" frameborder="0" allowfullscreen="" data-original="<?= $video_path; ?>" src="<?= $video_path; ?>"></iframe>
					</div>
				<?php endforeach; ?>
			</div>
		</section>

		<section class="commerce wrap">
			<h2 class="main-title">Получите коммерческое предложение</h2>
			<p class="under-title-text">
				с полным каталогом навесного оборудования и ценами
			</p>
			<div class="commerce-box">
				<img class="commerce-img" src="<?=SITE_TEMPLATE_PATH?>/img/commerce_img.png">
				<div class="form-box">
					<form class="universal-form">
						<div class="name-input-box">
							<input type="text" placeholder="Ваше имя">
							<div class="error-box hide">
								Обязательное поле
								<div class="for-triangle">
									<div class="triangle"></div>
								</div>
							</div>
						</div>

						<div class="phone-input-box">
							<input id="phone-commerce" type="text" placeholder="Контактный номер телефона">
							<div class="error-box hide">
								Обязательное поле
								<div class="for-triangle">
									<div class="triangle"></div>
								</div>
							</div>
						</div>
						<button id="send-consult-form-commerce" class="button-with-border">
							Получить консультацию
						</button>
					</form>
					<img class="arrow-commerse" src="<?=SITE_TEMPLATE_PATH?>/img/Arrow_commerce.png">
				</div>
			</div>
		</section>

		<section class="about-us wrap">
			<h2 class="main-title">О компании</h2>
			<div class="doc-box">
				<div class="text-box">
					<?= $inserts[0]['props']['TEXT_ABOUT_ABOVE']['~VALUE']; ?>
				</div>

				<div class="slider-documents">
				<?php foreach ($inserts[0]['props']['DOCUMENTS']['VALUE'] as $img): ?>
					<div class="doc-item-box">
						<img class="doc-img" src="<?= \CFile::GetPath($img); ?>">
					</div>
				<?php endforeach; ?>
				</div>
			</div>

			<div class="under-text">
				<?= $inserts[0]['props']['TEXT_ABOUT_UNDER']['~VALUE']; ?>
			</div>

			<div class="slider-gallery-mobile gallery">
			<?php foreach ($inserts[0]['props']['GALLERY_ABOUT']['~VALUE'] as $img): ?>
				<div class="gallery-item-box">
					<img class="gallery-img object-fit" src="<?= \CFile::GetPath($img); ?>">
				</div>
			<?php endforeach; ?>
			</div>
		</section>

		<div class="shadow-delimeter"></div>

		<section id="reviews-scroll" class="reviews wrap">
			<h2 class="main-title">Отзывы и клиенты</h2>
			<div class="reviews-box reviews-slider">
			<?php $name = ' '; $path = ''; ?>
			<?php foreach ($inserts[0]['props']['REVIEWS']['VALUE'] as $video): ?>
			<?php
				$name = ' ';
				$arr = explode('-----', $video);
				if(count($arr) == 2)
				{
					$name = $arr[0];
					$path = $arr[1];
				}
				else
				{
					$path = $arr[0];
				}
			?>
				<div class="reviews-item">
					<p class="client-name"><?= $name; ?></p>
					<div class="video-box">
						<iframe loading="lazy" frameborder="0" allowfullscreen="" data-original="<?= $path; ?>" src="<?= $path; ?>"></iframe>

						<div class="mobile-preview" style="display: none;">
							<p class="client-name-mob"><?= $name; ?></p>

							<svg class="play-button" viewBox="0 0 60 60">
								<g stroke="none" stroke-width="1" fill="" fill-rule="evenodd">
									<g class="tn-elem__gallery__play_icon__color-holder" transform="translate(-691.000000, -3514.000000)" fill="#FFFFFF">
										<path d="M721,3574 C737.568542,3574 751,3560.56854 751,3544 C751,3527.43146 737.568542,3514 721,3514 C704.431458,3514 691,3527.43146 691,3544 C691,3560.56854 704.431458,3574 721,3574 Z M715,3534 L732,3544.5 L715,3555 L715,3534 Z">
										</path>
									</g>
								</g>
							</svg>
							
							<svg class="video-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Слой_1" x="0px" y="0px" viewBox="0 0 405.4 60" style="enable-background:new 0 0 405.4 60;" xml:space="preserve"> <style type="text/css"> .st0{fill:#1D4687;} </style> 
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
						</div>
					</div>
				</div>
			<?php endforeach; ?>

				<div class="reviews-item">
					<p class="client-name"></p>
					<div class="video-box">
						<div class="mobile-preview" style="display: none;">
							<p class="client-name-mob"></p>

							<svg class="play-button" viewBox="0 0 60 60">
								<g stroke="none" stroke-width="1" fill="" fill-rule="evenodd">
									<g class="tn-elem__gallery__play_icon__color-holder" transform="translate(-691.000000, -3514.000000)" fill="#FFFFFF">
										<path d="M721,3574 C737.568542,3574 751,3560.56854 751,3544 C751,3527.43146 737.568542,3514 721,3514 C704.431458,3514 691,3527.43146 691,3544 C691,3560.56854 704.431458,3574 721,3574 Z M715,3534 L732,3544.5 L715,3555 L715,3534 Z">
										</path>
									</g>
								</g>
							</svg>
							
							<svg class="video-logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Слой_1" x="0px" y="0px" viewBox="0 0 405.4 60" style="enable-background:new 0 0 405.4 60;" xml:space="preserve"> <style type="text/css"> .st0{fill:#1D4687;} </style> 
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
						</div>
						<img class="new-video-img" src="<?=SITE_TEMPLATE_PATH?>/img/new-video.jpg">
					</div>
				</div>
			</div>
		</section>
	</div>


	<section class="diller-net wrap">
		<h2 class="main-title">Дилерская сеть BAUMECH</h2>
		<?php 
			require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/diller-map.php');
		?>
		<div class="diller-map-text">
			<h3>Полный список региональных представителей BAUMECH</h3>
			<p>Узнать об условиях, увидеть технику и пройти тест-драйв в вашем городе</p>
		</div>

		<a href="/dealers/" id="dillers-button" class="dark-blue-button">Диллеры</a>
	</section>


	<section id="contacts-scroll" class="contacts wrap">
		<h2 class="main-title">Контакты</h2>
		
		<?php 
			require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/contact-box.php');
		?>

		<?php 
			require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/models_button_line.php');
		?>
	</section>

	
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/libraries/slick/slick.min.js'; ?>"></script>
<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/js/main_page.js' ?>"></script>

<?php endif; ?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>