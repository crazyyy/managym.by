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
	$('.clients li a').click(function() {
		$('.tipsy_popup').show();
		$('.tipsy_popup .tp_text').each(function() {$(this).hide();});
		$('.tipsy_popup').css('left',($(this).parent().offset().left+$(this).parent().width()/2)+'px');
		$('.tipsy_popup .'+$(this).attr('id')).show();
		return false;	
	});
	$('.close_popup').click(function() {
		$('.tipsy_popup').hide();	
		return false;	
	});
});