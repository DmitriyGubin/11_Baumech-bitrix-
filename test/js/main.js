/**показать больше**/
Create_More_Items_System(3, 3, '#more-similar-box', '.play-video .similar-item', 'hide');

function Create_More_Items_System(number_initially_visible, delta_items, selector_button_parent, selector_item, hide_class)
{
	var all_elements = document.querySelectorAll(selector_item);
	var amount = all_elements.length;
	if(amount != 0)
	{
		if (amount  > number_initially_visible)
		{
			var j = 0;
			for (let item of all_elements)
			{
				j++;
				if(j > number_initially_visible)
				{
					item.classList.add(hide_class);
				}
			}

			var parent = document.querySelector(selector_button_parent);
			let button = document.createElement('button');
			button.id = 'more-similar';
			button.innerHTML = 'Показать еще';
			parent.appendChild(button);

			Click_Button_More_Items(delta_items, all_elements, button.id, 'hide');
		}
	}
}

function Click_Button_More_Items(num_records, elements_reff, id_button, hide_class)
{
	var button_id_selector = '#' + id_button;
	document.querySelector(button_id_selector).addEventListener("click", function(){
	    var num = 0;
	    for (let item of elements_reff)
	    {
	        if((item.classList.contains(hide_class)) && (num < num_records))
	        {
	            item.classList.remove(hide_class);
	            num++;
	        }
	    }
	    if (num == 0)
	    {
	        document.querySelector(button_id_selector).remove();
	    }
	});
}
/**показать больше**/


/*******чeрeдование классов кнопки svg избранное*****/
Change_Button_Svg_Text(document.querySelector('#add-favorites'),
					   document.querySelector('#add-favorites svg'), 
					   'В избранное', 'В избранном', 'active');

function Change_Button_Svg_Text(button_reff, svg_reff, old_name, new_name, toggle_class)
{
	var button_text_reff = button_reff.querySelector('span');
	button_reff.addEventListener("click", function(){
		if(svg_reff.classList.contains(toggle_class))
		{
			button_text_reff.innerHTML = old_name;
		}
		else
		{
			button_text_reff.innerHTML = new_name;
		}
		svg_reff.classList.toggle(toggle_class);
	});
}
/*******чeрeдование классов кнопки svg избранное*****/


/*************Полное, краткое описание*****************/
var text_button_ref = document.querySelector('.play-video .more-text');
var short_text_ref = document.querySelector('.play-video .about-video-text.short');
var full_text_ref = document.querySelector('.play-video .about-video-text.full');
Change_Button_Svg_Text(text_button_ref,
					   document.querySelector('.play-video .more-text svg'), 
					   'Полное описание', 'Скрыть', 'active-arrow');
text_button_ref.addEventListener('click', function(){
	short_text_ref.classList.toggle('hide');
	full_text_ref.classList.toggle('hide');
});
/*************Полное, краткое описание*****************/



/*********Отправка комментария*******************/
First_Comments_Input_Init();

window.addEventListener('resize', function(){
	First_Comments_Input_Init();
});

function First_Comments_Input_Init()
{
	if(screen.width < 750)
	{
		Moble_Comments_Input();
	}
	else
	{
		Desctop_Comments_Input();
	}
}

function Moble_Comments_Input()
{
	Comment_Input_Rules('.play-video #send-comment', 'show');
}

function Desctop_Comments_Input()
{
	Comment_Input_Rules('.play-video .line-arrow', 'show_flex');
}

function Comment_Input_Rules(hide_button_selector, show_class_name)
{
	var coment_input = document.querySelector('.play-video #comment-video-input');
	var go_to_button = document.querySelector(hide_button_selector);
	coment_input.addEventListener('input', function(){
		go_to_button.classList.add(show_class_name);
		if(coment_input.value.length == 0)
		{
			go_to_button.classList.remove(show_class_name);
		}
	});
}
/*********Отправка комментария*******************/



