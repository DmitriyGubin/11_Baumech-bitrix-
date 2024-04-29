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

?>

<div class="go-back-box">
	<a class="mobile-arrow hide" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/attachments/'; ?>">
		<svg width="26px" height="26px" viewBox="0 0 26 26" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M10.4142136,5 L11.8284271,6.41421356 L5.829,12.414 L23.4142136,12.4142136 L23.4142136,14.4142136 L5.829,14.414 L11.8284271,20.4142136 L10.4142136,21.8284271 L2,13.4142136 L10.4142136,5 Z" fill="#000000"></path></svg>
	</a>

	<!-- $_SERVER['HTTP_REFERER'] -->

	<a class="go-back-ref" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/attachments/'; ?>">
		Назад в каталог
	</a>
	

	<a class="go-back-cross" href="<?= 'http://'.$_SERVER['HTTP_HOST'].'/attachments/'; ?>">
		<svg width="23px" height="23px" viewBox="0 0 23 23" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g stroke="none" stroke-width="1" fill="#000000" fill-rule="evenodd"><rect transform="translate(11.313708, 11.313708) rotate(-45.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect><rect transform="translate(11.313708, 11.313708) rotate(-315.000000) translate(-11.313708, -11.313708) " x="10.3137085" y="-3.6862915" width="2" height="30"></rect></g></svg>
	</a>
</div>

<?php 
	$gallery_mass = $arResult['PROPERTIES']['PHOTO_GALLERY']['VALUE'];
	$bool = (count($gallery_mass) == 1);
?>

<section class="product wrap">
	<div class="imgs-box">
		<div class="big-slider">
		<?php foreach ($gallery_mass as $gallery_img): ?>
			<div class="big-slider-slide"> 
				<!-- <a class="big-img-ref" href="<?=\CFile::GetPath($gallery_img); ?>" data-fancybox="galleryy">
					<img class="object-fit" src = "<?=\CFile::GetPath($gallery_img); ?>">
				</a> -->

				<a class="big-img-ref">
					<img class="object-fit" src = "<?=\CFile::GetPath($gallery_img); ?>">
				</a>
			</div>
		<?php endforeach; ?>
		</div>

		<div class="small-slider <?= $bool ? 'hide' : ''; ?>">
		<?php foreach ($gallery_mass as $gallery_img): ?>
			<div class="small-slider-slide">
				<img class="object-fit" src="<?= \CFile::GetPath($gallery_img); ?>">
			</div>
		<?php endforeach; ?>
		</div>
	</div>

	<div class="text-box">
		<h1 class="prod-name"><?= $arResult['NAME']; ?></h1>
		<?php $text = $arResult['~PREVIEW_TEXT']; ?>
		<?php if($text != ''): ?>
		<div class="about-text">
			<?= $text; ?>
		</div>
		<div class="select-box">
			<select id="select-vars"> 
				<option>Сменные зубья для ковша.</option>
			</select>
		</div>
		<?php endif; ?>

		<?php $application = $arResult['PROPERTIES']['APPLICATION']['~VALUE']; ?>

		<?php if($application != ''): ?>
		<div class="use">
			<span>Применение:</span>
			<span> <?= $application; ?></span>
			<span>.</span>
		</div>
		<?php endif; ?>

		<a class="all-popup-button" data-fancybox="about-price-popup" id="about-price" data-src="#pop-up" href="javascript:;">УЗНАТЬ ЦЕНУ</a>

		<div class="feature">
			<p>Характеристики:</p>
		<?php foreach ($arResult['PROPERTIES']['CHARACTERISTICS']['VALUE'] as $prop): ?>
			<p>
				<span><?= $prop; ?></span>
			</p>
		<?php endforeach; ?>
		</div>

		<?php $remark = $arResult['PROPERTIES']['REMARK']['~VALUE']; ?>
		<?php if($remark != ''): ?>
		<div class="remark">
			<?= $remark; ?>
		</div>
		<?php endif ?>

		<div class="models">
		<?php foreach ($arResult['PROPERTIES']['AUTO_MODELS']['VALUE'] as $model): ?>
			<p>
				<span>МОДЕЛЬ: </span>
				<span><?= $model; ?></span>
			</p>
		<?php endforeach; ?>
		</div>
	</div>
</section>

