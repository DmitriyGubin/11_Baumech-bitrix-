<?php

$offices = Return_All_Fields_Props(
	Array("IBLOCK_ID"=>8, "ACTIVE"=>"Y"),
	Array()
);

//debug($offices);

?>

<div class="offices-box" style="display: none;">
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

<div id="diller-map"></div>

<script type="text/javascript" src="<?= SITE_TEMPLATE_PATH.'/includes/diller-map.js' ?>"></script> 