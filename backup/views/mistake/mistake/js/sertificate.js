function checkForm(form)
{
	$('#' + form + ' li').removeClass('error');
	$('#' + form + ' .incorrect').css('display', 'none');

	var name = '#' + form + ' .name';	
	var phone = '#' + form + ' .phone';	
	var email = '#' + form + ' .email';	

	var hasError = false;

	if ($.trim($(name).attr('value')).length == 0)
	{
		$(name).parent().addClass('error');
		$('#' + form + ' .err_name').css('display', 'block');
		hasError = true;
	}

	if ($.trim($(phone).attr('value')).length == 0)
	{
		$(phone).parent().addClass('error');
		$('#' + form + ' .err_phone').css('display', 'block');
		hasError = true;
	}


	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  

	if (($.trim($(email).attr('value')).length == 0)||
  	    (!emailReg.test($(email).attr('value')))) {
		$(email).parent().addClass('error');  
		$('#' + form + ' .err_email').css('display', 'block');
		hasError = true;
	}      

	return !hasError;
}

function submitForm(form, btn)
{                       
	if (checkForm(form))
	{
		var onclick = $(btn).attr('onclick');
		$(btn).attr('onclick', '');

		var name = $('#' + form + ' .name').attr('value');	
		var phone = $('#' + form + ' .phone').attr('value');	
		var email = $('#' + form + ' .email').attr('value');	

		jQuery.ajax({
		    url:"/mistake/sert/",
		    type:"post",
		    data:"name=" + name + "&phone=" + phone + "&email=" + email,
		    success:function (msg) 
		    {
			        var msg = parseInt(msg);
				if (msg == 1) 
				{
					//yaCounter15162850.reachGoal('sertificate');

					$('.form').css('display', 'none');
					$('.form_success').css('display', 'block');
					showPopup();
				}
				else 
				{
					checkForm();
				}
		    },
		    error:function () 
		    {
		        alert("Ошибка. Попробуйте, пожалуйста, немного позже.");
		    }
		}); 

		$(btn).attr('onclick', onclick);
	}

	return false;
}

$(function(){
	$(".phone").mask("+375 (99) 999-99-99");
})