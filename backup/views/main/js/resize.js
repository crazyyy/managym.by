$(document).ready(function() {	

	$('.ts_block').each(function(index, element) {
		if( ($(this).offset().top - $('.top_square').offset().top + $(this).height()) % ( $(this).height() * 2 )  == 0 ){
			$(this).addClass("reverse");
			}
	});
	
	
	if($(window).width()>1637 ){
			
		if($('.reviews ul li').length>2){
			var slider1 = $('.reviews ul').bxSlider({
			  minSlides: 1,
			  maxSlides: 2,
			  slideWidth: 320,
			  slideMargin: 50,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('#test1 li').length>=7){
			var slider2 = $('#test1').bxSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 175,
			  slideMargin: 20,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};
	if( $(window).width()>1423 && $(window).width()<=1637 ){
			
			if($('.reviews ul li').length>2){
				var slider1 = $('.reviews ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 2,
				  slideWidth: 278,
				  slideMargin: 25,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
			if($('.clients ul li').length>=7){
				var slider2 = $('.clients ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 7,
				  slideWidth: 150,
				  slideMargin: 20,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
		};	
	
		if( $(window).width()>1366 && $(window).width()<=1423 ){
			
			if($('.reviews ul li').length>1){
				var slider1 = $('.reviews ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 1,
				  slideWidth: 428,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
			if($('.clients ul li').length>=7){
				var slider2 = $('.clients ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 7,
				  slideWidth: 145,
				  slideMargin: 10,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
		};	
		if( $(window).width()>1263 && $(window).width()<=1366 ){
			/**/
			if($('.reviews ul li').length>1){
				var slider1 = $('.reviews ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 1,
				  slideWidth: 428,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
			if($('.clients ul li').length>=7){
				var slider2 = $('.clients ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 7,
				  slideWidth: 145,
				  slideMargin: 10,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
		};
		if($(window).width()<=1263 ){
			if($('.reviews ul li').length>1){
				var slider1 = $('.reviews ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 1,
				  slideWidth: 260,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
			if($('.clients ul li').length>=7){
				var slider2 = $('.clients ul').bxSlider({
				  minSlides: 1,
				  maxSlides: 6,
				  slideWidth: 140,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
		};
	/*var trigger = false;
	var time_cur = 0;
	
	$(window).resize(function() {
		trigger = false;
		setTimeout(function(){
			trigger = true;
			alert(trigger);	
		}, 4000);
		
	});*/
	
	var doit;
	$(window).resize(function(){
	  clearTimeout(doit);
	  doit = setTimeout(function(){
			test1(slider1,slider2);	
		}, 500);
	});
	
});

function test1(sl1,sl2){
	$('.ts_block').each(function(index, element) {
		$(this).removeClass("reverse");
		if( ($(this).offset().top - $('.top_square').offset().top + $(this).height()) % ( $(this).height() * 2 )  == 0 ){
			$(this).addClass("reverse");
			}
	});
	
	if($(window).width()>1637 ){
		if($('.reviews ul li').length>2){			
			sl1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 2,
			  slideWidth: 320,
			  slideMargin: 50,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>7){
			sl2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 175,
			  slideMargin: 20,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};	
	
	if( $(window).width()>1423 && $(window).width()<=1637 ){			
		if($('.reviews ul li').length>2){
			sl1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 2,
			  slideWidth: 278,
			  slideMargin: 25,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>7){
			sl2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 150,
			  slideMargin: 20,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};	

	if( $(window).width()>1366 && $(window).width()<=1423 ){
		
		if($('.reviews ul li').length>1){
			sl1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  slideWidth: 428,
			  slideMargin: 0,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>7){
			sl2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 145,
			  slideMargin: 10,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};	
	if( $(window).width()>1263 && $(window).width()<=1366 ){
		if($('.reviews ul li').length>1){
			sl1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  slideWidth: 428,
			  slideMargin: 0,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>7){
			sl2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 140,
			  slideMargin: 10,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};
	if($(window).width()<=1263 ){
		if($('.reviews ul li').length>1){
			sl1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  slideWidth: 260,
			  slideMargin: 0,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>6){
			sl2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 6,
			  slideWidth: 140,
			  slideMargin: 0,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};
	}