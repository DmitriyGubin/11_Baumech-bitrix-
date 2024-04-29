<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "BAUMECH-Диллеры");
$APPLICATION->SetTitle("BAUMECH-Диллеры");

use Bitrix\Main\Page\Asset;
Asset::getInstance()->addCss("/dealers/css/styles.css");
Asset::getInstance()->addCss("/dealers/css/media.css");

?>

<script type="text/javascript" src="https://api-maps.yandex.ru/2.1/?apikey=e5df13fe-7b6a-4037-9699-cddff13aa624&amp;lang=ru_RU"></script>

<section class="dillers wrap">
	<h2 class="main-title">Дилерская сеть BAUMECH</h2>
	<?php 
		require_once($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH.'/includes/diller-map.php');
	?>
	<div class="dillers-sect">
		<h3 class="main-title">Список дилеров</h3>
		<div class="dillers-list">
		<?php foreach ($offices as $off_item): ?>
			<div class="ofice-item">
				<div class="city">
				<?php
					$city_name = $off_item['fields']['NAME'];
					if($city_name == 'BAUMECH')
					{
						$city_name = 'Новосибирск';
					}
				?>
					<span class="city-name"><?= $city_name; ?></span>
					<?php if($off_item['props']['HOME_OR_NOT']['VALUE'] == 'YES'): ?>
						<span class="no-line">[Производство BAUMECH]</span>
					<?php endif ?>
				</div>
				<p class="addres"><?= $off_item['props']['ADDRESS']['VALUE']; ?></p>
				<?php foreach ($off_item['props']['PHONE']['VALUE'] as $phone): ?>
					<a class="phone"><?= $phone; ?></a>
				<?php endforeach; ?>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>

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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>