<?php
		$models_arr = $arResult['PROPERTIES']['AUTO_MODELS']['VALUE'];
		$vars = Return_All_Fields_Props(
			Array("IBLOCK_ID"=>7, "ACTIVE"=>"Y", "PROPERTY_AUTO_MODELS_VALUE" => $models_arr, "!ID"=>$arResult['ID']),
			Array()
			//Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_PRODUCT_NAME", "PHOTO_GALLERY")
		);

		$flag = false;
		if(count($vars) != 0)
		{
			$flag = true;
			$insert_vars = [];
			$insert_nums = Make_Random_Interval_Arr(count($vars), 4);

			foreach ($insert_nums as $num) 
			{
				foreach ($vars as $key => $value) 
				{
					if($num == $key)
					{
						$insert_vars[] = $value;
					}
				}
			}
		}
		//debug($insert_vars);
?>

<?php if($flag): ?>
<section class="another-prod wrap">
	<h2 class="title">Смотрите также</h2>

	<div class="mobile-help" style="display: none;">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 300" height="42" width="42"> <rect class="tooltip-horizontal-scroll-icon_card" x="480" width="200" height="200" rx="5" fill="rgba(190,190,190,0.3)"></rect> <rect class="tooltip-horizontal-scroll-icon_card" y="0" width="200" height="200" rx="5" fill="rgba(190,190,190,0.3)"></rect> <rect class="tooltip-horizontal-scroll-icon_card" x="240" width="200" height="200" rx="5" fill="rgba(190,190,190,0.3)"></rect> <path class="tooltip-horizontal-scroll-icon_hand" d="M78.9579 285.7C78.9579 285.7 37.8579 212.5 20.5579 180.8C-2.44209 138.6 -6.2422 120.8 9.6579 112C19.5579 106.5 33.2579 108.8 41.6579 123.4L61.2579 154.6V32.3C61.2579 32.3 60.0579 0 83.0579 0C107.558 0 105.458 32.3 105.458 32.3V91.7C105.458 91.7 118.358 82.4 133.458 86.6C141.158 88.7 150.158 92.4 154.958 104.6C154.958 104.6 185.658 89.7 200.958 121.4C200.958 121.4 236.358 114.4 236.358 151.1C236.358 187.8 192.158 285.7 192.158 285.7H78.9579Z" fill="rgba(190,190,190,1)"></path><style> .tooltip-horizontal-scroll-icon_hand { animation: tooltip-horizontal-scroll-icon_anim-scroll-hand 2s infinite } .tooltip-horizontal-scroll-icon_card { animation: tooltip-horizontal-scroll-icon_anim-scroll-card 2s infinite } @keyframes tooltip-horizontal-scroll-icon_anim-scroll-hand { 0% { transform: translateX(80px) scale(1); opacity: 0 } 10% { transform: translateX(80px) scale(1); opacity: 1 } 20%,60% { transform: translateX(175px) scale(.6); opacity: 1 } 80% { transform: translateX(5px) scale(.6); opacity: 1 } to { transform: translateX(5px) scale(.6); opacity: 0 } } @keyframes tooltip-horizontal-scroll-icon_anim-scroll-card { 0%,60% { transform: translateX(0) } 80%,to { transform: translateX(-240px) } }</style></svg>
	</div>

	<div class="catalog-box mobile-slider-another">
	<?php foreach ($insert_vars as $equip): ?>
	<?php $photos = $equip['props']['PHOTO_GALLERY']['VALUE']; ?>
		<a target="_blank" class="catalog-item" href="<?= $equip['fields']['DETAIL_PAGE_URL']; ?>">
			<div class="cat-img-box">
				<img class="small-img" src="<?= \CFile::GetPath($photos[0]); ?>">
				<?php if(isset($photos[1])): ?>
					<img class="big-img object-fit hide" src="<?= \CFile::GetPath($photos[1]); ?>">
				<?php endif; ?>
			</div>
			<div class="about-prod">
				<?= $equip['props']['PRODUCT_NAME']['VALUE']; ?>
			</div>
		</a>
	<?php endforeach; ?>
	</div>
</section>
<?php endif; ?>


<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/libraries/slick/slick.min.js'; ?>"></script>

<script type="text/javascript" src="/attachments/js/detail.js"></script>


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