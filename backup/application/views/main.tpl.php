<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name='yandex-verification' content='7d9fc53d5d1f15b5' />
		<meta name="google-site-verification" content="tP5-quZW2ooas5pxp3LYDx3m-eWdD8sNxyFR1U5kMgM" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style.css" />
		<link type="text/css" rel="stylesheet" href="/views/main/css/jquery.tipsy.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1440.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1366.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1280.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1024.css" />

        <script src="/views/main/js/jquery.min.js"></script>
        <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
        <script src="/views/main/js/css3-mediaqueries.js"></script>
        <script src="/views/main/js/jquery.bxslider.min.js"></script>
		 <script src="/views/main/js/jquery.tipsy.js"></script>
        
        <script src="/views/main/js/resize.js"></script>
		<script src="/views/main/js/main.js"></script>
		<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-32332391-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>



<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter15162850 = new Ya.Metrika({id:15162850,
                    webvisor:true,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true});
        } catch(e) { }
    });

    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f, false);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/15162850" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
<!-- Код тега ремаркетинга Google -->
<!--------------------------------------------------
С помощью тега ремаркетинга запрещается собирать информацию, по которой можно идентифицировать личность пользователя. Также запрещается размещать тег на страницах с контентом деликатного характера. Подробнее об этих требованиях и о настройке тега читайте на странице http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 1007840503;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1007840503/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

       <title><?=$title?></title>
  	
 	 <meta name="keywords" content="<?=$keywords?>" />
  	<meta name="description" content="<?=$description?>" />
  	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-29405806-5', 'auto');
  ga('send', 'pageview');

