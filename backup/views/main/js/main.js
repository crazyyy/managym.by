function initMaps() {
    var cntr = [53.925553, 27.595581];
    var myMap = new ymaps.Map('myMap', {
        center:cntr,
        zoom:16,
        behaviors:["default"]
    });

    var myPlacemark = new ymaps.Placemark([53.926153, 27.592081], {
        iconImageHref:'/images/pin.png', // картинка иконки
        iconImageSize:[43, 35] // размеры картинки
        /*iconImageOffset: [-9, -29] // смещение картинки*/
    });
    myMap.geoObjects.add(myPlacemark);

    //myMap.controls.add("mapTools").add("zoomControl").add("typeSelector");
    $("#contacts .hide").live('click', function () {
        ($(this).hasClass('open')) ? $("#contacts").animate({'top':'-213px'}) : $("#contacts").animate({'top':'0'});
        $(this).toggleClass('open');
        myMap.panTo(cntr, {flying:true});
        return false;
    })
}



$(document).ready(function() {

	$('.brands').hover(function(){
		$(this).find('img').attr('src',$(this).find('img').attr('data-imagehov'));
	},function(){
		$(this).find('img').attr('src',$(this).find('img').attr('data-image'));
	})
	
	setTimeout(function(){
    	$('.clients li a').hover(function() {
			$('.tipsy_popup').show();
			$('.tipsy_popup .tp_text').each(function() {$(this).hide();});
			$('.tipsy_popup').css('left',($(this).closest('li').offset().left+$(this).closest('li').width()/2 - $('#wrapper').offset().left)+'px');
			$('.tipsy_popup').find('.'+$(this).attr('id')).show();
			return false;	
		},function() {
			$('.tipsy_popup').hide();
			
			return false;	
		});    
    }, 1000);
	
	$('.clients .bx-next,.clients .bx-prev').click(function(e) {
		$('.tipsy_popup').hide();		
	});
	
	$('.close_popup').click(function() {
		$('.tipsy_popup').hide();	
		return false;	
	});
});