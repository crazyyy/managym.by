$('.commentsButton').click(function (e){
	$('.commentsButton').removeClass('active');
	$(e.target).addClass('active');

	$('.commentForm').css('display', 'none');
	$('#'+$(e.target).attr('rel')).css('display', 'block');

	return false;
});


function setError()
{
}

function checkForm()
{
	$('.errorMessage').css('visibility', 'hidden');	
	$('.textInput').removeClass('errorInput');	

	var hasError = false;

	if (($('#name').val() == "Ваше имя")||($('#name').length == 0))
	{
		$('#name').addClass('errorInput');
		$('#name_err').css('visibility', 'visible');
		hasError = true;
	}


	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
	if(!emailReg.test($('#email').val())) {  
		$('#email').addClass('errorInput');
		$('#email_err').css('visibility', 'visible');
		hasError = true;
	}      

	return !hasError;
}

function submitForm()
{
	if (checkForm())
	{
		var onclick = $('#submitButton').attr('onclick');
		$('#submitButton').attr('onclick', '');

		jQuery.ajax({
		    url:"/mistake/video/",
		    type:"post",
		    data:"name=" + $('#name').val() + "&phone=" + $('#phone').val() + "&email=" + $('#email').val(),
		    success:function (msg) 
		    {
			        var msg = parseInt(msg);
				if (msg == 1) 
				{
					$('#orderForm').css('display', 'none');
					$('#submitSuccess').css('display', 'block');
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


		$('#submitButton').attr('onclick', onclick);
	}
}

$(function(){
	$("#phone").mask("+375 (99) 999-99-99");
})
