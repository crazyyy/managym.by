$(document).ready(function(){
	$('.register').click(function (){
		var	fn = $('#fname').val(),
			fe = $('#femail').val(),
			ft = $('#ftel').val();
		if (fn == "") {$('#fname').css('background','#FA8072');	
		} ;
		if (fe == "") {
			$('#femail').css('background','#FA8072');
		};
		if (ft == "") {
			$('#ftel').css('background','#FA8072');
		};
		if (fn != "" & fe != "" & ft!="") {
			console.log ('ok');
			jQuery.ajax({
			    url:"/managym2/make_order/",
			    type:"post",
			    data:"name=" + fn + "&phone=" + ft + "&email=" + fe,
			    success:function (msg) 
			    {
			        var msg = parseInt(msg);
					if (msg == 1) {
						$('#form11').hide();
						$('#form22').hide();
						$('#thanks1').css("display", "block");
						$('#thanks2').css("display", "block");
					}
					else if (msg == 2) {
						alert('Ошибка. Все поля обязательны для заполнения.')
					}
			    },
			    error:function () 
			    {
			        alert("Ошибка. Попробуйте, пожалуйста, немного позже.")
			    }
			});
		};
		
	})
	$('#register').click(function(){
		var	fn = $('#fname1').val(),
			fe = $('#femail1').val(),
			ft = $('#ftel1').val();
		if (fn == "") {$('#fname1').css('background','#FA8072');		
		}
		if (fe == "") {
			$('#femail1').css('background','#FA8072');
		};
		if (ft == "") {
			$('#ftel1').css('background','#FA8072');
			};
		if (fn != "" & fe != "" & ft!="") {
			console.log ('ok');
			jQuery.ajax({
			    url:"/managym2/make_order/",
			    type:"post",
			    data:"name=" + fn + "&phone=" + ft + "&email=" + fe,
			    success:function (msg) 
			    {
			        var msg = parseInt(msg);
					if (msg == 1) {
						$('#form11').hide();
						$('#form22').hide();
						$('#thanks1').css("display", "block");
						$('#thanks2').css("display", "block");
					}
					else if (msg == 2) {
						alert('Ошибка. Все поля обязательны для заполнения.');
					}
			    },
			    error:function () 
			    {
			        alert("Ошибка. Попробуйте, пожалуйста, немного позже.");
			    }
			})
		};
	});
});