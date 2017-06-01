$(document).ready(function(){
	$('.timeSheet ul li').click(function(){
		pos = $(this).index();
		$('.divProg div').css('display','none');
		$('.timeSheet ul li').css('border','none');
		$('.divProg div').eq(pos).css('display','block');
		$('.timeSheet ul li').eq(pos).css({'border':'solid 2px #000', 'padding':'5px'});
	});
	
	$('.navMenu ul li , .wrap button').on("click", function (event) {
		var id  = $(this).attr('id'),
		top = $(id).offset().top;
		$('body,html').animate({scrollTop: top}, 1500);
	});
});