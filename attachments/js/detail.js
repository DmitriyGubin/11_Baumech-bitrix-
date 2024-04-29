$('.big-slider').slick({
    dots: false,
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.small-slider',
    prevArrow: '<div class="prev-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>',
    nextArrow: '<div class="next-photo"><svg width="94" height="94" viewBox="0 0 94 94" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: block;"><path d="M39 68L60 47L39 26" stroke="black" vector-effect="non-scaling-stroke" style="stroke-width: 1px; stroke: rgb(0, 0, 0);"></path></svg></div>'
});

var slidesToShow = 8
if(screen.width < 1200)
{
    slidesToShow = 7;
}

if(screen.width < 1000)
{
    slidesToShow = 9;
}

$('.small-slider').slick({
    dots: false,
    infinite: true,
    variableWidth: true,
    slidesToShow: slidesToShow,
    slidesToScroll: 1,
    arrows: false,
    focusOnSelect: true,
    asNavFor: '.big-slider'
});

/*******слайдер-каталог***********/
First_Slider_Init(1000);

window.addEventListener('resize', function(){
    First_Slider_Init(1000);
});

function First_Slider_Init(screen_width)
{
    if(screen.width < screen_width)
    {
        $('.mobile-slider-another').slick({
            dots: false,
            infinite: false,
            variableWidth: true,
            arrows: false,
        });
    }
}
/*******слайдер-каталог***********/

/**********галерея********/
function Fancy_Box_Gallery_Init()
{
    $('[data-fancybox="galleryy"]').fancybox({
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
}

//Fancy_Box_Gallery_Init();

// var slides = document.querySelectorAll('.product .big-slider-slide');
// for(let item of slides)
// {
//     item.addEventListener('click', function(){
//         Fancy_Box_Gallery_Init();
//     });
// }



// console.log(document.querySelector("#zoom-button"));

// document.querySelector(".fancybox-button.fancybox-button--zoom").addEventListener('click', function() {
// 	console.log(777);
// });
/**********галерея********/


document.querySelector("#about-price").addEventListener('click', () => Init_Popup('Оставьте заявку и наш менеджер свяжется с вами', 'Узнать стоимость'));


/**************чуредование картинок при наводке на товар*************/

Change_Img_Product( document.querySelectorAll('.another-prod .cat-img-box'),
                    '.small-img', '.big-img', 'hide');

/**************чуредование картинок при наводке на товар*************/