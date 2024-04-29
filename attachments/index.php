<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "BAUMECH - Навесное оборудование");

$APPLICATION->SetTitle("BAUMECH - Навесное оборудование");

$main_or_detail = Main_Or_Detail_Page('attachments');

$product_sec = Return_List_Variants(7, 'PRODUCT_SEC');
$auto_models = Return_List_Variants(7, 'AUTO_MODELS');
?>


<?php
	use Bitrix\Main\Page\Asset;
	if($main_or_detail)
	{
		Asset::getInstance()->addCss("/attachments/css/styles.css");
    	Asset::getInstance()->addCss("/attachments/css/media.css");
	}
?>

<?php if($main_or_detail): ?>

<?php 
	$all_models = Return_All(
		Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y"),
		Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_AUTO_TYPE", "PROPERTY_AUTO_MODEL", "DETAIL_PAGE_URL")
	);
	//debug($all_models);
?>

	<section class="all-models-top wrap">
	<?php foreach ($all_models as $model): ?>
		<a target="_blank" class="model-name" href="<?= $model['DETAIL_PAGE_URL']; ?>">
			<span>
				<?= $model['PROPERTY_AUTO_TYPE_VALUE']; ?>
			</span> 

			<span style="text-transform: uppercase;">
				<?= $model['PROPERTY_AUTO_MODEL_VALUE']; ?>	
			</span>
		</a>
	<?php endforeach; ?>
	</section>

	<section class="attach wrap">
    	<h1 class="main-title">Навесное оборудование BAUMECH</h1>
    	<p class="about-attach">
    		Всё навесное оборудование может устанавливаться на погрузчики Diktum, Avant, Multione, Hysoon, Helffer, Митракс
    	</p>
    	<div class="catygory">
    		<div class="catygory-item active">Все</div>
    		<?php foreach ($product_sec as $sec_name): ?>
    			<div class="catygory-item"><?= $sec_name; ?></div>
    		<?php endforeach; ?>
    	</div>

        <div class="filter-mob-buts" style="display: none;">
            <div id="show-filters">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 63.42 100"><defs><style>.cls-1{fill:#1d1d1b;}</style></defs><path class="cls-1" d="M13.75,22.59V.38h-6V22.59a10.75,10.75,0,0,0,0,20.64V99.62h6V43.23a10.75,10.75,0,0,0,0-20.64Z"></path><path class="cls-1" d="M63.42,67.09a10.75,10.75,0,0,0-7.75-10.32V.38h-6V56.77a10.75,10.75,0,0,0,0,20.64V99.62h6V77.41A10.75,10.75,0,0,0,63.42,67.09Z"></path></svg>

                <span>Фильтры</span>
            </div>

            <svg id="mobile-filt-loopa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88 88"> 
                <path fill="#3f3f3f" d="M85 31.1c-.5-8.7-4.4-16.6-10.9-22.3C67.6 3 59.3 0 50.6.6c-8.7.5-16.7 4.4-22.5 11-11.2 12.7-10.7 31.7.6 43.9l-5.3 6.1-2.5-2.2-17.8 20 9 8.1 17.8-20.2-2.1-1.8 5.3-6.1c5.8 4.2 12.6 6.3 19.3 6.3 9 0 18-3.7 24.4-10.9 5.9-6.6 8.8-15 8.2-23.7zM72.4 50.8c-9.7 10.9-26.5 11.9-37.6 2.3-10.9-9.8-11.9-26.6-2.3-37.6 4.7-5.4 11.3-8.5 18.4-8.9h1.6c6.5 0 12.7 2.4 17.6 6.8 5.3 4.7 8.5 11.1 8.9 18.2.5 7-1.9 13.8-6.6 19.2z">
                </path>
            </svg>
        </div>

    	<div class="filter-box">
    		<div class="model-box mark-class">
    			<div class="model-butt mark-class">
    				<span class="model-box-name mark-class">МОДЕЛЬ</span>
    				<svg class="model-arrow mark-class" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 1L6 6L11 1" stroke="#303239" stroke-linecap="round" stroke-linejoin="round"></path>
					</svg>
    			</div>
    			<div class="model-vars-box hide mark-class">
    			<?php foreach ($auto_models as $model_name): ?>
    				<div class="model-var-item mark-class">
    					<div class="galka-box mark-class"></div>
    					<span class="model-name mark-class"><?= $model_name; ?></span>
    				</div>
    			<?php endforeach; ?>
    			</div>
    		</div>

    		<div class="search-box">
    			<div class="input-box">
    				<input placeholder="Поиск" id="filt-search-input" type="text">
    				<div class="vert-line"></div>
	    			<svg id="search-string-button" class="loopa" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 88 88">
	    				<path fill="#757575" d="M85 31.1c-.5-8.7-4.4-16.6-10.9-22.3C67.6 3 59.3 0 50.6.6c-8.7.5-16.7 4.4-22.5 11-11.2 12.7-10.7 31.7.6 43.9l-5.3 6.1-2.5-2.2-17.8 20 9 8.1 17.8-20.2-2.1-1.8 5.3-6.1c5.8 4.2 12.6 6.3 19.3 6.3 9 0 18-3.7 24.4-10.9 5.9-6.6 8.8-15 8.2-23.7zM72.4 50.8c-9.7 10.9-26.5 11.9-37.6 2.3-10.9-9.8-11.9-26.6-2.3-37.6 4.7-5.4 11.3-8.5 18.4-8.9h1.6c6.5 0 12.7 2.4 17.6 6.8 5.3 4.7 8.5 11.1 8.9 18.2.5 7-1.9 13.8-6.6 19.2z">
	    				</path>
	    			</svg>
    			</div>
    		</div>

    		<div class="sort-box mark-class">
    			<div class="sort-butt mark-class">
    				<span id="sort-select-value" class="mark-class">Порядок: по умолчанию</span>
    				<svg class="sort-desctop-arrow mark-class" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 386.257 386.257" style="enable-background:new 0 0 386.257 386.257;" xml:space="preserve"><polygon points="0,96.879 193.129,289.379 386.257,96.879 "/></svg>
    			</div>

                <div class="sort-butt-mobile mark-class" style="display: none">
                    <span class="mark-class">Сортировка</span>
                    <svg class="sort-mobile-arrow mark-class" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L6 6L11 1" stroke="#303239" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </div>

    			<div class="filter-vars-box hide">
    				<div id="ACTIVE_FROM---DESC" class="filter-var-item hide-mobile">Порядок: по умолчанию</div>
    				<div id="property_PRICE_EQUIP---ASC" class="filter-var-item">Цена: по возрастанию</div>
    				<div id="property_PRICE_EQUIP---DESC" class="filter-var-item">Цена: по убыванию</div>
    				<div id="property_PRODUCT_NAME---ASC" class="filter-var-item">Название: А—Я</div>
    				<div id="property_PRODUCT_NAME---DESC" class="filter-var-item">Название: Я—А</div>
    				<div id="DATE_CREATE---DESC" class="filter-var-item">Порядок: сперва новые</div>
    				<div id="DATE_CREATE---ASC" class="filter-var-item">Порядок: сперва старые</div>
    			</div>
    		</div>
    	</div>

    	<div class="selected-cleare">
    		<div class="all-models"></div>
    		
    		<div class="additional-fields"></div>
    		
    		<div class="clear-all-button"></div>
    	</div>

    	<div class="amount hide">
    		Найдено <span id="amount-equipment"></span>
    	</div>
