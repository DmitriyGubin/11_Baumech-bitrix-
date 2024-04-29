/**************чуредование картинок при наводке на товар*************/
function Change_Img_Product(imgs_box_refs, small_img_selector, big_img_selector, hide_class)
{
	for(let item of imgs_box_refs)
	{
		let num_imgs_item = item.querySelectorAll('img').length;
		if(num_imgs_item == 2)
		{
			item.addEventListener("mouseover", function(){
				item.querySelector(small_img_selector).classList.toggle(hide_class);
				item.querySelector(big_img_selector).classList.toggle(hide_class);
			});

			item.addEventListener("mouseout", function(){
				item.querySelector(small_img_selector).classList.toggle(hide_class);
				item.querySelector(big_img_selector).classList.toggle(hide_class);
			});
		}
	}
}


/*********плавный скроллинг по ссылкам*****************/
function Menu_Smooth_Lincs(selector_links)
{
	var smooth_Links = document.querySelectorAll(selector_links);
	for (let item of smooth_Links)
	{
		item.addEventListener('click', function (e) 
	    {
	        e.preventDefault();
	        var id = item.getAttribute('href');
	        id = id.replace(/\/#/, '#');

	        document.querySelector(id).scrollIntoView({
	            behavior: 'smooth',
	            block: 'start'
	        });
	    });
	}
}