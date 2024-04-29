/**массив обьектов точек карты********/
var points_arr = [];
var cyties = document.querySelectorAll('.offices-box .city_item');
var obj_num = 0;
for (let item of cyties)
{
    let off_name = item.querySelector('.off_name').innerHTML;
    let off_lat = item.querySelector('.off_lat').innerHTML;
    let off_long  = item.querySelector('.off_long').innerHTML;
    let off_ballon = item.querySelector('.off_ballon').innerHTML;
    let off_type = item.querySelector('.off_type').innerHTML;
    let phones = item.querySelectorAll('.phone');
    let j = 0;
    let phones_arr = [];
    for(let phone_item of phones)
    {
        phones_arr[j] = phone_item.innerHTML;
        j++;
    }

    points_arr[obj_num] = {
        point_name: off_name,
        point_lat: off_lat,
        point_long : off_long,
        point_ballon : off_ballon,
        point_type : off_type,
        point_phones : phones_arr
    }

    obj_num++;
}

//console.log(points_arr);

/**массив обьектов точек карты********/

ymaps.ready(init_dillers);

function init_dillers() 
{
			var myMap = new ymaps.Map("diller-map", {
				center: [55.006998,82.820699],
				zoom: 15,
				// controls: [],//без элементов управления
			}, {
				searchControlProvider: 'yandex#search'
			}),
    // Создание макета содержимого хинта.
    // Макет создается через фабрику макетов с помощью текстового шаблона.
    HintLayout = ymaps.templateLayoutFactory.createClass( "<div class='my-hint'>" +
    	"{{ properties.address }}" +
    	"</div>", {
                // Определяем метод getShape, который
                // будет возвращать размеры макета хинта.
                // Это необходимо для того, чтобы хинт автоматически
                // сдвигал позицию при выходе за пределы карты.
                getShape: function () {
                	var el = this.getElement(),
                	result = null;
                	if (el) {
                		var firstChild = el.firstChild;
                		result = new ymaps.shape.Rectangle(
                			new ymaps.geometry.pixel.Rectangle([
                				[0, 0],
                				[firstChild.offsetWidth, firstChild.offsetHeight]
                				])
                			);
                	}
                	return result;
                }
            }
            );

//https://yandex.ru/dev/maps/jsbox/2.1/icon_customImage

	//type = government or home
    function Add_point(x, y, descr, city, type, phones_arr)
    {
        var phones_str = '';
        for(let item of phones_arr)
        {
            phones_str += item + ' ';
        }

        var myPlacemark = new ymaps.Placemark([x, y], {
            balloonContent: descr + '<br>' + phones_str,
            iconCaption: city
        }, {
            preset: 'islands#' + type + 'CircleIcon',
            iconColor: '#ffb833'
        });
        
        myMap.geoObjects.add(myPlacemark);
    }

  	//type = government or home
    for(let item of points_arr)
    {
        Add_point(item.point_lat, item.point_long, item.point_ballon, item.point_name, item.point_type, item.point_phones);
    }

  	myMap.setBounds(myMap.geoObjects.getBounds(),{checkZoomRange:true, zoomMargin:9});/*авто зуум*/
}

