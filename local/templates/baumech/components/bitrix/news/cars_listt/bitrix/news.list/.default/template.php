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
?>

<section id="models-line-scroll" class="head-cars wrap">
<?foreach($arResult["ITEMS"] as $arItem):?>

<?php 
  $hit = ($arItem['PROPERTIES']['HIT_OR_NOT']['VALUE'] == 'YES');
  $new = ($arItem['PROPERTIES']['NEW_OR_NOT']['VALUE'] == 'YES');
  $detail = $arItem['DETAIL_PAGE_URL'];
 ?>

<div class="head-cars-item">
  <div>
    <div class="cars-name-box">
      <?php if($hit): ?>
        <span class="heat-mark">ХИТ ПРОДАЖ</span>
      <?php endif; ?>

      <?php if($new): ?>
        <span class="heat-mark">НОВИНКА</span>
      <?php endif; ?>

      <h2 class="cars-name">
        <?= $arItem['NAME']; ?>
      </h2>
    </div>

    <a class="car-img-box" href="<?= $detail; ?>">
      <img class="car-img" src="<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>">
    </a>
  </div>

  <div>

<?php 
  $old_price = $arItem["PROPERTIES"]["PRICE_OLD"]["VALUE"];
?>

<?php if($old_price != ''): ?>
    <div class="price-line old">
      <h2 class="price"><?= number_format($old_price, 0, '.', ' '); ?></h2>
      <h2 class="valuta">₽</h2>
    </div>
<?php endif; ?>

    <div class="price-line new">
      <h2 class="price"><?= number_format($arItem["PROPERTIES"]["PRICE_FROM"]["VALUE"], 0, '.', ' '); ?></h2>
      <h2 class="valuta">₽</h2>
    </div>
    
    <div class="about-text">
      <?= $arItem['~PREVIEW_TEXT']; ?>
    </div>

    <a class="more-info-cars" href="<?= $detail; ?>">
      Подробнее
    </a>
  </div>
</div>

<?php endforeach; ?>

</section>