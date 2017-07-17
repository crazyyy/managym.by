$(function(){
    $("#top_phone").mask("+375 (99) 999-99-99");
    $("#bot_phone").mask("+375 (99) 999-99-99");
    $("#fot_phone").mask("+375 (99) 999-99-99");
})

var ScrollTO = function (blc, offset) {
    var top = $(blc).offset().top;
    $('html, body').animate({'scrollTop':top + offset}, 1500);
}


var validate =
{
    empty:function (elem, callback, text) {
        var $elem = $(elem),
            can = true,
            text = text;
        return function () {
            var $val = $elem.val();
            if ($.trim($val).length == 0) {
                can = false;
                if (callback)
                    callback(elem, can, text);
                return false;
            }
            else {
                can = true;
                if (callback)
                    callback(elem, can, text);
                return true;
            }
        };

    },
    email:function (elem, callback, text) {
        var $elem = $(elem),
            can = true,
            text = text,
            regex = /[0-9a-z_]+@[a-zA-Z_.]+?\.[a-zA-Z]{2,6}$/g;
        return function () {
            var $val = $elem.val();
            if ($val.search(regex) == -1) {
                can = false;
                if (callback)
                    callback(elem, can, text);
                return false;
            }
            else {
                can = true;
                if (callback)
                    callback(elem, can, text);
                return true;
            }
        }
    },
    phone:function (elem, callback, text) {
        var $elem = $(elem),
            can = true,
            text = text;
        return function () {
            var i,
                phone_val = 0;
            for (i = 0; i < $elem.length; i++) {
                phone_val += $elem.eq(i).val().length;
                if (!isNaN($elem.eq(i).val()))
                    can = true;
                else
                    can = false;
            }
            if (can == true && phone_val == 11) {
                can = true;
                if (callback)
                    callback(elem, can, text)
                return true;
            }
            else {
                can = false;
                if (callback)
                    callback(elem, can, text);
                return false;
            }
        }
    }
}

var show_success = function() {
    $("#top_form, #fot_form, #bot_form").hide();
    $("#top_form_success, #fot_form_success, #bot_form_success").show();

}

var topEmpty = function () {
    var ft_name = validate.empty("#top_name", topFunc, 'Поле заполнено некорректно'),
        ft_email = validate.email("#top_email", topFunc, 'Поле заполнено некорректно'),
        ft_phone = validate.empty("#top_phone", topFunc, 'Поле заполнено некорректно'),
        ftn = ft_name(),
        ftm = ft_email(),
        ftp = ft_phone();
    if(jQuery('#type').attr('value') == 'webinar')
        $type = 1;
    else if(jQuery('#type').attr('value') == 'sale')
        $type = 2;
    else
        $type = 0;

	if (jQuery('#top_subscribe').attr('checked') == 'checked')
		$subscribe = 1;
	else
		$subscribe = 0;

    if (ftp && ftn && ftm) {
        show_success();
        sendForm(jQuery("#top_name").val(), jQuery("#top_phone").val(), jQuery("#top_email").val(), jQuery('#coursetype').val(), $subscribe, $type);
    }

    return false;

}

var botEmpty = function () {
    var fb_name = validate.empty("#bot_name", topFunc, 'Поле заполнено некорректно'),
        fb_phone = validate.empty("#bot_phone", topFunc, 'Поле заполнено некорректно'),
        fb_mail = validate.email("#bot_email", topFunc, 'Поле заполнено некорректно'),
        fbn = fb_name(),
        fbp = fb_phone(),
        fbm = fb_mail();

    if(jQuery('#type').attr('value') == 'webinar')
        $type = 1;
    else
        $type = 0;

	if (jQuery('#subscribe_bot').attr('checked') == 'checked')
		$subscribe = 1;
	else
		$subscribe = 0;

    if (fbp && fbn && fbm) {
        show_success();
        sendForm(jQuery("#bot_name").val(), jQuery("#bot_phone").val(), jQuery("#bot_email").val(), jQuery('#coursetype').val(), $subscribe, $type);
    }

    return false;
}


var fotEmpty = function () {
    var fb_name = validate.empty("#fot_name", topFunc, 'Поле заполнено некорректно'),
        fb_phone = validate.empty("#fot_phone", topFunc, 'Поле заполнено некорректно'),
        fb_mail = validate.email("#fot_email", topFunc, 'Поле заполнено некорректно'),
        fbn = fb_name(),
        fbp = fb_phone(),
        fbm = fb_mail();

    if (jQuery('#subscribe_fot').attr('checked') == 'checked')
        $subscribe = 1;
    else
        $subscribe = 0;

    if (fbp && fbn && fbm) {
        show_success();
        sendForm(jQuery("#fot_name").val(), jQuery("#fot_phone").val(), jQuery("#fot_email").val(), jQuery('#coursetype').val(), $subscribe);
    }

    return false;
}


var sendForm = function (fb_name, fb_phone, fb_mail, fb_course_type, fb_subscribe, fb_type) {
    jQuery.ajax({
        url:"/bepublic/make_order/",
        type:"post",
        data:"news=on&course_id=4&name=" + fb_name + "&phone=" + fb_phone + "&email=" + fb_mail,
         
        success:function (msg) {
            //debugger;
            var msg = parseInt(msg);

            if (msg == 2) {
	            $(".bot_form").hide();
	            $(".bot_form_success").show();
            }else{
                alert('Вы уже оформляли заявку на этот курс!');
            }            
            
        },
        error:function () {
            alert("Ошибка. Попробуйте, пожалуйста, немного позже.");
        }        
        
         
    });
}

function topFunc() {
    var args = [].slice.call(arguments, 0),
        elem = args[0]
    can = args[1],
        text = args[2],
        $elem = $(elem);

    if (can == false) {
        $elem.addClass('error');
        $elem.parent().next().addClass('showerror');
        return false;
    }
    else {
        $elem.removeClass('error');
        $elem.parent().next().removeClass('showerror');

        return true;
    }
}

