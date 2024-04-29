<?php
$models = Return_All(
	Array("IBLOCK_ID"=>5, "ACTIVE"=>"Y", "PROPERTY_UNDER_MAP_REF_VALUE" => 'YES'),
	Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PROPERTY_AUTO_MODEL", "PROPERTY_AUTO_TYPE")
);
?>

<div class="button-line">
	<?php foreach ($models as $model_item): ?>
		<a href="<?= $model_item['DETAIL_PAGE_URL'] ?>" class="dark-blue-button">
			<span><?= $model_item['PROPERTY_AUTO_TYPE_VALUE']; ?></span>
			&nbsp;
			<span style="text-transform: uppercase;"><?= $model_item['PROPERTY_AUTO_MODEL_VALUE']; ?></span>
		</a>
	<?php endforeach; ?>
</div> 