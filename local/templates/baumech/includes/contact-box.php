<?php

$offices = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y", 'PROPERTY_HOME_OR_NOT_VALUE' => 'YES'),
	Array()
);

$main_ofice = [];

foreach ($offices as $off_itemm) 
{
	if($off_itemm['props']['HOME_OR_NOT']['VALUE'] == 'YES')
	{
		$main_ofice[] = $off_itemm;
		break;
	}
}

//debug($main_ofice);

?>

<div class="offices-box-home" style="display: none;">
	<?php foreach ($offices as $off_item): ?>
	<div class="city_item">
		<p class="off_name"><?= $off_item['fields']['NAME']; ?></p>
		<p class="off_lat"><?= $off_item['props']['LAT']['VALUE']; ?></p>
		<p class="off_long"><?= $off_item['props']['LONG']['VALUE']; ?></p>
		<p class="off_ballon"><?= $off_item['props']['BALLOON_TEXT']['~VALUE']; ?></p>

		<p class="off_type"><?= $off_item['props']['HOME_OR_NOT']['VALUE'] == 'YES'?'home':'government'; ?></p>

		<?php foreach ($off_item['props']['PHONE']['VALUE'] as $phone_item): ?>
			<p class="phone"><?= $phone_item; ?></p>
		<?php endforeach; ?>
	</div>
	<?php endforeach; ?>
</div>

<div class="contact-box">
	<div class="left-text">
		<div class="contact-item">
			<div>Адрес производства:</div>
			<div>
				<span><?= $main_ofice[0]['props']['POSTCODE']['VALUE']; ?></span>
				, г.
				<span><?= $main_ofice[0]['props']['CITY']['VALUE']; ?></span>
				,
				<br>
				<span><?= $main_ofice[0]['props']['ADDRESS']['VALUE']; ?></span>
			</div>
		</div>

		<div class="contact-item">
			<div>Часы работы:</div>
			<div>
				<?= $main_ofice[0]['props']['OPENING_HOURS']['~VALUE']; ?>
			</div>
		</div>

		<div class="contact-item">
			<div>Телефон:</div>
			<div>
			<?php foreach ($main_ofice[0]['props']['PHONE']['VALUE'] as $phone_item): ?>
				<a href="tel:<?= $phone_item ?>"><?= $phone_item ?></a><br>
			<?php endforeach; ?>
			</div>
		</div>

		<?php $mail = $main_ofice[0]['props']['EMAIL']['VALUE']; ?>
		<div class="contact-item">
			<div>Почта:</div>
			<div>
				<a href="mailto:mail:<?= $mail; ?>" target="_blank" ><?= $mail; ?></a>
			</div>
		</div>

		<h3 class="quest one">Остались вопросы?</h3>
		<h3 class="quest">Закажите обратный звонок</h3>

		<form class="call-form-contacts">
			<div class="phone-input-box">
				<input id="phone-contacts-form" type="text" placeholder="Телефон">
				<div class="error-box hide">
					Обязательное поле
					<div class="for-triangle">
						<div class="triangle"></div>
					</div>
				</div>
			</div>
			<button id="call-order-contacts" class="dark-blue-button">Заказать звонок</button>
		</form>
	</div>

	<div id="contact-map"></div>
</div>


<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/includes/contact-box.js' ?>"></script>
