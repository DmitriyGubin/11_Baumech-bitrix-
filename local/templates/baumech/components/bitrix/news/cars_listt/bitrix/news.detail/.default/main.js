$('.slider-equip').slick({
			dots: false,
			infinite: true,
			variableWidth: true,
			slidesToShow: 4,
			slidesToScroll: 1,
			prevArrow: '<div class="prev-photo"><svg role="presentation" focusable="false" style="display: block" viewBox="0 0 27 38" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="10" points="5,5 19,19 5,33"></polyline></svg></div>',
			nextArrow: '<div class="next-photo"><svg role="presentation" focusable="false" style="display: block" viewBox="0 0 27 38" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><polyline fill="none" stroke="#ffffff" stroke-linejoin="butt" stroke-linecap="butt" stroke-width="10" points="5,5 19,19 5,33"></polyline></svg></div>'
		});


/**********галерея********/
$('[data-fancybox="gallery"]').fancybox({
    loop: true,
    arrows: true,
    infobar: false,
    buttons: [
	   "zoom",
	   "close"
	],
	animationEffect: false,
	transitionEffect: "slide",
	hideScrollbar: true,
	zoom: true,
	btnTpl: {
        arrowLeft:
        '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">' +
        '<svg class="gallery-arrow-left" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L11 1" stroke="#303239" stroke-linecap="round" stroke-linejoin="round"></path></svg>' +
        "</button>",
        arrowRight:
        '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">' +
        '<svg class="gallery-arrow-right" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L11 1" stroke="#303239" stroke-linecap="round" stroke-linejoin="round"></path></svg>' +
        "</button>",
        zoom:
        '<button id="zoom-button" data-fancybox-zoom="" class="fancybox-button fancybox-button--zoom" title="Zoom">'+
        '<svg class="icon-increase" width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.832 22L17.8592 17.0273" stroke="#000000" stroke-width="2" stroke-linecap="square"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M4.58591 3.7511C0.917768 7.41924 0.917768 13.367 4.58591 17.0352C8.25405 20.7033 14.2019 20.7033 17.87 17.0352C21.5381 13.367 21.5381 7.41924 17.87 3.7511C14.2019 0.0829653 8.25405 0.0829653 4.58591 3.7511Z" stroke="#000000" stroke-width="2"></path><path d="M6.25781 10.3931H16.2035" stroke="#000000" stroke-width="2"></path><path d="M11.2305 15.3662V5.42053" stroke="#000000" stroke-width="2"></path></svg>'+
        '<svg class="icon-decrease hide" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.9961 22L17.0233 17.0273" stroke="#000000" stroke-width="2" stroke-linecap="square"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M3.74997 3.7511C0.0818308 7.41924 0.0818308 13.367 3.74997 17.0352C7.41811 20.7033 13.3659 20.7033 17.0341 17.0352C20.7022 13.367 20.7022 7.41924 17.0341 3.7511C13.3659 0.0829653 7.41811 0.0829653 3.74997 3.7511Z" stroke="#000000" stroke-width="2"></path><path d="M5.41797 10.3931H15.3637" stroke="#000000" stroke-width="2"></path></svg>'+
   		'</button>',
   		 close:
        '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
        '<svg id="close-galery" width="20" height="20" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.41421 -0.000151038L0 1.41406L21.2132 22.6273L22.6274 21.2131L1.41421 -0.000151038Z" fill="#000000"></path><path d="M22.6291 1.41421L21.2148 0L0.00164068 21.2132L1.41585 22.6274L22.6291 1.41421Z" fill="#000000"></path></svg>' +
        "</button>",
    },
});

// console.log(document.querySelector("#zoom-button"));

// document.querySelector(".fancybox-button.fancybox-button--zoom").addEventListener('click', function() {
// 	console.log(777);
// });
/**********галерея********/

/***Появление свойств машины***/
var buttons_boxes = document.querySelectorAll('.capability .arrow-box');

for (let item of buttons_boxes)
{
    let button = item.querySelector('.car-prop-button');
    let hide_box = item.querySelector('.arrow-window');

    button.addEventListener('mouseover', function(){
        hide_box.classList.remove('hide');
    });

    button.addEventListener('mouseout', function(){
        hide_box.classList.add('hide');
    });

    button.addEventListener('click', function(){
        hide_box.classList.remove('hide');
    });
}

/***Появление свойств машины***/

/****************Попапы*******************/
document.querySelector("#load-catalog").addEventListener('click', () => Init_Popup('Оставьте заявку и получите полный каталог с ценами!', 'Скачать каталог'));

if(document.querySelectorAll("#how-much-car-arrs").length != 0)
{
    document.querySelector("#how-much-car-arrs").addEventListener('click', () => Init_Popup('Оставьте заявку и получите коммерческое предложение!', 'Узнать стоимость'));
}

$("#phone-consult").mask("+7(999) 999-9999");
$("#phone-selection").mask("+7(999) 999-9999");

var consult_form_arr = ['.consult .name-input-box',
    '.consult .phone-input-box'
];

document.querySelector("#send-consult-form-tech").addEventListener('click', () => Send_Order_Form(event, consult_form_arr,'Консультация менеджера по технике'));

var selection_form_arr = ['.commerce .name-input-box',
    '.commerce .phone-input-box'
];

document.querySelector("#send-consult-form-commerce").addEventListener('click', () => Send_Order_Form(event, selection_form_arr,'Подобрать оборудование'));


/************скроллинг************/
Menu_Smooth_Lincs('.nav-top .nav-name');

/************скроллинг************/

						
					