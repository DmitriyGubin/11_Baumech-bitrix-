/***мобильное меню***/
var open_mobile_button = document.querySelector("#open-mobile-menu-button");
var menu_box = document.querySelector("header .menu-box");
var close_mobile_button = document.querySelector("#close-mobile-menu");
var mobile_shade = document.querySelector(".mobile-shade");
var menu_lis_mobile = document.querySelectorAll("header .menu-list li");

open_mobile_button.addEventListener('click', Open_Mobile_Menu);
close_mobile_button.addEventListener('click', Close_Mobile_Menu);
mobile_shade.addEventListener('click', Close_Mobile_Menu);

if(screen.width < 1000)
{
	for(let item of menu_lis_mobile)
	{
		item.addEventListener('click', Close_Mobile_Menu);
	}
}


function Open_Mobile_Menu()
{
	menu_box.classList.remove('hide');
	mobile_shade.classList.remove('hide');
	setTimeout(function() {
		menu_box.classList.add('active');
	}, 100);
}

function Close_Mobile_Menu()
{
	menu_box.classList.remove('active');
	mobile_shade.classList.add('hide');
	setTimeout(function() {
		menu_box.classList.add('hide');
	}, 500);
}
/***мобильное меню***/

/******Прокрутка вверх по клику**********/
var scroll_button = document.querySelector("#scroll-up");

scroll_button.addEventListener("click", function(){
	window.scrollTo({
		top: 0,
		left: 0,
		behavior: 'smooth'
	});
});

var delta_scroll = 600;

window.addEventListener('scroll', function(){
	let offset_y = window.pageYOffset;
	if(offset_y > delta_scroll)
	{
		scroll_button.classList.remove('hide');
	}
	else
	{
		scroll_button.classList.add('hide');
	}
});


/******Прокрутка вверх по клику**********/


/*********Попапы кнопок************/
var pop_up_buttons = document.querySelectorAll('.all-popup-button');
$("#popup-phone").mask("+7(999) 999-9999");
if(pop_up_buttons.length != 0)
{
	$('.all-popup-button').fancybox({
    afterLoad : function(){
    		$("#pop-up").removeClass('fadeOutDown');
            $("#pop-up").addClass('fadeInUp');	
        },
    beforeClose : function(){
    		$("#pop-up").removeClass('fadeInUp');
            $("#pop-up").addClass('fadeOutDown');	
        }
	});
}

var popup_title = document.querySelector("#pop-up .pop-up-title");
var error_ban = document.querySelector('#pop-up .error-bun');
var form_box = document.querySelector('#pop-up .form-box');
var success_box = document.querySelector('#pop-up .success-box');
var form_separator = document.querySelector('#pop-up #form-separator');

function Init_Popup(popup_name, popup_delimiter)
{
	$(success_box).addClass("hide");
	$(form_box).removeClass("hide");
	popup_title.innerHTML = popup_name;
	form_separator.value = popup_delimiter;
}

document.querySelector('#send-popup-form').addEventListener("click", Send_Order_Pop_Up);

function Send_Order_Pop_Up(event)
{
	event.preventDefault();
	var err=0;
	var arr = ['.name-input-box-popup',
	'.phone-input-box-popup'
	];

	err = Validate(arr);

	if(err != 0)
	{
		$(error_ban).removeClass("hide");
	}
	else
	{
		$(error_ban).addClass("hide");
	}

	if (err == 0)
	{
		// setTimeout(function() {
		// 		window.location.href = 'https://dzen.ru/';
		// }, 1000);

		$.ajax({
			type: "POST",
			url: '/ajax/send_order.php',
			data: {
				'name': $("#popup-name").val(),
				'phone': $("#popup-phone").val(),
				'popup-separator': $("#form-separator").val()
			},
			dataType: "json",
			success: function(data){

				if (data.status == true)
				{
					$(form_box).addClass("hide");
					$(success_box).removeClass("hide");

					for (let item of arr) 
					{
						$(item + ' input').val('');
					}
				}
			}
		});
	}
}

function Validate(arr)
{
	var err=0;

	for (let item of arr)
	{
		let bool = ($(item + ' input').val() == '');
		
		if (bool)
		{
			err++;
			$(item).addClass("hasError");
		} 
		else 
		{
			$(item).removeClass("hasError");
		}
	}

	return err;
}

/*********Попапы кнопок************/


/**********Формы на сайте*************/
var form_banner_error = document.querySelector(".form-banner-error");
var form_banner_error_close = document.querySelector(".form-banner-error #close-form-banner-error");
var pop_up_success_button_ref = document.querySelector("#pop-up-success-button");

form_banner_error_close.addEventListener('click', function(){
	form_banner_error.classList.add('hide');
})

function Send_Order_Form(event, arr_input_box_selectors, form_title)
{
	event.preventDefault();
	var err=0;

	err = Validate(arr_input_box_selectors);

	if(arr_input_box_selectors.length == 1)
	{
		var phone_selector = arr_input_box_selectors[0] + ' input';
		var name_selector = phone_selector;
	}
	else
	{
		var name_selector = arr_input_box_selectors[0] + ' input';
		var phone_selector = arr_input_box_selectors[1] + ' input';
	}
	

	if(err > 0)
	{
		form_banner_error.classList.remove('hide');
		setTimeout(function() {
			form_banner_error.classList.add('hide');
		}, 5000);
	}
	else
	{
		// setTimeout(function() {
		// 		window.location.href = 'https://dzen.ru/';
		// }, 1000);

		$.ajax({
			type: "POST",
			url: '/ajax/send_order.php',
			data: {
				'name': $(name_selector).val(),
				'phone': $(phone_selector).val(),
				'popup-separator': form_title
			},
			dataType: "json",
			success: function(data){

				if (data.status == true)
				{
					form_banner_error.classList.add('hide');
					for (let item of arr_input_box_selectors) 
					{
						$(item + ' input').val('');
					}

					$(pop_up_success_button_ref).click();
				}
			}
		});
	}
}
/**********Формы на сайте*************/

document.querySelector("#call-back-mobile").addEventListener('click', () => Init_Popup('Оставьте заявку и наш менеджер свяжется с вами', 'Обратный звонок из мобильного меню'));
