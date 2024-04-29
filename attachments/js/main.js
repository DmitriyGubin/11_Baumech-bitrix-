/************переключатель категорий**************/
Switch(".attach .catygory-item", "active");

function Switch(selector, modify_class)
{
	var elements = document.querySelectorAll(selector);
	for(let item of elements)
	{
	   item.addEventListener("click", function(){

	        for(let itemm of elements)
	        {
	            itemm.classList.remove(modify_class);
	        }
		    item.classList.add(modify_class);
		    let item_name = item.innerHTML;
		    if(item_name == 'Все')
		    {
		    	item_name = '(все)';
		    }
		    Clear_Bitrix_Select('[name="arrFilter_pf[PRODUCT_SEC][]"] option');
		    Input_Bitrix_Select(item_name,'[name="arrFilter_pf[PRODUCT_SEC][]"] option');
			document.querySelector('#set-filter').click();
		});
	}
}

function Input_Bitrix_Select(option_name,options_selector)
{
	var bitrix_opts = document.querySelectorAll(options_selector);
	for(let option of bitrix_opts)
	{
		if(option.innerHTML == option_name)
		{
			option.selected = true;
		}
	}
}


function Clear_Bitrix_Select(options_selector)
{
	var bitrix_opts = document.querySelectorAll(options_selector);
	for(let option of bitrix_opts)
	{
		option.selected = false;
	}
}

/************переключатель категорий**************/


/**********переключатель модели**********/
var clear_all_button_box = document.querySelector('.attach .clear-all-button');
var model_button = document.querySelector('.attach .model-butt');
var hide_model_box = document.querySelector('.attach .model-vars-box');
var insert_models_heree = document.querySelector('.selected-cleare .all-models');
var model_var_items_ref = document.querySelectorAll('.attach .model-var-item');
var model_arrow = document.querySelector('.attach .model-arrow');
var filter_vars = document.querySelectorAll('.attach .filter-var-item');

Switch_Models(model_var_items_ref, 'active', insert_models_heree, '.attach .selected-model-item.model', '#cleare-filter', filter_vars);

model_button.addEventListener("click", function(){
	hide_model_box.classList.toggle('hide');
	model_arrow.classList.toggle('active');
	Click_Out_Filter(hide_model_box, 'hide', 'mark-class', model_arrow, 'active');
	if(!hide_sort_box.classList.contains('hide'))
	{
		hide_sort_box.classList.add('hide');
		sort_arrow_mobile.classList.remove('active');
	}
});


function Click_Inserted_Models(inserted_models_selector, cleare_filter_selector, model_var_ref, modify_class)
{
	inserted_models_ref = document.querySelectorAll(inserted_models_selector);
	for(let item of inserted_models_ref)
	{
		item.addEventListener("click", function(){
			let model_name = item.querySelector('.inserted-model-name').innerHTML;
			item.remove();
			let new_inserted_models_ref = document.querySelectorAll(inserted_models_selector);
			if(new_inserted_models_ref.length == 1)
			{
				document.querySelector(cleare_filter_selector).remove();
			}
			Remome_Galka_Click_Inserted_Models(model_name, model_var_ref, modify_class);
			Remome_Bitrix_Selected_One(model_name, '[name="arrFilter_pf[AUTO_MODELS][]"] option');
			document.querySelector('#set-filter').click();
		});
	}
}

function Remome_Galka_Click_Inserted_Models(model_name, model_var_ref, modify_class)
{
	for(let item of model_var_ref)
	{
		let model_name_from_list = item.querySelector('.model-name').innerHTML;
		if(model_name == model_name_from_list)
		{
			item.classList.remove(modify_class);
		}
	}
}

function Remome_Bitrix_Selected_One(option_name, options_selector)
{
	var bitrix_opts = document.querySelectorAll(options_selector);
	for(let option of bitrix_opts)
	{
		if(option.innerHTML == option_name)
		{
			option.selected = false;
		}
	}
}

function Click_Out_Filter(hide_box_ref, hide_class, mark_class, arrow_reff, active_arrow_class)
{
	document.onclick = function (e) {
		let all_classes = e.target.className;
		//console.log(all_classes);
		if (!all_classes.includes(mark_class))
		{
			if(!hide_box_ref.classList.contains(hide_class))
			{
				hide_box_ref.classList.add(hide_class);
				arrow_reff.classList.remove(active_arrow_class);
			}
		}
	};
}