<?php endif; ?>

<?php 
// для сортировки 
// ACTIVE_FROM DESC
// DESC  ASC
	if(isset($_SESSION['prop_sort']) and isset($_SESSION['type_sort']))
	{
		$sortField = $_SESSION['prop_sort'];
		$sortOrder = $_SESSION['type_sort'];
	}
	else
	{
		$sortField = "ACTIVE_FROM";
		$sortOrder = "DESC";
	}
?>

        <!-- Список оборудования -->
        <?$APPLICATION->IncludeComponent(
	"bitrix:news", 
	"EQUIPMENT_LIST", 
	array(
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "Y",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => "EQUIPMENT_LIST",
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
			0 => "PRODUCT_NAME",
			1 => "PRODUCT_SEC",
			2 => "AUTO_MODELS",
			3 => "APPLICATION",
			4 => "CHARACTERISTICS",
			5 => "REMARK",
			6 => "PHOTO_GALLERY",
			7 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "7",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "PRODUCT_NAME",
			1 => "PHOTO_GALLERY",
			2 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "500",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/attachments/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => $sortField,
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => $sortOrder,
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"FILTER_NAME" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "PRODUCT_NAME",
			1 => "PRODUCT_SEC",
			2 => "AUTO_MODELS",
			3 => "",
		),
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
        <!-- Список оборудования -->

<?php if($main_or_detail): ?>
	<div class="no-items hide">Ничего не найдено</div>
		
    </section>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU"></script>

    <section class="contacts wrap">
		<h2 class="main-title">Контакты</h2>

		<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/contact-box.php');
		?>

		<?php
			require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/watch_all_models.php'); 
		?>

		<?php
			require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/models_button_line.php'); 
		?>
	</section>

    <script src="js/main.js" type="text/javascript"></script>
<?php endif; ?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>