/*******Скрываем, показываем на комментарии*********/
var text_arrow_reff = document.querySelector('.play-video .comments-show-hide');
var hide_show_box = document.querySelector('.hide-show-mobile-commentary-box');


Change_Button_Svg_Text(text_arrow_reff,
					   document.querySelector('.play-video .comments-show-hide svg'), 
					   'Скрыть', 'Показать', 'active');
text_arrow_reff.addEventListener('click', function(){
		$(hide_show_box).slideToggle(300);
});
/*******Скрываем, показываем на комментарии*********/


/*******видео******/
var video = document.querySelector('#video-player');
var play_stop_ref = document.querySelector('.video-buts .play-stop');
var play_button_ref = document.querySelector('.video-buts .play-video-icon');
var stop_button_ref = document.querySelector('.video-buts .stop-video');
var current_time_ref = document.querySelector('.video-buts .current-video-time');
var all_video_time_ref = document.querySelector('.video-buts .all-video-time');
var full_screen_button_ref = document.querySelector('.video-buts .full-screen');

$(".polzunok-time").slider({
    min: 0,
    max: 100,
    value: 0,
    range: "min",
    animate: "fast",
    slide : function(event, ui) 
    {  
    	video.pause();
    	video.currentTime = video.duration*ui.value/100;
    	if(play_button_ref.classList.contains('hide'))
    	{
    		video.play();
    	}
    }    
});

//var b = new Intl.NumberFormat("ru").format($(".polzunok-time").slider("value"));

$(".polzunok-volume").slider({
    min: 0,
    max: 100,
    value: 50,
    range: "min",
    animate: "fast",
    slide : function(event, ui) 
    {  
    	video.volume = ui.value/100;
    	// console.log(ui.value);
    }    
});

play_stop_ref.addEventListener('click', function(){

	if(stop_button_ref.classList.contains('hide'))
	{
		video.play();
	}
	else
	{
		video.pause();
	}

	play_button_ref.classList.toggle('hide');
	stop_button_ref.classList.toggle('hide');
});


full_screen_button_ref.addEventListener('click', function(){
	this.classList.toggle('active');
	if(this.classList.contains('active'))
	{
		openFullscreen();
	}
	else
	{
		closeFullscreen();
	}
});

var video_box = document.querySelector('.play-video .video-box');

function openFullscreen() 
{
  if (video_box.requestFullscreen) 
  {
    video_box.requestFullscreen();
  }
  else if (video.mozRequestFullScreen) 
  { /* Firefox */
    video.mozRequestFullScreen();
  } 
  else if (video.webkitRequestFullscreen) 
  { /* Chrome, Safari and Opera */
    video.webkitRequestFullscreen();
  } 
  else if (video.msRequestFullscreen) 
  { /* IE/Edge */
    video.msRequestFullscreen();
  }
}

function closeFullscreen()
{
	if (document.exitFullscreen)
	{
		document.exitFullscreen();
	} 
	else if (document.webkitExitFullscreen) 
	{
		document.webkitExitFullscreen();
	} 
	else if (document.mozCancelFullScreen) 
	{
		document.mozCancelFullScreen();
	} 
	else if (document.msExitFullscreen) 
	{
		document.msExitFullscreen();
	}
}

/**progress**/
video.ontimeupdate = progressUpdate;
video.addEventListener('loadedmetadata', function() {
	let date = new Date(null);
	date.setSeconds(video.duration);
    all_video_time_ref.innerHTML = date.toISOString().slice(14, 19);
    video.volume = 0.5;
    // console.log(date.toISOString());
});

function progressUpdate()
{
	let all_time = video.duration;
	let cur_time = video.currentTime;
	let percent = cur_time/all_time*100;
	//console.log(percent);
	$(".polzunok-time").slider("value",percent);

	let date = new Date(null);
	date.setSeconds(cur_time);
	current_time_ref.innerHTML = date.toISOString().slice(14, 19);
}




/**progress**/



/*******видео******/


