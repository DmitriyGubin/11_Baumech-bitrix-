<?php 

function debug($data)
{
	echo '<pre>'.print_r($data, 1).'</pre>';
}

function Check_Main_Page()
{
	$this_url = $_SERVER['REQUEST_URI'];
	$one_var = ($this_url[0] == '/') && ($this_url[1] == '');
	$two_var = ($this_url[0] == '/') && ($this_url[1] == '?');
	$bool = $one_var || $two_var;
	return $bool;
}

function Main_Or_Detail_Page($url)
{
	$this_url = $_SERVER['REQUEST_URI'];
	$bool = (
		($this_url == "/$url/") || 
		(strpos($this_url, "$url/?") != false)
	);
	return $bool;
}

// $feature = Return_All(
// 			Array("IBLOCK_ID"=>6, "ACTIVE"=>"Y", 'IBLOCK_SECTION_ID' => $feature_sec_id),
// 			Array("ID", "IBLOCK_ID", "NAME", "PROPERTY_ARROW_X", "PROPERTY_ARROW_Y", "PROPERTY_WINDOW_X", "PROPERTY_WINDOW_Y", "PROPERTY_DESCR_FEATURE")
// 		);

function Return_All($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		while($ob = $res->GetNextElement())
		{
			$result[] = $ob->GetFields();
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_All_Fields_Props($Filter,$Select)
{
	if(CModule::IncludeModule("iblock"))
	{ 
		$res = CIBlockElement::GetList(
	            Array(), //сортировка данных
	            $Filter, //фильтр данных
	            false, //группировка данных
	            false, // постраничная навигация
	            $Select
	        );

		$result = [];
		$j=0;
		while($ob = $res->GetNextElement())
		{
			$result[$j]['fields'] = $ob->GetFields();
			$result[$j]['props'] = $ob->GetProperties();
			$j++;
		}
		return $result;
	}
	else
	{
		return 'Error';
	}
}

function Return_List_Variants($iblock_id, $prop_code)
{
	if(CModule::IncludeModule("iblock"))
	{
		$property_enums = CIBlockPropertyEnum::GetList(
			Array(), 
			Array("IBLOCK_ID"=>$iblock_id, "CODE"=>$prop_code)
		);

	  $props = [];//получаем список возможных свойств
	  while($enum_fields = $property_enums->GetNext())
	  {
	  	$props[] = $enum_fields['VALUE'];
	  }
	  return $props;
	}
	else
	{
		return 'Error';
	}
}

function Make_Random_Interval_Arr($all_amount, $interval_amount)
{
	$result_arr = [];
	if($all_amount < $interval_amount)
	{
		for ($i = 0; $i <= ($all_amount - 1); $i++)
		{
			$result_arr[] = $i;
		}
	}
	else
	{
		$all_int = floor($all_amount/$interval_amount);
		$this_int = mt_rand(1, $all_int);	
		$first_num = ($this_int-1)*$interval_amount;
		for ($i = 0; $i <= ($interval_amount - 1); $i++)
		{
			$result_arr[] = $first_num + $i;
		}
	}
	return $result_arr;
}


?>