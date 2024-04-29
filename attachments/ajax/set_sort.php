<?php

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');//раньше без этого работало???

session_start();
$arResult = array('status' => false);

if($_POST['sort_var'] != '')
{
	$arr = explode('---', $_POST['sort_var']);
	$_SESSION['prop_sort'] = $arr[0];
	$_SESSION['type_sort'] = $arr[1];
	$arResult['status'] = true;
}

echo json_encode($arResult);




