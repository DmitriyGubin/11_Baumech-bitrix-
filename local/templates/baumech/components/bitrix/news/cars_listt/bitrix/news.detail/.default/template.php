<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick.css');
Asset::getInstance()->addCss(SITE_TEMPLATE_PATH.'/libraries/slick/slick-theme.css');

//debug($arResult);

$new = ($arResult['PROPERTIES']['NEW_OR_NOT']['VALUE'] == 'YES');
//$hit = ($arResult['PROPERTIES']['HIT_OR_NOT']['VALUE'] == 'YES');

$left_img = $arResult['PROPERTIES']['DRAWING_BEFORE']['VALUE'];
$right_img = $arResult['PROPERTIES']['DRAWING_SIDE']['VALUE'];

$auto_type = $arResult['PROPERTIES']['AUTO_TYPE']['VALUE'];
$model_auto = $arResult['PROPERTIES']['AUTO_MODEL']['VALUE'];
$equip = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y", "PROPERTY_AUTO_MODELS_VALUE" => $model_auto),
	Array()
);

$model_auto_big = mb_strtoupper($model_auto);
$APPLICATION->SetPageProperty("title", $auto_type.' BAUMECH '.$model_auto_big);
$APPLICATION->SetTitle($auto_type.' BAUMECH '.$model_auto_big);

?>
	<section class="nav-top wrap">
		<?php if(($left_img != '') and ($right_img != '')): ?>
			<a class="nav-name" href="/#size-scroll">Габариты</a>
		<?php endif; ?>

		<?php if($arResult['PROPERTIES']['MAIN_FEATURES']['VALUE'] != ''): ?>
			<a class="nav-name" href="/#possib-scroll">Возможности</a>
		<?php endif; ?>

		<a class="nav-name" href="/#character-scroll">Характеристики</a>

		<?php if(count($equip) != 0): ?>
			<a class="nav-name" href="/#equip-scroll">Оборудование</a>
		<?php endif; ?>

		<a class="nav-name" href="/#contacts-scroll">Контакты</a>
	</section>

<?php 
	$old_price = $arResult['PROPERTIES']['PRICE_OLD']['VALUE'];
