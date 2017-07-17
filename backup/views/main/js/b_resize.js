$(document).ready(function() {	
	$('.ts_block').each(function(index, element) {
		if( ($(this).offset().top - $('.top_square').offset().top + $(this).height()) % ( $(this).height() * 2 )  == 0 ){
			$(this).addClass("reverse");
			}
	});
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
	if($('.clients ul li').length>7){
		var slider2 = $('.clients ul').bxSlider({
		  minSlides: 1,
		  maxSlides: 7,
		  slideWidth: 175,
		  slideMargin: 20,
		  pager: false,
		  useCSS: false,
		  controls: true
		});
	};
	
	if( $(window).width()>1366 && $(window).width()<=1440 ){
		if($('.reviews ul li').length>2){
			slider1.reloadSlider({
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
			slider2.reloadSlider({
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
	if( $(window).width()>1280 && $(window).width()<=1366 ){
		if($('.reviews ul li').length>1){
			slider1.reloadSlider({
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
			slider2.reloadSlider({
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
	
	if( $(window).width()>1024 && $(window).width()<=1280 ){
		if($('.reviews ul li').length>1){
			slider1.reloadSlider({
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
			slider2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 140,
			  slideMargin: 20,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};
	if($(window).width()<=1024 ){
		if($('.reviews ul li').length>1){
			slider1.reloadSlider({
			  minSlides: 1,
			  maxSlides: 1,
			  slideWidth: 260,
			  slideMargin: 0,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		if($('.clients ul li').length>7){
			slider2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 6,
			  slideWidth: 120,
			  slideMargin: 30,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
	};
	
	
	$(window).resize(function() {
		$('.ts_block').each(function(index, element) {
			$(this).removeClass("reverse");
			if( ($(this).offset().top - $('.top_square').offset().top + $(this).height()) % ( $(this).height() * 2 )  == 0 ){
				$(this).addClass("reverse");
				}
		});
		if($('.reviews ul li').length>2){
			
			slider1.reloadSlider({
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
			slider2.reloadSlider({
			  minSlides: 1,
			  maxSlides: 7,
			  slideWidth: 170,
			  slideMargin: 20,
			  pager: false,
			  useCSS: false,
			  controls: true
			});
		};
		
	
		if( $(window).width()>1366 && $(window).width()<=1440 ){
			
			if($('.reviews ul li').length>2){
				slider1.reloadSlider({
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
				slider2.reloadSlider({
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
		if( $(window).width()>1280 && $(window).width()<=1366 ){
			if($('.reviews ul li').length>1){
				slider1.reloadSlider({
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
				slider2.reloadSlider({
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
		if( $(window).width()>1024 && $(window).width()<=1280 ){
			if($('.reviews ul li').length>1){
				slider1.reloadSlider({
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
				slider2.reloadSlider({
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
		if($(window).width()<=1024 ){
			if($('.reviews ul li').length>1){
				slider1.reloadSlider({
				  minSlides: 1,
				  maxSlides: 1,
				  slideWidth: 260,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
			if($('.clients ul li').length>7){
				slider2.reloadSlider({
				  minSlides: 1,
				  maxSlides: 7,
				  slideWidth: 120,
				  slideMargin: 0,
				  pager: false,
				  useCSS: false,
				  controls: true
				});
			};
		};
	});
});