function Switch_Models(model_var_ref, modify_class, insert_models_here, inserted_models_selector, cleare_filter_selector, filter_var_ref)
{
	for(let item of model_var_ref)
	{
	   item.addEventListener("click", function(){
		    item.classList.toggle(modify_class);
		    let models_names = All_Selected_Models_Name(model_var_ref, modify_class);
		    Clear_Bitrix_Select('[name="arrFilter_pf[AUTO_MODELS][]"] option');
		    Input_Bitrix_Select_All(models_names,'[name="arrFilter_pf[AUTO_MODELS][]"] option');
		    document.querySelector('#set-filter').click();
		   	Insert_Models(models_names,insert_models_here, model_var_ref, modify_class, filter_var_ref);
		   	Click_Inserted_Models(inserted_models_selector, cleare_filter_selector, model_var_ref, modify_class);
		});
	}
}

function Input_Bitrix_Select_All(option_names,options_selector)
{
	var bitrix_opts = document.querySelectorAll(options_selector);
	for(let option of bitrix_opts)
	{
		for(let visible_ops of option_names)
		{
			if(option.innerHTML == visible_ops)
			{
				option.selected = true;
			}
		}
	}
}

function All_Selected_Models_Name(elements_ref, active_class)
{
	let mass_names = [];
	let j = 0;
	for(let item of elements_ref)
	{
		if(item.classList.contains(active_class))
		{
			mass_names[j] = item.querySelector('.model-name').innerHTML;
			j++;
		}
	}

	return mass_names;
}

function Insert_Models(models_arr, insert_here_ref, model_var_ref, modify_class, filter_var_ref)
{
	let all_text='';
	for(let item of models_arr)
	{
		all_text+=`
			<div class="selected-model-item model common">
    			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 371.23 371.23" style="enable-background:new 0 0 371.23 371.23;" xml:space="preserve">
    				<polygon points="371.23,21.213 350.018,0 185.615,164.402 21.213,0 0,21.213 164.402,185.615 0,350.018 21.213,371.23 185.615,206.828 350.018,371.23 371.23,350.018 206.828,185.615 "/>
    			</svg>
    			<span class="inserted-model-name">${item}</span>
    		</div>
		`;
	}

	insert_here_ref.innerHTML = all_text;

	Draw_Clear_All_Text(model_var_ref, modify_class, filter_var_ref);
}

function Draw_Clear_All_Text(model_var_ref, modify_class, filter_var_ref)
{
	var elements = document.querySelectorAll('.common');
	clear_all_button_box.innerHTML = '';
	if(elements.length > 1)
	{
		clear_all_button_box.innerHTML = `<div id="cleare-filter">Очистить все</div>`;
		document.querySelector('#cleare-filter').addEventListener("click", () => Cleare_All_Filters(model_var_ref, modify_class, filter_var_ref));
	}
}

function Cleare_All_Filters(model_var_ref, modify_class, filter_var_ref)
{
	document.querySelector('.selected-cleare .all-models').innerHTML = '';
	document.querySelector('.selected-cleare .additional-fields').innerHTML = '';
	document.querySelector('.selected-cleare .clear-all-button').innerHTML = '';

	for(let item of model_var_ref)
	{
		item.classList.remove(modify_class);
	}

	for(let item of filter_var_ref)
	{
		item.classList.remove(modify_class);
	}

	sort_select_value.innerHTML = 'Порядок: по умолчанию';
	search_field.value = '';
	Unset_Sort('ACTIVE_FROM---DESC');
}

function Unset_Sort(sort_variant)
{
	$.ajax({
		type: "POST",
		url: 'ajax/set_sort.php',
		data: {
			'sort_var': sort_variant
		},
		dataType: "json",
		success: function(dataa){
			if (dataa.status == true)
			{
				document.querySelector('#delete-filter').click();
			}
		}
	});
}
/**********переключатель модели**********/


/**********переключатель сортировки**********/
var sort_button = document.querySelector('.attach .sort-butt');
var hide_sort_box = document.querySelector('.attach .filter-vars-box');
var sort_select_value = document.querySelector('#sort-select-value');
var sort_button_mobile = document.querySelector('.attach .sort-butt-mobile');
var sort_arrow_mobile = document.querySelector('.attach .sort-mobile-arrow');

sort_button.addEventListener("click", function(){
	hide_sort_box.classList.toggle('hide');
	Click_Out_Filter(hide_sort_box, 'hide', 'mark-class', sort_arrow_mobile, 'active');
	if(!hide_model_box.classList.contains('hide'))
	{
		hide_model_box.classList.add('hide');
	}
});

sort_button_mobile.addEventListener("click", function(){
	hide_sort_box.classList.toggle('hide');
	sort_arrow_mobile.classList.toggle('active');
	Click_Out_Filter(hide_sort_box, 'hide', 'mark-class',sort_arrow_mobile, 'active');
	if(!hide_model_box.classList.contains('hide'))
	{
		hide_model_box.classList.add('hide');
		model_arrow.classList.remove('active');
	}
});

