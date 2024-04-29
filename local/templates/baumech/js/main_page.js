Menu_Smooth_Lincs('.menu-list .smoth_link');

 $('.slider-documents').slick({
 	dots: false,
 	// autoplay: true,
 	fade: true,
 	prevArrow: '<div class="prev-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>',
 	nextArrow: '<div class="next-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>'
 });


 // $('.head-slider').slick({
 // 	dots: false,
 // 	autoplay: true,
 // 	arrows : false
 // });

 $('.price-slider').slick({
 	dots: false,
 	autoplay: true,
 	arrows : false,
 	asNavFor: '.head-car-slider',
 });

 $('.head-car-slider').slick({
 	dots: false,
 	fade: true,
 	autoplay: true,
 	arrows : false,
 	asNavFor: '.price-slider',
 });


/*******слайдер-галерея-видео***********/
var mobile_videos = document.querySelectorAll('.reviews .reviews-item');
First_Gallery_Slider_Init(1000);

window.addEventListener('resize', function(){
	First_Gallery_Slider_Init(1000);
});

function First_Gallery_Slider_Init(screen_width)
{
	if(screen.width < screen_width)
	{
		$('.slider-gallery-mobile').slick({
	 		dots: false,
	 		fade: true,
	 		prevArrow: '<div class="prev-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>',
	 		nextArrow: '<div class="next-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>'
	 	});

	 	$('.reviews-slider').slick({
	 		dots: false,
	 		fade: true,
	 		prevArrow: '<div class="prev-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>',
	 		nextArrow: '<div class="next-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>'
	 	});

	 	for(let item of mobile_videos)
	 	{
	 		let play_button = item.querySelector('.play-button');
	 		let preview_img = item.querySelector('.mobile-preview');
	 		let iframee = item.querySelector('iframe');

	 		play_button.addEventListener('click', function() {
		 		preview_img.classList.add('hide');
		 		iframee.classList.add('show');
		 		// $(iframee).click();
		 	});
	 	}
	}
}
/*******слайдер-галерея-видео***********/


/*********Попапы формы************/
$("#phone-consult").mask("+7(999) 999-9999");
$("#phone-commerce").mask("+7(999) 999-9999");
$("#phone-commerce").mask("+7(999) 999-9999");

var consult_form_arr = ['.consult .name-input-box',
	'.consult .phone-input-box'
];
var commerce_form_arr = ['.commerce .name-input-box',
	'.commerce .phone-input-box'
];

document.querySelector("#send-consult-form-tech").addEventListener('click', () => Send_Order_Form(event, consult_form_arr,'Консультация менеджера по технике'));
document.querySelector("#send-consult-form-commerce").addEventListener('click', () => Send_Order_Form(event, commerce_form_arr,'Коммерческое предложение'));

/*********Попапы формы************/

/**********Попапы*********/
document.querySelector("#load-catalog").addEventListener('click', () => Init_Popup('Оставьте заявку и получите полный каталог с ценами!', 'Скачать каталог'));
document.querySelector("#pick-up-equipment").addEventListener('click', () => Init_Popup('Оставьте заявку и получите коммерческое предложение!', 'Подобрать оборудование'));
document.querySelector("#load-catalog-mobile").addEventListener('click', () => Init_Popup('Оставьте заявку и получите полный каталог с ценами!', 'Скачать каталог'));
/**********Попапы*********/