</script>
    </head>

    <body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=195830480447177";
		fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<script>
		$(".rasti_tipsy").tipsy();
		</script>
        <div id="wrapper">
            <div id="header">
                <a href="/" id="logo"></a>
                <a href="http://www.youtube.com/user/SchoolRASTI?feature=watch"  class="h_video" target="_blank"><span>Видео о школе</span><i></i></a>
                <div class="h_phone"><?= htmlspecialchars_decode($this->database->get_field('static_page', 16, 'page')) ?></div>
                <a href="#" onclick="return false;" style="cursor:default;"  class="skype rasti_tipsy" title="rasti_bs"></a>
                <div class="h_social">
                	<a href="http://instagram.com/rasti_bs" class="in" target="_blank"></a>
                    <a href="https://www.facebook.com/rasti.by" class="fb" target="_blank"></a>
                    <a href="http://vk.com/rasti_by" class="vk" target="_blank"></a>
                    <a href="http://www.youtube.com/user/SchoolRASTI?feature=watch" class="yt" target="_blank"></a>
                </div>
            </div>
            <div class="top_square">
                <? if ($courses6): ?>
                    <? foreach ($courses6 as $c6): ?>
                        <div class="ts_block">
                            <a href="/<?= $c6['url'] ?>" class="hover"></a>
                            <div class="ts_img">
                                <img src="/views/content/<?= $c6['photo'] ?>" alt="" />
                                <div class="ts_name"><?= $c6['teacher'] ?></div>
                            </div>
                            <div class="ts_text"><table cellpadding="0" cellspacing="0"><tr><td>
                                            <div class="type"><?= $c6['text1'] ?></div>
                                            <div class="name"><?= $c6['name'] ?></div>
                                            <div class="sur_name"><?= $c6['text2'] ?></div>
                                        </td></tr></table></div>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>

                <div class="clear"></div>
            </div>
            <div class="menus">
                <div class="l_menu">
                    <ul>
                        <li><a href="https://www.dropbox.com/s/ucuvculrktm3d8t/%D0%90%D1%84%D0%B8%D1%88%D0%B0.pdf" target="_blank">Афиша</a></li>
                        <li><a href="http://instagram.com/rasti_bs" target="_blank">Instagram</a></li>
                        <li><a href="/club">Клуб расти</a></li>
                        <li><a href="https://soundcloud.com/rasti_bs" target="_blank">SoundCloud</a></li>
                    </ul>				
                </div>	
                <div class="r_menu">
                    <div class="rm_head">Курсы по управлению</div>
                    <ul>
                        <? if ($courses): ?>
                            <? foreach ($courses as $c): ?>
                                <? if ($c['category_id'] == 1): ?>
                                    <li><a href="/<?= $c['url'] ?>"><span><?= $c['name'] ?></span></a></li>
                                <? endif; ?>
                            <? endforeach; ?>
                        <? endif; ?>

                    </ul>
                </div>
                <div class="r_menu">
                    <div class="rm_head">Курсы по продажам</div>
                    <ul>
                        <? if ($courses): ?>
                            <? foreach ($courses as $c): ?>
                                <? if ($c['category_id'] == 2): ?>
                                    <li><a href="/<?= $c['url'] ?>"><span><?= $c['name'] ?></span></a></li>
                                <? endif; ?>
                            <? endforeach; ?>
                        <? endif; ?>
                    </ul>
                </div>
                <div class="r_menu">
                    <div class="rm_head">Курсы по саморазвитию</div>
                    <ul>
                        <? if ($courses): ?>
                            <? foreach ($courses as $c): ?>
                                <? if ($c['category_id'] == 3): ?>
                                    <li><a href="/<?= $c['url'] ?>"><span><?= $c['name'] ?></span></a></li>
                                <? endif; ?>
                            <? endforeach; ?>
                        <? endif; ?>
                    </ul>
                </div>			
                <div class="clear"></div>
            </div>
            <div class="news">
                <div class="news_head"><a href="//live.rasti.by" style="color:black" target="_blank">LIVE.RASTI.BY</a></div>

                <? if ($liverasti): ?>
                    <? foreach ($liverasti as $l): ?>
                        <a href="//<?= $l['url'] ?>" target="_blank" class="news_block">
                            <span class="news_img"><img src="/views/content/<?= $l['photo'] ?>" alt="" /></span>
                            <span class="news_text">
                                <span class="news_date"><span><?= date('d.m.Y', $l['date']) ?></span></span><br />
                                <span class="news_name"><span><?= $l['name'] ?></span></span><br />
                                <span class="news_descr"><span><?= $l['descr'] ?></span></span>
                            </span>
                        </a>
                    <? endforeach; ?>
                <? endif; ?>
                <div class="clear"></div>
            </div>
            <div class="bot_info">
                <div class="fl_block">
                    <div class="fl_head">мы в соцсетях</div>
                    <div class="flc_block">
                        <div class="fb-like-box" data-href="https://www.facebook.com/rasti.by" data-width="292" data-height="298" data-show-faces="true" data-header="true" data-stream="false" data-show-border="false"></div>
                    </div>
                </div>
                <div class="fl_block">
                    <div class="fl_head">мы в youtube</div>
                    <?= htmlspecialchars_decode($this->database->get_field('static_page', 15, 'page')) ?>
                </div>
                <div class="reviews">
                    <div class="fl_head">отзывы</div>	
                    <div class="reviews_cont">
                        <i class="barr"></i>
                        <span class="bot_shadow"></span>
                        <div class="reviews_border">
                            <ul>
                                <? if ($ucomments): ?>
                                    <? foreach ($ucomments as $u): ?>
                                        <? if ($u['com']): ?>
                                        
                                            <li>
                                                <div class="review">
                                                    <div class="review_name"><?= $u['name'] ?></div>
                                                    <div class="review_type"><?= $u['company'].($u['poste']?', '.$u['poste'].'.':'.') ?> <br>Курс <?= $u['course'] ?></div>
                                                    <? foreach ($u['com'] as $c): ?>    
                                                        <?= $c['descr_full']; ?> <br/>
                                                    <? endforeach; ?>
                                                </div>
                                            </li>
                                        <? endif; ?>
                                    <? endforeach; ?>
                                <? endif; ?>
                            </ul>
                        </div>	
                    </div>
                </div>
                <div class="clear"></div>

            </div>
            <div class="clients">
                <div class="cl_head">Наши клиенты</div>

                <ul>
                    <? if ($ccomments): ?>
                        <? foreach ($ccomments as $u): ?>
                            <? if ($u['com']): ?>
                                <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" class="brands" id="item<?= $u['id'] ?>"><img src="/views/content/<?= $u['photo'] ?>" alt="" data-imagehov="/views/content/<?= $u['photo_active'] ?>" data-image="/views/content/<?= $u['photo'] ?>"/></a></td></tr></table></li>
                            <? endif; ?>
                        <? endforeach; ?>
                    <? endif; ?>
                </ul>
                <div class="tipsy_popup">
                    <? if ($ccomments): ?>
                        <? foreach ($ccomments as $u): ?>
                            <? if ($u['com']): ?>
                                <div class="tp_text item<?= $u['id'] ?>">
                                    <? foreach ($u['com'] as $c): ?>    
                                        <?= $c['descr_full']; ?> <br/>
                                    <? endforeach; ?>
                                </div>
                            <? endif; ?>
                        <? endforeach; ?>
                    <? endif; ?>
                    <a href="#" class="close_popup"></a>
                    <i class="tarr"></i>
                </div>

            </div>
            <section id="map">
                <div class="elka"></div>
                <div class="wrap">
                    <div id="contacts" name="contacts">		
                        <div class="inner">

                           <?= htmlspecialchars_decode($this->database->get_field('static_page', 14, 'page')) ?>

                            <div class="clear"></div>

                            </noindex><div class="clear"></div>

                        </div>
                        <a href="#" class="hide open"><i></i></a>
                        <div class="clear"></div>

                    </div>
                </div>
                <div id="myMap"></div>
            </section>
            <script type="text/javascript">
                ymaps.ready(initMaps);
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // $('#tel').mask('+375(99)999-99-99');
                    $('button.signup').click(function(){
				
                        $("#schedule .today").hide();
                        $("#schedule .apply").show();
                    });
                    $("header .signup").click(function(){
                        $("#schedule .today").hide();
                        $("#schedule .apply").show();
                        ScrollTO('#form');
                        return false;
                    });
			  
			  
                    $("#descr .text button").click(function(){
                        $("#descr .text .hidden").slideToggle();
                        $(this).toggleClass("open");
                        if($(this).find("span").text()=="А также")
                            $(this).find("span").text('Свернуть');
                        else
                            $(this).find("span").text('А также');
                    });
			   
                });
            </script>
            <div id="footer">
                <div class="copyright">© 2013 ООО «АРТОКС» </div>
                <a href="/" class="f_logo"></a>
                <div class="f_social">
                	<a href="http://instagram.com/rasti_bs" class="in" target="_blank"></a>
                    <a href="https://www.facebook.com/rasti.by" class="fb" target="_blank"></a>
                    <a href="http://vk.com/rasti_by" class="vk" target="_blank"></a>
                    <a href="http://www.youtube.com/user/SchoolRASTI?feature=watch" class="yt" target="_blank"></a>
                </div>
            </div>
        </div>

    </body>
</html>