Switch_Sorts(filter_vars, 'active', sort_select_value);

function Switch_Sorts(filter_vars, modify_class, insert_here_reff)
{
	for(let item of filter_vars)
	{
	   item.addEventListener("mouseover", function(){
	   		for(let itemm of filter_vars)
	        {
	            itemm.classList.remove(modify_class);
	        }
	   })

	   item.addEventListener("click", function(){
		    item.classList.add(modify_class);
		    insert_here_reff.innerHTML = item.innerHTML;
		    Set_Sort(item.id);
		});
	}
}

function Set_Sort(sort_variant)
{
	$.ajax({
		type: "POST",
		url: 'ajax/set_sort.php',
		data: {
			'sort_var': sort_variant
		},
		dataType: "json",
		success: function(dataa){
			if (dataa.status == true)
			{
				document.querySelector('#set-filter').click();
			}
		}
	});
}

/**сброс сортировки при загрузке страницы**/
document.querySelector('#ACTIVE_FROM---DESC').click();
/**сброс сортировки при загрузке страницы**/

/**********переключатель сортировки**********/

/**********поисковая строка*******/
var insert_here_search = document.querySelector('.selected-cleare .additional-fields');
var search_field = document.querySelector('#filt-search-input');
var loopa_button = document.querySelector('#search-string-button');

search_field.addEventListener('input', function(){
	document.querySelector('[name="arrFilter_pf[PRODUCT_NAME]"]').value = this.value;
});

loopa_button.addEventListener('click', function(){
	var inp_text = search_field.value.trim();
	if(inp_text != '')
	{
		insert_here_search.innerHTML = `
			<div class="selected-model-item search common">
		    	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 371.23 371.23" style="enable-background:new 0 0 371.23 371.23;" xml:space="preserve">
		    		<polygon points="371.23,21.213 350.018,0 185.615,164.402 21.213,0 0,21.213 164.402,185.615 0,350.018 21.213,371.23 185.615,206.828 350.018,371.23 371.23,350.018 206.828,185.615 "/>
		    	</svg>
		    	<span>Поиск:&#160;</span>
		    	<span>${inp_text}</span>
		    </div>
		`;

		Draw_Clear_All_Text(model_var_items_ref, 'active', filter_vars);

		document.querySelector('#set-filter').click();
		var search_boxx = document.querySelector('.selected-model-item.search');
		search_boxx.addEventListener('click', function(){
			this.remove();
			Draw_Clear_All_Text(model_var_items_ref, 'active', filter_vars);
			search_field.value = '';
			document.querySelector('[name="arrFilter_pf[PRODUCT_NAME]"]').value = '';
			document.querySelector('#set-filter').click();
		})
	}
});
/**********поисковая строка*******/

/*********открытие фильтра мобильная версия**************/
var mobile_filter_show_button = document.querySelector('.attach #show-filters');
var model_box = document.querySelector('.attach .model-box');
var sort_box = document.querySelector('.attach .sort-box');
var filter_box = document.querySelector('.attach .filter-box');
var mobile_filt_loopa = document.querySelector('.attach #mobile-filt-loopa');
var search_box = document.querySelector('.attach .search-box');

mobile_filter_show_button.addEventListener("click", function(){
	model_box.classList.toggle('show');
	sort_box.classList.toggle('show');
});

mobile_filt_loopa.addEventListener("click", function(){
	search_box.classList.toggle('show');
});
/*********открытие фильтра мобильная версия**************/


/**************чуредование картинок при наводке на товар*************/

Change_Img_Product( document.querySelectorAll('.attach .cat-img-box'),
					'.small-img', '.big-img', 'hide');

/**************чуредование картинок при наводке на товар*************/

BX.addCustomEvent('onAjaxSuccess', function() 
{
   Change_Img_Product( document.querySelectorAll('.attach .cat-img-box'),
					'.small-img', '.big-img', 'hide');
   Counter_Products();
});

var couner_box = document.querySelector('.attach .amount');
var amount_box = document.querySelector('#amount-equipment');
var first_amount = document.querySelectorAll('.attach .catalog-item').length;
var no_items_box = document.querySelector('.attach .no-items');

function Counter_Products()
{
	var el_amount = document.querySelectorAll('.attach .catalog-item').length;
	if((el_amount > 0) && (el_amount != first_amount))
	{
		no_items_box.classList.add('hide');
		couner_box.classList.remove('hide');
		amount_box.innerHTML = el_amount;
	}
	else if(el_amount == 0)
	{
		couner_box.classList.add('hide');
		no_items_box.classList.remove('hide');
	}
	else if(el_amount == first_amount)
	{
		couner_box.classList.add('hide');
		no_items_box.classList.add('hide');
	}
}