?>

	<section class="head-detail" style="background-image: url(<?= SITE_TEMPLATE_PATH.'/img/back_head_detail.jpg'; ?>);">
		<div class="wrap text-img">
			<div class="head-detail-text">
				<div class="all-text">
				<?php if($old_price != ''): ?>
					<h2 class="date_discount">до 20 августа</h2>
					<h2 class="add_text">успей купить</h2>
				<?php endif; ?>

					<?php if($new): ?>
						<h2 class="orange-text">Новинка</h2>
					<?php endif; ?>

					<h2 class="name-mark"><?= $arResult['PROPERTIES']['AUTO_TYPE']['VALUE']; ?></h2>
					<h2 class="name-mark mark"><?= $arResult['NAME']; ?></h2>

				<?php if($old_price != ''): ?>
					<h2 class="add_text">по старой цене</h2>
					<h2 class="head-price-box">
						<span class="price">
							<?= number_format($old_price, 0, '.', ' '); ?>
						</span>
						<span class="valute">₽</span>
					</h2>
				<?php endif; ?>

					<a class="all-popup-button" data-fancybox="pop-up-one" id="load-catalog" data-src="#pop-up" href="javascript:;">Скачать каталог</a>
				</div>
			</div>
			<img class="head-car" src="<?= $arResult['DETAIL_PICTURE']['SRC']; ?>">
		</div>

		<div class="about-head">
			<div class="doc-box">
				<img src="/img/doc-list.svg">
				<div class="doc-text">
					<?= $arResult['~DETAIL_TEXT']; ?>
				</div>
			</div>

			<div class="about-head-item first">
				<p class="about-descr">Грузоподьёмность</p>
				<h3 class="about-prop"><?= $arResult['PROPERTIES']['LOAD_COPACITY']['VALUE'].' кг.'; ?></h3>
			</div>

			<?php 
				$height = $arResult['PROPERTIES']['LIFT_HEIGHT_ARROW']['VALUE'];
				$transform = $arResult['PROPERTIES']['MINI_TRANSFORM']['VALUE'];
			?>

			<div class="about-head-item middle">
				<div class="delimeter top"></div>
				<?php if($height != ''): ?>
				<p class="about-descr">Высота подьёма стрелы</p>
				<h3 class="about-prop"><?= $height.' м.'; ?></h3>
				<?php elseif($transform == 'YES'): ?>
					<p class="about-descr">Трансформируется в мини-погрузчик</p>
				<?php endif; ?>
				<div class="delimeter bottom"></div>
			</div>

			<div class="about-head-item last">
				<p class="about-descr">Стоимость</p>
				<h3 class="about-prop"><?= 'от '.number_format($arResult["PROPERTIES"]["PRICE_FROM"]["VALUE"], 0, '.', ' ').' р.'; ?></h3>
			</div>
		</div>

		<a style="display: none;" class="all-popup-button" data-fancybox="pop-up-two" id="load-catalog-mobile" data-src="#pop-up" href="javascript:;">Скачать каталог</a>
	</section>

	<?php 
		$capabils = $arResult['PROPERTIES']['MAIN_FEATURES']['VALUE'];
		$capa_descr = $arResult['PROPERTIES']['MAIN_FEATURES']['DESCRIPTION'];
		$feature_sec_id = $arResult['PROPERTIES']['POP_UP_WINDOWS']['VALUE'];
	?>

	<?php if(($capabils != '') or ($feature_sec_id != '')): ?>
	<?php 
		$type_avto = $arResult['PROPERTIES']['AUTO_TYPE']['VALUE'];
		$type_avto_res = str_replace('мини-', '', $type_avto).'ов';

		$feature = Return_All(
			Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID' => $feature_sec_id),
			Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_ARROW_X", "PROPERTY_ARROW_Y", "PROPERTY_WINDOW_X", "PROPERTY_WINDOW_Y", "PROPERTY_DESCR_FEATURE")
		);

		//debug($feature);
	?>
	<div class="back-ground-sect">
		<section class="capability wrap" id="possib-scroll">
			<h2 class="main-title">Основные возможности наших <?= $type_avto_res; ?></h2>
			<?php if($capabils != ''): ?>
			<div class="capa-box">
			<?php foreach ($capabils as $key => $img_id): ?>
				<div class="capa-item">
					<img class="capa-img" src="<?=\CFile::GetPath($img_id);?>">
					<div class="capa-text">
						<?= $capa_descr[$key]; ?>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<?php if($feature_sec_id != ''): ?>
			<div class="arrows-img-box">
				<img class="big-car" src="<?= \CFile::GetPath($arResult['PROPERTIES']['IMG_ARROW']['VALUE']); ?>">
				<?php foreach ($feature as $feat_item): ?>
				<div class="arrow-box" style="top: <?= $feat_item['PROPERTY_ARROW_Y_VALUE'].'%'; ?>; left: <?= $feat_item['PROPERTY_ARROW_X_VALUE'].'%'; ?>">
					<div class="about-arrow">
						<div class="arrow-window one hide" style="top: <?= $feat_item['PROPERTY_WINDOW_Y_VALUE'].'px'; ?>; left: <?= $feat_item['PROPERTY_WINDOW_X_VALUE'].'px'; ?>">
							<?= $feat_item['PROPERTY_DESCR_FEATURE_VALUE']; ?>
						</div>
					</div>

					<div class="car-prop-button">
						<img class="car-arrow-desctop" src="/img/car-arrow-desctop.png">

						<div class="car-finger-mobile" style="display: none;">
							<img src="/img/finger.png">
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>

			<a class="all-popup-button button-with-border" data-fancybox="pop-up-three" id="how-much-car-arrs" data-src="#pop-up" href="javascript:;">
				Узнать стоимость
			</a>
		</section>
	</div>
	<?php endif; ?>

	<?php
		$left_img = $arResult['PROPERTIES']['DRAWING_BEFORE'];
		$right_img = $arResult['PROPERTIES']['DRAWING_SIDE'];

		$left_img_size = explode('///', $left_img['DESCRIPTION']);
		$right_img_size = explode('///', $right_img['DESCRIPTION']);
	?>

<?php if($left_img['VALUE'] != '' and $right_img['VALUE'] != ''): ?>
	<section class="drawing wrap" id="size-scroll">
		<div class="img-box left-img">
			<div class="horizontal"><?= $left_img_size[0]; ?>&nbsp;мм</div>
			<div class="vertical"><?= $left_img_size[1]; ?>&nbsp;мм</div>
			<img class="plan" src="<?= \CFile::GetPath($left_img['VALUE']); ?>">
		</div>

		<div class="img-box right-img">
			<div class="horizontal"><?= $right_img_size[0]; ?>&nbsp;мм</div>
			<div class="vertical"><?= $right_img_size[1]; ?>&nbsp;мм</div>
			<img class="plan" src="<?= \CFile::GetPath($right_img['VALUE']); ?>">
		</div>
	</section>
<?php endif; ?>

	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/table.php');
	?>

	<section class="feature wrap" id="character-scroll">
		<h2 class="main-title">Характеристики</h2>
		<div class="table-head">
			<div class="one-column head">
				Параметры
			</div>

			<div class="two-column head">
				Значение
			</div>
		</div>

		<div class="table-rows">
		<?php $count = 0; ?>
		<?php foreach ($props_arr as $prop_name => $code_unit): ?>

		<?php
			foreach ($arResult['PROPERTIES'] as $prop_code => $prop_arr) 
			{
				if($prop_code == $code_unit[0])
				{
					$prop_value = $prop_arr['VALUE'];
					if($prop_value != '')
					{
						$flag = true;
						$row_name = $prop_name;
						$row_value = $prop_value.' '.$code_unit[1];
						$count ++;
					}
					else
					{
						$flag = false;
						break;
					}
				}
			} 

			//whitee grayy
		?>
		
			<?php if($flag): ?>
				<div class="one-row <?= $count % 2 == 0? 'grayy' : 'whitee'; ?>">
					<div class="one-column table-body"><?= $row_name; ?></div>
					<div class="two-column table-body"><?= $row_value; ?></div>
				</div>
			<?php endif; ?>
		<?php endforeach; ?>
		</div>
	</section>

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

			<img class="consult-form-img" src="<?=\CFile::GetPath($arResult['PROPERTIES']['CONSULTATION_IMG']['VALUE'])?>">
		</div>
	</section>

	<section class="galery wrap">
	<?php foreach ($arResult['PROPERTIES']['GALLERY_IMGS']['VALUE'] as $gall_img): ?>
		<a class="galery-item" href="<?=\CFile::GetPath($gall_img)?>" data-fancybox="gallery">
		    <img class="object-fit" src = "<?=\CFile::GetPath($gall_img)?>">
		</a>
	<?php endforeach; ?>
	</section>

