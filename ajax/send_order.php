<?php

require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");

$arResult = array('status' => false);

foreach ($_POST as $key => $value) 
{
	$_POST[$key] = trim($value);
}

$date = date_create();
date_modify($date, '4 hour');
$date = date_format($date, 'd.m.Y H:i:s');

$PROP = array();
$PROP['HTTP_REFERER'] = $_SERVER['HTTP_REFERER'];
$PROP['DATE'] = $date;
$PROP['PHONE'] = $_POST['phone'];
$PROP['NAME'] = $_POST['name'];

if($_POST['popup-separator'] == 'Скачать каталог')
{
	if(CEvent::Send("DOWNLOAD_CATALOG", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Подобрать оборудование')
{
	if(CEvent::Send("CHOOSE_EQUIPMENT", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Консультация менеджера по технике')
{
	if(CEvent::Send("MANAGER_CONSULT", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Коммерческое предложение')
{
	if(CEvent::Send("COMMERCIAL_OFFER", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Заказ звонка контакты')
{
	if(CEvent::Send("CALL_QUESTIONS", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Узнать стоимость')
{
	if(CEvent::Send("FIND_COST", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}
else if($_POST['popup-separator'] == 'Обратный звонок из мобильного меню')
{
	if(CEvent::Send("CALL_ORDER_MOBILE", "s1", $PROP))
	{
		$arResult['status'] = true;
	}
}




echo json_encode($arResult);