<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<?php 
	$j=0;
	$num_visible_links = 4;
	// debug($arResult);
?>

<ul class="menu-list">
<?foreach($arResult as $arItem): ?>
<?php 
	$j++; 
	$bool = ($arItem["LINK"][1] == '#');
	$bool_visible = ($j > $num_visible_links);
?>
<li class="<?= $bool_visible?'hide_this':null; ?>">
	<a class="<?= $bool?'smoth_link':null; ?>" href="<?= $arItem["LINK"]; ?>"><?=$arItem["TEXT"]?></a>
</li>
<?endforeach?>
</ul>

<?endif?>

						