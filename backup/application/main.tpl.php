<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link type="text/css" rel="stylesheet" href="/views/main/css/style.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1440.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1366.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1280.css" />
        <link type="text/css" rel="stylesheet" href="/views/main/css/style_1024.css" />

        <script src="/views/main/js/jquery.min.js"></script>
        <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>
        <script src="/views/main/js/css3-mediaqueries.js"></script>
        <script src="/views/main/js/jquery.bxslider.min.js"></script>
        <script src="/views/main/js/main.js"></script>
        <script src="/views/main/js/resize.js"></script>

        <title>Untitled Document</title>
    </head>

    <body>

        <div id="wrapper">
            <div id="header">
                <a href="/" id="logo"></a>
                <a href="#" onclick="alert('На стадии разработки');return false;" class="h_video"><span>Видео о школе</span><i></i></a>
                <div class="h_phone">+375 (29) 377-49-00</div>
                <a href="" onclick="alert('На стадии разработки');return false;" class="skype"></a>
                <div class="h_social">
                    <a href="https://www.facebook.com/rasti.by" class="fb"></a>
                    <a href="http://vk.com/rasti_by" class="vk"></a>
                    <a href="http://www.youtube.com/user/SchoolRASTI?feature=watch" class="yt"></a>
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
                        <li><a href="#" onclick="alert('На стадии разработки');return false;">О школе</a></li>
                        <li><a href="#" onclick="alert('На стадии разработки');return false;">гранты</a></li>
                        <li><a href="/club">Клуб расти</a></li>
                        <li><a href="#" onclick="alert('На стадии разработки');return false;">обучение в кредит</a></li>
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
                <div class="news_head">LIVE.RASTI.BY</div>

                <? if ($liverasti): ?>
                    <? foreach ($liverasti as $l): ?>
                        <a href="//<?= $l['url'] ?>" target="_blank" class="news_block">
                            <span class="news_img"><img src="/views/content/<?= $l['photo'] ?>" alt="" /></span>
                            <span class="news_text">
                                <span class="news_date"><?= date('d.m.Y', $l['date']) ?></span><br />
                                <span class="news_name"><?= $l['name'] ?></span><br />
                                <span class="news_descr"><?= $l['descr'] ?></span>
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
                        <div class="flc_head">Найдите нас на Facebook</div>
                        <img src="/views/main/i/facebook.png" alt="" />
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
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item1"><img src="/views/main/i/clients/client1.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item2"><img src="/views/main/i/clients/client2.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item3"><img src="/views/main/i/clients/client3.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item4"><img src="/views/main/i/clients/client4.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item5"><img src="/views/main/i/clients/client5.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item6"><img src="/views/main/i/clients/client6.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item7"><img src="/views/main/i/clients/client7.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item8"><img src="/views/main/i/clients/client6.png" alt="" /></a></td></tr></table></li>
                    <li><table cellpadding="0" cellspacing="0"><tr><td><a href="#" id="item9"><img src="/views/main/i/clients/client7.png" alt="" /></a></td></tr></table></li>

                </ul>
                <div class="tipsy_popup">
                    <div class="tp_text item1">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item1  </div>
                    <div class="tp_text item2">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item2  </div>
                    <div class="tp_text item3">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item3  </div>
                    <div class="tp_text item4">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item4  </div>
                    <div class="tp_text item5">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item5  </div>
                    <div class="tp_text item6">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item6  </div>
                    <div class="tp_text item7">Хотелось бы поблагодарить Вас за удивительные тренинги. Мне очень понравился подход Юрия. Я достаточно много посещал различного рода мероприятия как для руководителей, так и для простых продавцов. Но ваш подход к обучению для меня стал настоящим прорывом. Но ваш подход к обучению для меня настоящим прорывом настоящим прорывом. Но ваш подход к обучению. для меня настоящим прорывом.  item7  </div>
                    <a href="#" class="close_popup"></a>
                    <i class="tarr"></i>
                </div>
            </div>
            <section id="map">
                <div class="elka"></div>
                <div class="wrap">
                    <div id="contacts" name="contacts">		
                        <div class="inner">
                            <img src="/views/main/i/contacts.png" alt="" style="margin-left:-10px; margin-top:10px;"/>

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
                    <a href="https://www.facebook.com/rasti.by" class="fb"></a>
                    <a href="http://vk.com/rasti_by" class="vk"></a>
                    <a href="http://www.youtube.com/user/SchoolRASTI?feature=watch" class="yt"></a>
                </div>
            </div>
        </div>

    </body>
</html>