<?php 
	$type_auto = $arResult['PROPERTIES']['AUTO_TYPE']['VALUE'];
	$type_auto = $type_auto.'а';
	//debug($equip);
?>

	<section class="equipment wrap" id="equip-scroll">
		<h2 class="main-title">
			Навесное оборудование для 
			<span style="font-weight: 800;"><?= $type_auto; ?></span>
			<span style="text-transform: uppercase; font-weight: 800;"><?= $model_auto; ?></span>
		</h2>
		<div class="slider-equip">
			<?php foreach ($equip as $equip_item): ?>
			<div class="slider-equip-slide">
				<a target="_blank" class="equip-item" href="<?= $equip_item['fields']['DETAIL_PAGE_URL']; ?>">
					<div>
						<div class="img-box">
							<img class="equip-img" src="<?=\CFile::GetPath($equip_item['props']['PHOTO_GALLERY']['VALUE'][0]);?>">
						</div>
						<h3 class="equip-name">
							<?= $equip_item['props']['PRODUCT_NAME']['VALUE']; ?>
						</h3>
						<p class="equip-descr">
							<?= $equip_item['props']['APPLICATION_AUTO_DETAIL']['VALUE']; ?>
						</p>
					</div>
					<button class="more-info-equip">Подробнее</button>
				</a>
			</div>
			<?php endforeach; ?>
		</div>
	</section>

	<div class="back-ground-sect ">
		<section class="commerce wrap">
			<h2 class="main-title">Давайте подберем навесное оборудование</h2>
			<p class="under-title-text">
				Оставьте заявку и мы подберем оборудование, и комплектацию под ваши задачи
			</p>
			<div class="commerce-box">
				<img class="commerce-img" src="/img/podbor.png">
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
							<input id="phone-selection" type="text" placeholder="Контактный номер телефона">
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
					<img class="arrow-commerse" src="/img/Arrow_commerce.png">
				</div>
			</div>
		</section>
	</div>

	<?php $videos_arr = $arResult['PROPERTIES']['VIDEO_ACTION']['VALUE']; ?>
	<?php if($videos_arr != ''): ?>
	<section class="video-about-techh wrap">
		<h2 class="main-title">
			Посмотрите на 
			<span><?= $arResult['PROPERTIES']['AUTO_TYPE']['VALUE']; ?></span>
			<span style="text-transform: uppercase;"><?= $arResult['NAME']; ?></span>
			в действии
		</h2>
		<div class="video-box">
			<!-- <div class="video-itemm"></div> -->
			<?php foreach ($videos_arr as $video_path): ?>
				<div class="video-itemm">
					<iframe loading="lazy" frameborder="0" allowfullscreen="" data-original="<?= $video_path; ?>" src="<?= $video_path; ?>"></iframe>
				</div>
			<?php endforeach; ?>
		</div>
	</section>
	<?php endif; ?>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU"></script>

<section class="contacts wrap" id="contacts-scroll">
	<h2 class="main-title">Контакты</h2>
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/contact-box.php');
	?>

	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/watch_all_models.php');
	?>

	<?php 
		$models = Return_All(
			Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "!ID" => $arResult['ID']),
			Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_AUTO_TYPE", "PROPERTY_AUTO_MODEL")
		);

		//debug($models);
	?>

	<div class="models-ref-box">
	<?php foreach ($models as $model_item): ?>
		<a target="_blank" href="<?= $model_item['DETAIL_PAGE_URL']; ?>" class="dark-blue-button models-ref">
			<span><?= $model_item['PROPERTY_AUTO_TYPE_VALUE']; ?></span>&#160;
			<span style="text-transform: uppercase;"><?= $model_item['PROPERTY_AUTO_MODEL_VALUE']; ?></span>
		</a>
	<?php endforeach; ?>
	</div>
</section>


<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/libraries/slick/slick.min.js'; ?>"></script>

<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/components/bitrix/news/cars_listt/bitrix/news.detail/.default/main.js'; ?>"></script>




<?php /* 
<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && ($arResult["FIELDS"]["PREVIEW_TEXT"] ?? '')):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif($arResult["DETAIL_TEXT"] <> ''):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>


*/?>