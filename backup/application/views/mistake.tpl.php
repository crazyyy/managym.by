<!DOCTYPE html>
<html lang="ru">
<head>
    <script src="/views/mistake/js/jquery.js"></script>
    <script src="/views/mistake/js/jquery.maskedinput.min.js"></script>
    <script src="/views/mistake/js/script.js?ver=1"></script>
    <script src="https://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
    <link rel="icon" type="image/vnd.microsoft.icon" href="/views/mistake/images/ifavico.ico">
    <title><?=$title?></title>
    <meta name="keywords" content="<?=$keywords?>">
    <meta name="description" content="<?=$description?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="/views/mistake/css/reset.css" rel="stylesheet">
    <link href="/views/mistake/css/style_mistake.css" rel="stylesheet">        

    <!--ie html5 fix-->
    <!--[if lt IE 9]>
        <link href="/views/mistake/css/ie.css" rel="stylesheet">
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <!--[if lt IE 8]>
        <link href="/views/mistake/css/ie7.css" rel="stylesheet">
    <![endif]-->


    <script type="text/javascript">
      (function() {
        var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
        po.src = 'https://apis.google.com/js/plusone.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
      })();
    </script>
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29405806-5', 'auto');
  ga('send', 'pageview');

</script>
<link rel="canonical" href="http://managym.by/mistake/">
</head>

<body>
		    <div class="upper-bar-courses">
		        <div class="upper-bar-wrapper">
		            <div>НАШИ КУРСЫ</div>
		            <table><tbody><tr>
			            	<td><a href="http://www.projector.by/">PROJECTOR</a></td>
		                    <td><a href="http://managym.by/">MANAGYM 1</a></td>
		                    <td><a href="http://managym.by/managym2/">MANAGYM 2</a></td>
		                    <td><a href="http://managym.by/bepublic/">bePUBLIC</a></td>
		                </tr></tbody></table>
		        </div>
		    </div>
    		<div class="header lending lenging_b">
			<div class="header_cn">
				<div class="cn_bl">
					<div class="header_up_text">
						<div class="time">
							<span>
								<a style="cursor: default;color:#d7dada;">Бесплатный Видеокурс</a>
							</span>
						</div>
						<h1>5 типичных ошибок руководителя</h1>
						<p style="font-size:22px; color:#c7cbcb; text-transform:uppercase;">Как избежать ошибок, которые могут стоить вам целой компании</p>
					</div>
				</div>
			</div>
		</div>
		<div class="white_gray">
			<div class="cn_bl static_posit">
				<div class="statist_bl linding_inf">
					<div class="tx_lending">
						<h1>Из курса вы узнаете:</h1>
						<ul>
							<li><span>От специалиста к руководителю. Как быстро<br/>перейти эту грань.</span></li>
							<li><span>Нужно ли вести дружеские отношения<br/>с сотрудниками.</span></li>
							<li><span>Что делать, если вам проще сделать самому,<br/>чем объяснить другим.</span></li>
							<li><span>Когда вы имитируете поведение<br/>руководителя. Чем вам это грозит?</span></li>
							<li><span>Как перестать опираться на эмоции и<br/>работать только с фактами.</span></li>
						</ul>
					</div>
					<div class="linding_form">
						<div class="lind_f">
							<h1 id="h1_form">Заполните форму и получите<br/><span>бесплатный</span> видеокурс</h1>

							<table id="table_form">
								<tr>
									<td class="lf">
										<span class="red">*</span>Имя
									</td>
									<td>
										<input class="name_lin" type="text" onblur="this.value==''?this.value='Ваше имя':this.value=this.value;" onfocus="this.value=='Ваше имя'?this.value='':this.value=this.value;" value="Ваше имя" alt=""/>
										<div class="err_mes">Поле заполнено некорректно</div>
									</td>
								</tr>
								<tr>
									<td class="lf">
										<span class="red">*</span>E-mail
									</td>
									<td>
										<input class="email_lin" type="text" onblur="this.value==''?this.value='Ваш e-mail':this.value=this.value;" onfocus="this.value=='Ваш e-mail'?this.value='':this.value=this.value;" value="Ваш e-mail" alt=""/>
										<div class="err_mes">Поле заполнено некорректно</div>
									</td>
								</tr>
								<tr>
									<td class="lf">
										Тел.
									</td>
									<td>
										<input id="phone_num" type="text" value="+375 (__) ___-__-__" alt=""/>
										<script>
											$(function(){
												$("#phone_num").mask("+375 (99) 999-99-99");
											})
										</script>
									</td>
								</tr>
								<tr>
									<td colspan="2">
										<a href="#" onclick="return valid_form('lind_f','name_lin','email_lin','err_mes'); _gaq.push(['_trackEvent', 'Knopka', '5M_Poluchit']);" class="but_fm"></a>
									</td>
								</tr>
							</table>
						</div>
						<div class="bl_soc" style="width: 452px;">
						</div>
					</div>
					<div class="clr"></div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="cn_bl">

				<div class="down_phone">
					+375 29 68-34-600
				</div>
			</div>
		</div>

<!-- Remarketing tags may not be associated with personally identifiable information or placed on pages related to sensitive categories. For instructions on adding this tag and more information on the above requirements, read the setup guide: google.com/ads/remarketingsetup -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1007840503;
var google_conversion_label = "jK9OCKmj-AMQ99nJ4AM";
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="http://www.google.com/ads/user-lists/1007840503/?label=jK9OCKmj-AMQ99nJ4AM&script=0&random=2348872125"/>
</div>
</noscript>    

<!-- Yandex.Metrika counter --><script type="text/javascript">var yaParams = {/*Здесь параметры визита*/};</script><script type="text/javascript">(function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter24882503 = new Ya.Metrika({id:24882503, webvisor:true, clickmap:true, trackLinks:true, accurateTrackBounce:true, trackHash:true, ut:"noindex",params:window.yaParams||{ }}); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks");</script><noscript><div><img src="//mc.yandex.ru/watch/24882503?ut=noindex" style="position:absolute; left:-9999px;" alt="" /></div></noscript><!-- /Yandex.Metrika counter -->
</body>
</html>
