
var GA={sendGa:function(params,gaq){var gaq=gaq?gaq:null;var cat=params['cat']?params['cat']:null;var action=params['action']?params['action']:null;if(!cat.length||!action.length||!gaq)
return false;yaCounter15162850.reachGoal(action+'_'+cat);gaq.push(['_trackEvent',cat,action]);return true;}};function headerSlider(){var slider=$('header ul'),element=$('header li'),wrap=$('header li .wrap');console.log(document.body.offsetWidth-wrap.outerWidth()/2);wrap.css("left",(document.body.offsetWidth-wrap.outerWidth())/2);element.css({'width':$('header').width()+'px'});$(window).resize(function(){wrap.css("left",(document.body.offsetWidth-wrap.outerWidth())/2);element.css({'width':$('header').width()+'px'});});setInterval(function(){$('header li:first').animate({'margin-left':-$('header li:first').offset().left-$('header li:first').width()},{duration:1500,step:function(now,fx){$(this).next().find(".quote").css({'right':(-200+248*fx.pos)+'px'});},complete:function(){$(this).css({'margin-left':'0'}).appendTo(slider);}});},6000);}
function coachSlider(){var slider=$("#photos"),elements=$("#photos li");elements.click(function(){if($(this).hasClass('active'))
return false;$('#descr>li').hide().removeClass('active').eq(elements.index(this)).show().addClass('active');$(this).prependTo($(this).parent()).addClass("active");$(this).siblings().removeClass('active');})}
function squareSlider(){var parent=$("#squares"),slider=$("#squares ul"),left=$(".larr"),right=$(".rarr"),stop=false;slider.width(slider.find('li').length*slider.find('li').width()).css("left",(parent.width()-slider.width())/2+'px');parent.mouseenter(function(){if(slider.width()>parent.width()){left.show();right.show();}});parent.mouseleave(function(){left.hide();right.hide();});left.click(function(){if(stop)return;stop=true;slider.width("+=240").find('li:last').clone().prependTo(slider).css("margin-left","-=240").animate({"margin-left":"+=240"},{duration:600,complete:function(){slider.find('li:last').remove();slider.width("-=240");stop=false;}});});right.click(function(){if(stop)return;stop=true;slider.width("+=240").find('li:first').clone().appendTo(slider).siblings("li:first").animate({"margin-left":"-=240"},{duration:600,complete:function(){slider.find('li:first').remove();slider.width("-=240");stop=false;}});});$(window).resize(function(){slider.width(slider.find('li').length*slider.find('li').width()).css("left",(parent.width()-slider.width())/2+'px');});}
function initMaps(){var cntr=[53.925294,27.617417];var myMap=new ymaps.Map('myMap',{center:cntr,zoom:16,behaviors:["default"]});var myPlacemark=new ymaps.Placemark([53.926054,27.61467],{iconImageHref:'/images/pin.png',iconImageSize:[43,35]});myMap.geoObjects.add(myPlacemark);$("#contacts .hide").live('click',function(){($(this).hasClass('open'))?$("#contacts").animate({'top':'-210px'}):$("#contacts").animate({'top':'0'});$(this).toggleClass('open');myMap.panTo(cntr,{flying:true});return false;})}
function SwitchButton(opts){var $lnk=$(opts.link),$blc=$(opts.block);this.init=function(){$lnk.bind("click",function(e){e.preventDefault();var index=$lnk.index(this);$lnk.removeClass("active");$(this).addClass("active");$blc.hide();$blc.eq(index).show();});}}
var ScrollTO=function(blc){var top=$(blc).offset().top;$('html, body').animate({'scrollTop':top},1500);}
var validate={empty:function(elem,callback,text){var $elem=$(elem),can=true,text=text;return function(){var $val=$elem.val();if($.trim($val).length==0){can=false;if(callback)
callback(elem,can,text);return false;}
else{can=true;if(callback)
callback(elem,can,text);return true;}};},email:function(elem,callback,text){var $elem=$(elem),can=true,text=text,regex=/[0-9a-z_]+@[a-zA-Z_.]+?\.[a-zA-Z]{2,6}$/g;return function(){var $val=$elem.val();if($val.search(regex)==-1){can=false;if(callback)
callback(elem,can,text);return false;}
else{can=true;if(callback)
callback(elem,can,text);return true;}}},phone:function(elem,callback,text){var $elem=$(elem),can=true,text=text;return function(){var i,phone_val=0;for(i=0;i<$elem.length;i++){phone_val+=$elem.eq(i).val().length;if(!isNaN($elem.eq(i).val()))
can=true;else
can=false;}
if(can==true&&phone_val==11){can=true;if(callback)
callback(elem,can,text)
return true;}
else{can=false;if(callback)
callback(elem,can,text);return false;}}}}
var topEmpty=function(){var ft_name=validate.empty("#top_name",topFunc,'Поле заполнено некорректно'),ft_phone=validate.empty("#top_phone",topFunc,'Поле заполнено некорректно'),ft_mail=validate.email("#top_mail",topFunc,'Поле заполнено некорректно'),ftn=ft_name(),ftp=ft_phone(),ftm=ft_mail();if(jQuery('#subscribe_top').attr('checked')=='checked')
$subscribe=1;else
$subscribe=0;if(ftp&&ftn&&ftm){$('.signup').attr('onclick','');sendForm(jQuery("#top_name").val(),jQuery("#top_phone").val(),jQuery("#top_mail").val(),jQuery("#recaptcha_response_field").val(),jQuery("#recaptcha_challenge_field").val(),jQuery('#courseType').val(),$subscribe);$('.signup').attr('onclick','topEmpty()');$("#top_reg_btn").hide();}
else{return false;}}
var topEmpty=function(){var ft_name=validate.empty("#top_name",topFunc,'Поле заполнено некорректно'),ft_phone=validate.empty("#top_phone",topFunc,'Поле заполнено некорректно'),ft_mail=validate.email("#top_mail",topFunc,'Поле заполнено некорректно'),ftn=ft_name(),ftp=ft_phone(),ftm=ft_mail();if(jQuery('#subscribe_top').attr('checked')=='checked')
$subscribe=1;else
$subscribe=0;if(ftp&&ftn&&ftm){$('.signup').attr('onclick','');sendForm(jQuery("#top_name").val(),jQuery("#top_phone").val(),jQuery("#top_mail").val(),jQuery("#recaptcha_response_field").val(),jQuery("#recaptcha_challenge_field").val(),jQuery('#courseType').val(),$subscribe);$('.signup').attr('onclick','topEmpty()');$("#top_reg_btn").hide();}
else{return false;}}
var botEmpty=function(){var fb_name=validate.empty("#bot_name",topFunc,'Поле заполнено некорректно'),fb_phone=validate.empty("#bot_phone",topFunc,'Поле заполнено некорректно'),fb_mail=validate.email("#bot_mail",topFunc,'Поле заполнено некорректно'),fbn=fb_name(),fbp=fb_phone(),fbm=fb_mail();if(jQuery('#subscribe_bot').attr('checked')=='checked')
$subscribe=1;else
$subscribe=0;if(fbp&&fbn&&fbm){$('.signup').attr('onclick','');sendForm(jQuery("#bot_name").val(),jQuery("#bot_phone").val(),jQuery("#bot_mail").val(),jQuery("#recaptcha_response_field").val(),jQuery("#recaptcha_challenge_field").val(),jQuery('#courseType').val(),$subscribe);$('.signup').attr('onclick','botEmpty()');$("#top_reg_btn").hide();}
else{return false;}}
var mailFn=function(){var args=[].slice.call(arguments,0),elem=args[0]
can=args[1],text=args[2],$elem=$(elem);if(can)
return true;else{$elem.css({'border':'1px solid #c00'});$elem.next().next().css({'visibility':'visible'}).end();$elem.next().next().text(text);}}
var mailEmpty=function(){var emptyMail=validate.email("#getSubscribe",mailFn,"Адрес электронной почты должен содержать @"),eMail=emptyMail();if(eMail)
return true;else
return false;}
var sendForm=function(fb_name,fb_phone,fb_mail,fb_captcha,fb_captcha_hid,fb_course_type,fb_subscribe){var showCaptcha='';if(fb_captcha)
{showCaptcha='1';}
else
{showCaptcha='0';}
jQuery.ajax({url:"/managym/make_order/",type:"post",data:"news=on&course_id=3&name="+fb_name+"&phone="+fb_phone+"&email="+fb_mail,success:function(msg){var msg=parseInt(msg);if(msg==2){$(".bott_form_succes").hide();$(".bottom_succedd").show();$("#top_form").hide();$(".succes_top_form").show();}else{alert('Вы уже оформляли заявку на этот курс!');}},error:function(){alert("Ошибка. Попробуйте, пожалуйста, немного позже.");}});}
function getSubscribe(){var email=$("#getSubscribe").val();jQuery.ajax({url:"/subscribe/index/",type:"post",data:"subscribeEmail="+email,success:function(msg){var msg=parseInt(msg);if(msg==214){$("#getSubscribe").next().next().text("Вы уже подписаны на рассылку.");return;}
if(msg==502){$("#getSubscribe").next().next().text("Такого email не существует.");return;}
if(msg!=1){alert('Возможно, вы уже подписаны на рассылку.');return;}
GA.sendGa({'cat':'salesprint',action:'subscribe'},_gaq);$(".subscribe").hide();$(".subscribeDone").show();},error:function(){alert("Ошибка. Попробуйте, пожалуйста, немного позже.");}});}
function topFunc(){var args=[].slice.call(arguments,0),elem=args[0]
can=args[1],text=args[2],$elem=$(elem);if(can==false&&!$(elem).next().next().is("b")){$elem.addClass('error');$elem.parents('.top_form').append('<b style="color:red;display: block;font: 11px tahoma;margin: 2px 0 0  90px">'+text+'</b>');return false;}
else if(can==true){if($(elem).next().next().is("b"))
$(elem).next().next().remove();if($elem.hasClass('error'))
$elem.removeClass();return true;}}
function topApplic(){if($('#ap_subscribe').attr('checked')=='checked')
$subscribe=1;else
$subscribe=0;jQuery.ajax({url:"/query/grant/",type:"post",data:"query[courseType]="+encodeURIComponent($('#courseType').val())+"&query[name]="+encodeURIComponent($('#ap_name').val())+"&query[birth_date]="+$('#ap_date').val()+"&query[tel]="+$('#ap_phone').val()+"&query[email]="+encodeURIComponent($('#ap_email').val())+"&query[place]="+encodeURIComponent($('#ap_place').val())+"&query[job]="+encodeURIComponent($('#ap_job').val())+"&query[why]="+encodeURIComponent($('#ap_why').val())+"&query[info]="+encodeURIComponent($('#ap_info').val())+"&query[subscribe]="+$subscribe,success:function(msg){var msg=parseInt(msg);if(msg==1){$('.block_form').hide();$('.block_ok').show();$('#applic_center').css({left:($(window).width()-$('#applic_center').outerWidth())/2,top:$(document).scrollTop()+($(window).height()-$('#applic_center').outerWidth())/2+150});}
else if(msg==2){alert('Ошибка. Все поля обязательны для заполнения.');}},error:function(){alert("Ошибка. Попробуйте, пожалуйста, немного позже.");}});}
$(function()
{$(".modal_btn").click(function(e)
{e.preventDefault();var href=window.location.href,func;if(href.indexOf('#topCheck')!=-1)
{func=topEmpty;}
else if(href.indexOf('#bottomCheck')!=-1)
{func=botEmpty;}
else
return;func();$(".overlay").hide();$(".modal").hide();$("iframe").show();});if($(".overlay").css("display")=='none')
{$('body').keydown(function(e)
{if(e.keyCode==27)
{$(".overlay").hide();$(".modal").hide();$("iframe").show();}})}})
$(document).ready(function(){jQuery(".check_f").click(function(){changeCheck(jQuery(this));});jQuery(".check_f").each(function(){changeCheckStart(jQuery(this));});function changeCheck(el)
{var el=el,input=el.find("input").eq(0);if(!input.attr("checked")){el.addClass("chek");input.attr("checked",true)}else{el.removeClass("chek");input.attr("checked",false)}
return true;}
function changeCheckStart(el)
{var el=el,input=el.find("input").eq(0);if(input.attr("checked")){el.addClass("chek");}
return true;}
$(window).resize(function(){$('#applic_center').css({left:($(window).width()-$('#applic_center').outerWidth())/2,top:$(document).scrollTop()+($(window).height()-$('#applic_center').outerWidth())/2});});$('#close_applic').click(function(){$('#applic_center').hide();return false;});$("#ap_email").keyup(function(){var email=$("#ap_email").val();if(email!=0)
{if(isValidEmailAddress(email))
{$("#ap_email").parent().css({"border-color":"#9c9c9c"});}else{$("#ap_email").parent().css({"border-color":"#ff0000"});}}else{$("#ap_email").parent().css({"border-color":"#9c9c9c"});}});$('#applic_center input[type="text"]').blur(function(){Valid_applicat($(this));});$('#applic_center textarea').blur(function(){Valid_applicat($(this));});$("#ap_phone").mask("+375 99 999 99 99");$("#ap_date").mask("99/99/9999");});function open_aplic(){$('#applic_center').css({left:($(window).width()-$('#applic_center').outerWidth())/2,top:$(document).scrollTop()+($(window).height()-$('#applic_center').outerWidth())/2});$('#applic_center').show();return false;}
function Valid_applicat(inp){if(inp.val()==""||inp.val()==" "){inp.parent().css("border-color","#ff0000");}
else{inp.parent().css("border-color","#9c9c9c");}}
function isValidEmailAddress(emailAddress){var pattern=new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);return pattern.test(emailAddress);}
function valid_form(parent_bl,name,email,err_b){var nam=$('.'+parent_bl).find('.'+name);var eml=$('.'+parent_bl).find('.'+email);var name_val=nam.val();var email_val=eml.val();var flag_name=0;var flag_email=0;if(name_val==''||name_val==' '||name_val=='Ваше имя'){nam.addClass('err').parent().find('.'+err_b).show();flag_name=1;}
else{nam.removeClass('err').parent().find('.'+err_b).hide();flag_name=0;}
if(!/^\w+[a-zA-Z0-9_.-]*@{1}\w{1}[a-zA-Z0-9_.-]*\.{1}\w{2,4}$/.test(email_val))
{flag_email=1;eml.addClass('err').parent().find('.'+err_b).show();return false;}
else{flag_email=0;eml.removeClass('err').parent().find('.'+err_b).hide();}
if(flag_name==0&&flag_email==0){var onclick=$('.but_fm').attr('onclick');$('.but_fm').attr('onclick','');jQuery.ajax({url:"/query/video/",type:"post",data:"query[name]="+$('.name_lin').val()+"&query[tel]="+$('#phone_num').val()+"&query[email]="+$('.email_lin').val(),success:function(msg){var msg=parseInt(msg);if(msg==1){$('.lind_f').css('text-align','center');$('#h1_form').hide();$('#table_form').hide();$('.lind_f').html('Спасибо! Теперь подтвердите свое желание получить видео, нажав на специальную ссылку в письме<br />(Защита от автоматических регистраций)');showPopup();}
else if(msg==2){alert('Ошибка. Все поля обязательны для заполнения.');$('.but_fm').attr('onclick',onclick);}},error:function(){alert("Ошибка. Попробуйте, пожалуйста, немного позже.");$('.but_fm').attr('onclick',onclick);}});}}

