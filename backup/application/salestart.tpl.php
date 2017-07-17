<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link  type="text/css" rel="stylesheet" href="/views/salestart/css/style.css" />
        <link  type="text/css" rel="stylesheet" href="/views/salestart/css/jquery.formstyler.css" />

        <script type="text/javascript" src="/views/salestart/js/jquery.min.js"></script>
        <script type="text/javascript" src="/views/salestart/js/jquery.maskedinput.min.js"></script>
        <script type="text/javascript" src="/views/salestart/js/jquery.formstyler.min.js"></script>
        <script src="http://api-maps.yandex.ru/2.0/?load=package.full&lang=ru-RU" type="text/javascript"></script>

        <script type="text/javascript" src="/views/salestart/js/main.js"></script>

        <title>Untitled Document</title>
    </head>

    <body>
        <script>
            function make_order(nform,course_id){
               
                $('#company'+nform).removeClass('error');
                $('#name'+nform).removeClass('error');
                $('#email'+nform).removeClass('error');
                $('.phone'+nform).removeClass('error');
                var regex = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
                var company = $('#company'+nform).val();
                var email = $('#email'+nform).val();
                var name = $('#name'+nform).val();
                var phone = $('.phone'+nform).val();
                if (!company){
                    $('#company'+nform).addClass('error');
                }
                if (!name){
                    $('#name'+nform).addClass('error');
                }
                if (!email){
                    $('#email'+nform).addClass('error');
                }
                if (!phone){
                    $('.phone'+nform).addClass('error');
                }
                if(!company || !name || !email || !phone){
                    alert('Заполните все поля заявки!');
                }
                else{
                    email = email.toLowerCase();
                    if(!regex.test(email)){
                        $('#email'+nform).addClass('error');
                        alert('Введите корректный электронный адрес!')
                    }
                    else{
                        var options = new Object();
                        options['email'] = email;
                        options['phone'] = phone;
                        options['name'] = name;
                        options['company'] = company;
                        options['news'] = $('.news'+nform).val();
                        options['course_id'] = parseInt(course_id);
                        $.post('/salestart/make_order', options, function(data){
                            alert(data);
                            $('#f'+nform).hide();
                            $('#fs'+nform).show();
                        });
                        
                    }
                }
            }
        </script>
        <div id="wrapper">
            <div class="block1">
                <div class="cont">
                    <a href="/" id="logo"></a>
                    <div class="text">не подарили,<br />а заработала!</div>
                    <span class="barr"></span>
                </div>
            </div>
            <div class="block2">
                <div class="cont">
                    <div class="line1">Sale<span>START</span></div>
                    <div class="line2">Основной курс по продажам</div>
                    <div class="line3">Хватит впаривать —<br />начни продавать!</div>
                    <img src="/views/salestart/i/block2_slogan.png" alt="" class="img1" />
                    <p>Пусть горит в аду вся эта лживая зудящая реклама! В этом тексте мы не станем искать тысячу причин, почему тебе нужен наш бизнес-курс. Ты взрослый человек и сам все знаешь, раз пришел на эту страницу и дочитал аж до сих пор!</p>
                    <p>Мы не будем петь дифирамбы нашим тренерам и доказывать, насколько у нас, круче, чем у других: не были, не знаем.<br />Но мы можем дать руку директора на отсечение, что после нашего курса ты начнешь продавать лучше.</p>
                    <p>Бизнес-школа РАСТИ создавалась не для того, чтобы скосить бабла. Ну ладно, не только для этого :) Мы реально хотим поделиться своим представлением о том, как продавать хорошо, потому что знаем, как делать это с удовольствием.<br />Лучшее оружие продавца – честность.</p>
                    <p>Будь честным!<br />РАСТИ.</p>
                </div>
            </div>
            <div class="block3">
                <div class="cont">
                    <span>Плохому продавцу</span><br /><span>хорошие мешают</span>
                </div>
            </div>
            <div class="block4">
                <div class="cont">
                    <div class="line1">Кого берем на <span>Sale</span>START</div>
                    <div class="left">
                        <ul>
                            <li>Cкромных, застенчивых людей, которым бывает сложно общаться с незнакомыми</li>
                            <li>Тех, кто не всегда чувствует себя уютно в шкуре продавца</li>
                            <li>Людей, которые пока не накопили опыта в продажах</li>
                            <li>Продавцов, которым иногда бывает неловко предлагать свой товар</li>
                            <li>Опытных, кто любит и умеет продавать, но хочет ускорить свой прогресс</li>
                            <li>Желающих пополнить арсенал практическими тактиками эффективных продаж</li>
                            <li>Людей, которых огорчает «Нет» в ответ</li>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="form" id="f2" style="display:block;">
                            <div class="line2"><span>Инвестиции в себя</span> — <b>3 600 000</b> руб.</div>
                            <div class="line3">Форма заявки:<span>Все поля обязательны для заполнения</span></div>
                            <input type="text" placeholder="Имя" class="name2" name="name2" id="name2" />
                            <input type="text" placeholder="E-mail" class="email2" name="email2" id="email2"  />
                            <input type="text" id="phone1" placeholder="+375 (__) ___-__-__" name="phone2" class="phone2" />
                            <input type="text" placeholder="Компания" class="company2" name="company2" id="company2" />
                            <label for="b4ch1"><input type="checkbox" id="b4ch1" class="news2" name="news2" id="news2" />Я согласен получать новости бизнес-школы</label>
                            <a href="#" onclick="make_order(2,2);return false;" class="btn">Хочу учиться</a>
                        </div>
                        <div class="success" id="fs2" style="display:none;">
                            <div class="s_cont">
                                <p>Спасибо!</p>
                                заявка принята. <br />
                                В ближайшее время с вами<br />
                                свяжется наш менеджер.
                            </div>
                        </div>

                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="block5">
                <div class="cont">
                    <span>А ты бы у себя</span><br /><span>купил?</span>
                </div>
            </div>
            <div class="block6">
                <i></i>
                <div class="cont">				
                    <img src="/views/salestart/i/steve.png" alt="" class="img1"/>
                    <p class="quote_head">Стивен Кови<br /><span>бизнес-лидер мирового масштаба утверждает:</span></p>
                    <p class="quote">«Быстрее всего учишься в трех случаях:<br />до 7 лет, на <a href="#">тренингах</a> и когда жизнь<br />загнала тебя в угол».</p>
                    <p class="line1">Если завтра тебе не надо в школу и в ближайших планах<br />нет безвыходных ситуаций, то единственный оставшийся путь — <br />учиться у тех, кто опытнее в выбранном деле.</p>
                </div>
            </div>
            <div class="block7">
                <div class="cont">
                    <span class="line1">Почему Бизнес-школа РАСТИ?</span><br />
                    <span>Научиться тому, что мы предлагаем, можно и самостоятельно —</span><br />
                    <span>для этого понадобятся годы практики и горы набитых шишек.</span><br />
                    <span>РАСТИ дает площадку для получения концентрированного опыта</span><br />
                    <span>и его безболезненной проверки на деле.</span>
                </div>
            </div>
            <div class="block8">
                <div class="cont">
                    <div class="line1">Только факты</div>
                    <div class="facts">
                        <div class="fact num1"><i></i>Ни одного недовольного выпускника<br />из 250 человек</div>
                        <div class="fact num2"><i></i>Преподаватели — опытные<br />продавцы<br />с безупречной репутацией</div>
                        <div class="fact num3"><i></i>100%<br />уникальность курса, ведь мы создавали его<br />сами</div>
                        <div class="fact num4"><i></i>Специальные тренажеры<br />для прокачки полученной<br />теории</div>
                        <div class="fact num5"><i></i>Опробованная<br />«в бою» методология обучения<br />на трех уровнях</div>
                        <div class="fact num6"><i></i>60% курса — исключительно практика</div>
                        <div class="fact num7"><i></i>Качественный сервис </div>
                        <div class="fact num8"><i></i>Атмосфера, заточенная на учебу</div>
                    </div>
                </div>
            </div>
            <div class="block9">
                <div class="cont">
                    <span>Хватит смущаться:</span><br />
                    <span>это сделка,</span><br />
                    <span>а не первый секс</span>

                </div>
            </div>
            <div class="block10">
                <div class="cont">
                    <div class="line1">С чего бы вам верить,<br />что это поможет?</div>
                    <div class="left">
                        <ul>
                            <li><i>1</i>Мы предлагаем не столько общую теорию о продажах, сколько практические навыки, любой<br />из которых можно применить в ЛЮБОЙ реальной сделке</li>
                            <li><i>2</i>Делимся обнаруженными собственным опытом секретами искусства продаж</li>
                            <li><i>3</i>Результаты тренинга подтверждены успехом выпускников — рост продаж каждого по окончании составляет не менее 40%</li>
                            <li><i>4</i>Мы индивидуально подходим к успехам и ошибкам каждого ученика, помогаем и поддерживаем связь даже по окончании курса</li>
                            <li><i>5</i>За нами стоит уже зарекомендовавшая себя<br />digital-media компания ARTOX.</li>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="form" id="f1" style="display:block;">
                            <div class="line2"><span>Инвестиции в себя</span> — <b>3 600 000</b> руб.</div>
                            <div class="line3">Форма заявки:<span>Все поля обязательны для заполнения</span></div>
                            <input type="text" placeholder="Имя" class="name1" name="name1" id="name1" />
                            <input type="text" placeholder="E-mail" class="email1" name="email1" id="email1"  />
                            <input type="text" id="phone1" placeholder="+375 (__) ___-__-__" name="phone1" class="phone1" />
                            <input type="text" placeholder="Компания" class="company1" name="company1" id="company1" />
                            <label for="b4ch1"><input type="checkbox" id="b4ch1" class="news1" name="news1"  />Я согласен получать новости бизнес-школы</label>
                            <a href="#" onclick="make_order(1,2);return false;" class="btn">Хочу учиться</a>
                        </div>
                        <div class="success" id="fs1" style="display:none;">
                            <div class="s_cont">
                                <p>Спасибо!</p>
                                заявка принята. <br />
                                В ближайшее время с вами<br />
                                свяжется наш менеджер.
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="block11">
                <div class="cont">
                    <div class="line1">Курс по полочкам</div>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th>Основной курс по продажам</th>
                            <td><p>6 дней новой информации об основных правилах и ошибках продавцов, а также твоя личная проверка слова делом. В нашем классе ты можешь безболезненно ошибаться и отчаянно косячить —  чтобы увидеть и исключить все возможные ошибки в дальнейшем.</p></td>
                        </tr>
                        <tr>
                            <th>Наука получать удовольствие<br />от продаж, ничего не впаривая</th>
                            <td><p>Курс отучит тебя от дурной привычки привирать, умалчивать и чувствовать себя неловко, предлагая продукт. Мы учим общаться не с клиентом, а с человеком, предлагая ему не товар, а решение его проблемы. Мы учим продавать не только эффективно, но и честно, повышая прибыль и удовлетворение от собственной работы.</p></td>
                        </tr>
                        <tr>
                            <th>Интерактивная программа<br />по развитию навыков продаж</th>
                            <td>
                                <p>Необходимые любому человеку навыки общения с людьми: как установить контакт, как быть приятным и легким в общении, как задавать вопросы.</p>
                                <p>Специфические навыки продавца: навык аргументации, навык закрытия сделок,  навык обратной связи и умение работать с возражениями покупателя.</p>
                            </td>
                        </tr>
                        <tr>
                            <th>Практический курс<br />по свежеусвоенной теории</th>
                            <td><p>Более 60% курса – практика, где каждый участник может проверить, что данная информация годится не для конспекта, а для дела, а также отобрать для себя техники, которые работают лучше.</p></td>
                        </tr>
                        <tr>
                            <th>Технологии и игровые<br />упражнения</th>
                            <td><p>В работе используются визуализаторы информации. Каждый ученик может увидеть себя со стороны, с помощью видео и обсуждения в группе сформировать понимание того, над какими конкретными нюансами стоит поработать.</p></td>
                        </tr>
                        <tr>
                            <th>Команда профессиональных<br />тренеров</th>
                            <td><p>Для нас понятие «хороший тренер» определяется простым критерием: Хочу как он!</p>
                                <p>Мы даем ученикам возможность самостоятельно выбрать тренера и пройти под его руководством весь курс.</p></td>
                        </tr>
                        <tr>
                            <th>Практика полученных знаний<br />в финальной игре</th>
                            <td><p>На 6-ой день ученикам предстоит бросок в глубокую воду: испытание, которое позволяет в рамках одного дня обнаружить, чему вас реально научил SaleSTART. Ощутите разницу между ДО и ПОСЛЕ.</p></td>
                        </tr>
                        <tr>
                            <th>Закрепление итогов временем</th>
                            <td><p>Применение полученной науки в течение двух недельи обсуждение возникших вопросов на дополнительном пост-тренинговом занятии, где выпускники  поделятся полученным опытом и вынесут новый.</p></td>
                        </tr>
                        <tr>
                            <th>Мощный пинок</th>
                            <td><p>Начнешь зарабатывать деньги как минимум по инерции.</p></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="block9">
                <div class="cont">
                    <span>Меньше текста:</span><br />
                    <span>он твой клиент,</span><br />
                    <span>а не твоя невеста</span>
                </div>
            </div>
            <div class="block12">
                <div class="cont">
                    <div class="left">
                        <p class="line1">Наши гарантии:</p>
                        <ul>
                            <li><i>1</i>Рост результативности продаж в среднем<br />на 40%</li>
                            <li><i>2</i>Усиление осознанности<br />и целенаправленности процесса продажи</li>
                            <li><i>3</i>Знание, как помочь клиенту захотеть<br />продаваемый продукт</li>
                            <li><i>4</i>Ноль эмоций при работе с возражениями</li>
                            <li><i>5</i>Освоение искусства самопрезентации<br />на собеседованиях и встречах</li>
                            <li><i>6</i>Рост заработка при сокращении<br />затраченного</li>
                            <li><i>7</i>Огорчение, что это время закончилось.</li>
                        </ul>
                    </div>
                    <div class="right">
                        <p class="line1">Бонусы:</p>
                        <ul>
                            <li><i>1</i>Три недели максимальной продуктивности</li>
                            <li><i>2</i>Много нового о себе самом</li>
                            <li><i>3</i>Выход из зоны комфорта (на самом деле ее расширение) и ощущение своей реальной<br />силы</li>
                            <li><i>4</i>Простой секрет успешной сделки</li>
                            <li><i>5</i>Полезные контакты</li>
                            <li><i>6</i>Рекомендации от Бизнес-школы РАСТИ</li>
                            <li><i>7</i>Трудоустройство от  Бизнес-школы РАСТИ<br />для примерных безработных учеников </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="block13">
                <div class="cont">
                    <span>Важная встреча?</span><br />
                    <span>Не забудь купить</span><br />
                    <span>жетон</span>
                </div>
            </div>
            <div class="block14">
                <div class="cont">
                    <p class="line1">Основной курс по продажам</p>
                    <div class="total">
                        <div class="total_head"><span>Итого:</span></div>
                        <div class="total_cont">
                            <div class="t_block"><span>6</span> дней занятий</div>
                            <div class="t_block"><span>12</span> участников</div>
                            <div class="t_block"><span>27</span> часов интенсивного </div>
                            <div class="t_block"><span>6</span> новых навыков</div>
                            <div class="t_block n5"><span>>15</span> полезных контактов</div>
                            <div class="t_block">развития</div>
                            <div class="t_block"><span>7</span> домашних заданий</div>
                            <div class="t_block"><span>17</span> игр</div>
                            <div class="t_block"><span>1</span> экстра день пост-тренинга</div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="stages">
                        <div class="stage">
                            <div class="stage_head">
                                <span>1</span>
                                День
                            </div>
                            <div class="stage_name">Установление<br />контакта</div>
                            <p>Расскажем,<br />как легко начать общаться и расположить к себе<br />человека, познав науку слышать и слушать.</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>2</span>
                                День
                            </div>
                            <div class="stage_name">Выявление<br />потребностей</div>
                            <p>Объясним,<br />как понять, что именно нужно клиенту,<br />даже если он сам пока не в курсе.</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>3</span>
                                День
                            </div>
                            <div class="stage_name">Презентация</div>
                            <p>Научим<br />составлять лучшее из возможных впечатление<br />о себе и своем предложении.</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>4</span>
                                День
                            </div>
                            <div class="stage_name">Закрытие<br />сделки</div>
                            <p>Растолкуем,<br />как продать назначенную цену, уступать<br />без ущерба, слышать в ответ «Да!»</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>5</span>
                                День
                            </div>
                            <div class="stage_name">Работа<br />с возражениями</div>
                            <p>Натренируем<br />не тушеваться перед возражениями и «на лету»<br />обращать их в свою пользу.</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>6</span>
                                День
                            </div>
                            <div class="stage_name">Финальная<br />игра</div>
                            <p>Заставим<br />побеждать конкурентов в пугающе реальных<br />условиях. Проверка сил тренером<br />непревзойденной харизмы и жесткости.</p>
                        </div>
                        <div class="stage">
                            <div class="stage_head">
                                <span>7</span>
                                День
                            </div>
                            <div class="stage_name">посттренинг</div>
                            <p>Поможем вспомнить всё в день ПОСТ-ТРЕНИНГА<br />две недели спустя, где выпускники и эксперты<br />разъяснят возникшие трудности.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sign_block">
                <div class="cont">
                    <div class="form" id="f4" style="display:block;">
                        <div class="line2"><span>Инвестиции в себя</span> — <b>3 600 000</b> руб.</div>
                        <div class="line3">Форма заявки:<span>Все поля обязательны для заполнения</span></div>
                        <input type="text" placeholder="Имя" class="name1" name="name4" id="name4" />
                        <input type="text" placeholder="E-mail" class="email4" name="email4" id="email4"  />
                        <input type="text" id="phone1" placeholder="+375 (__) ___-__-__" name="phone4" class="phone4" />
                        <input type="text" placeholder="Компания" class="company4" name="company4" id="company4" />
                        <label for="b4ch1"><input type="checkbox" id="b4ch1" class="news4" name="news4" id="news4" />Я согласен получать новости бизнес-школы</label>
                        <a href="#" onclick="make_order(4,2);return false;" class="btn">Хочу учиться</a>
                    </div>
                    <div class="success" id="fs4" style="display:none;">
                        <div class="s_cont">
                            <p>Спасибо!</p>
                            заявка принята. <br />
                            В ближайшее время с вами<br />
                            свяжется наш менеджер.
                        </div>
                    </div>
                </div>
            </div>

            <div class="block15">
                <div class="cont">
                    <p class="line1">Расписание тренингa <span>sale</span>sprint</p>
                    <div class="tr_block morn">
                        <div>
                            <table class="mt" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr1">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer1.png" alt="" /></span>
                                                <span class="tr_name">Людмила Седых</span>
                                                <span class="tr_left">Осталось 3 места</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2">
                                        <div class="tr_time">
                                            <a href="#" class="show_tr_popup">c 20 июля по 17 авг.</a>
                                            <div class="popup_time">
                                                <i></i>
                                                <a href="#" class="close_popup"></a>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>15</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>21</b> сентября </p>
                                                <p><span class="right">16:00 — 18:00</span>пт. &nbsp;<b>23</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>26</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>пт. &nbsp;<b>29</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>1</b> октября</p>
                                                <p><span class="right">13:00 — 17:00</span>пт. &nbsp;<b>15</b> октября</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col3">9:00 – 12:00</td>
                                    <td class="col4"><a href="#" class="btn">Записаться</a></td>
                                </tr>
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr2">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer2.png" alt="" /></span>
                                                <span class="tr_name">Евгений Галай</span>
                                            </a>
                                            <div class="trainer_popup">
                                                <a href="#" class="close_popup"></a>
                                                <div class="trainer_img"><img src="/views/salestart/i/trainer2.png" alt="" /></div>
                                                <div class="trainer_top">
                                                    <div class="trainer_name">Евгений Галай</div>
                                                    <div class="trainer_quote">«Для того чтобы достичь успеха, делай больше, чем от<br />тебя ожидают» </div>
                                                </div>
                                                <div class="left">
                                                    <p><b>Характер:</b> Целостный</p>
                                                    <p class="mb"><b>Должность:</b> директор по развитию продаж и внедрению инноваций ПОДО «Онега». </p>
                                                    <p><b>Деятельность: </b></p>
                                                    <ul>
                                                        <li>Взращивание инноваций на участке отдела продаж</li>
                                                        <li>Прокачка управленческих сил руководителей среднего и топ-уровня</li>
                                                        <li>Создание авторских тренингов и корпоративных программ по эффективным продажами управлению.</li>
                                                    </ul>
                                                    <p class="mb"><b>Опыт тренерства:</b> более 5 лет. </p>
                                                    <p class="mb"><b>Образование:</b> БГЭУ, Экономика и управление на предприятии промышленности.</p>
                                                    <p><b>Клиенты:</b> Бизнес-школа РАСТИ, Mars Overseas Holdings, Veseltis SRL, Арнест, Amta-Tis, Калина-Бел, ДойлидФарб, Технокласс, Massive, Австрийский свет, Agente digital-agency.<br /><br /></p>
                                                    <p><b>Сильные стороны:</b> изобретательность, остроумие, педантичность.</p>
                                                </div>
                                                <div class="right">
                                                    <p><b>Дополнительно:</b></p>
                                                    <ul>
                                                        <li>Функциональные тренинги по продажам, управлению персоналом, ведению переговоров и обучению всему перечисленному персонала в рамках ООО «Марс»</li>
                                                        <li>Интенсивный курс развития продавцов «SaleSprint» (Бизнес-школа «Расти»)</li>
                                                        <li>Курс подготовки руководителей «ManaGYM» (Бизнес-школа «Расти»)</li>
                                                        <li>Курс по управлению временем «Time Management»</li>
                                                        <li>Тренинги по развитию навыков презентации «Presentation Skills» и «Навыки эффективной презентации»;</li>
                                                        <li>Тренинг по управлению конфликтами «Conflict Management»;</li>
                                                        <li>Тренинг «Эффективные переговоры»;</li>
                                                        <li>«Программа подготовки профессиональных коучей».</li>
                                                    </ul>
                                                    <p><b>Особые отметки:</b><br />Похож на солнышко, влюблен в своего ребенка, тащится от красоты, мудрости, дружбы, Apple и FaceBook.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col2"></td>
                                    <td class="col3"></td>
                                    <td class="col4"><a class="btn disabled">Записаться</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tr_block day">
                        <div>
                            <table class="mt" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr3">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer3.png" alt="" /></span>
                                                <span class="tr_name">Денис Рудько </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2">
                                        <div class="tr_time">
                                            <a href="#" class="show_tr_popup">c 15 авг. по 16 сент. </a>
                                            <div class="popup_time">
                                                <i></i>
                                                <a href="#" class="close_popup"></a>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>15</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>21</b> сентября </p>
                                                <p><span class="right">16:00 — 18:00</span>пт. &nbsp;<b>23</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>26</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>пт. &nbsp;<b>29</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>1</b> октября</p>
                                                <p><span class="right">13:00 — 17:00</span>пт. &nbsp;<b>15</b> октября</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col3">12:00 –16:00</td>
                                    <td class="col4"><a href="#" class="btn">Записаться</a></td>
                                </tr>
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr4">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer4.png" alt="" /></span>
                                                <span class="tr_name">Евгений Веремеев </span>
                                                <span class="tr_left">Осталось 1 место</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2">
                                        <div class="tr_time">
                                            <a href="#" class="show_tr_popup">c 23 сент. по 18 окт. </a>
                                            <div class="popup_time">
                                                <i></i>
                                                <a href="#" class="close_popup"></a>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>15</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>21</b> сентября </p>
                                                <p><span class="right">16:00 — 18:00</span>пт. &nbsp;<b>23</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>26</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>пт. &nbsp;<b>29</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>1</b> октября</p>
                                                <p><span class="right">13:00 — 17:00</span>пт. &nbsp;<b>15</b> октября</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col3">12:00 –16:00</td>
                                    <td class="col4"><a href="#" class="btn">Записаться</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="tr_block evn">
                        <div>
                            <table class="mt" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr5">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer5.png" alt="" /></span>
                                                <span class="tr_name">Александр Андриенко </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2">
                                        <div class="tr_time">
                                            <a href="#" class="show_tr_popup">c 28 окт. по 30 нояб.</a>
                                            <div class="popup_time">
                                                <i></i>
                                                <a href="#" class="close_popup"></a>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>15</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>21</b> сентября </p>
                                                <p><span class="right">16:00 — 18:00</span>пт. &nbsp;<b>23</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>26</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>пт. &nbsp;<b>29</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>1</b> октября</p>
                                                <p><span class="right">13:00 — 17:00</span>пт. &nbsp;<b>15</b> октября</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col3">17:00 – 20:00</td>
                                    <td class="col4"><a href="#" class="btn">Записаться</a></td>
                                </tr>
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr6">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer6.png" alt="" /></span>
                                                <span class="tr_name">Александр Вержбицкий  </span>
                                                <span class="tr_left">Осталось 2 места</span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2">
                                        <div class="tr_time">
                                            <a href="#" class="show_tr_popup">c 28 окт. по 30 нояб.</a>
                                            <div class="popup_time">
                                                <i></i>
                                                <a href="#" class="close_popup"></a>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>15</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>21</b> сентября </p>
                                                <p><span class="right">16:00 — 18:00</span>пт. &nbsp;<b>23</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>26</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>пт. &nbsp;<b>29</b> сентября </p>
                                                <p><span class="right">12:00 — 16:00</span>чт. &nbsp;<b>1</b> октября</p>
                                                <p><span class="right">13:00 — 17:00</span>пт. &nbsp;<b>15</b> октября</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="col3">19:00 – 23:00</td>
                                    <td class="col4"><a href="#" class="btn">Записаться</a></td>
                                </tr>
                                <tr>
                                    <td class="col1">
                                        <div class="trainer_link">
                                            <a href="#" class="tr7">
                                                <span class="tr_img"><img src="/views/salestart/i/trainer7.png" alt="" /></span>
                                                <span class="tr_name">Роман Чвыров </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col2"></td>
                                    <td class="col3"></td>
                                    <td class="col4"><a class="btn disabled">Записаться</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div> 
            </div>


            <div class="reviews">
                <div class="cont">
                    <p class="line1">отзывы</p>
                    <div class="review">
                        <div class="reviews_head">
                            <div class="rh_block rnum1">
                                <img src="/views/salestart/i/review_img1.png" alt="" />
                                <div class="rh_name">Алина Хажовец</div>
                                <div class="rh_work">Ведущий экономист IdeaBank (Сомбелбанк)<br />Опыт продаж – 3 года</div>
                            </div>
                            <div class="rh_block rnum2" style="display:none;">
                                <img src="/views/salestart/i/review_img2.png" alt="" />
                                <div class="rh_name">Юлия Гриневич</div>
                                <div class="rh_work">Cпециалист по продажам «Мобискар»<br />Опыт продаж – 4 года</div>
                            </div>
                            <div class="rh_block rnum3" style="display:none;">
                                <img src="/views/salestart/i/review_img3.png" alt="" />
                                <div class="rh_name">Александр Маргун</div>
                                <div class="rh_work">Cпециалист по продажам ООО «Дом Медиа» (dom.by)<br />Опыт продаж – 2 года</div>
                            </div>
                            <div class="rh_block rnum4" style="display:none;">
                                <img src="/views/salestart/i/review_img4.png" alt="" />
                                <div class="rh_name">Ксения Клепчукова</div>
                                <div class="rh_work">Cпециалист по продажам  Релакс-медиа»<br />Опыт продаж – 4 месяца</div>
                            </div>
                        </div>
                        <div class="left">
                            <p class="line2">Другие отзывы</p>
                            <div class="u_review rnum1" style="display:none;">
                                <div class="ur_img"><img src="/views/salestart/i/review_small_img1.png" alt="" /></div>	
                                <a href="#" class="ur_name" id="rnum1">Алина Хажовец</a>
                                <div class="ur_work">Ведущий экономист IdeaBank (Сомбелбанк)</div>
                            </div>
                            <div class="u_review rnum2">
                                <div class="ur_img"><img src="/views/salestart/i/review_small_img2.png" alt="" /></div>	
                                <a href="#" class="ur_name" id="rnum2">Юлия Гриневич</a>
                                <div class="ur_work">Cпециалист по продажам «Мобискар»</div>
                            </div>
                            <div class="u_review rnum3">
                                <div class="ur_img"><img src="/views/salestart/i/review_small_img3.png" alt="" /></div>	
                                <a href="#" class="ur_name" id="rnum3">Александр Маргун</a>
                                <div class="ur_work">Cпециалист по продажам ООО «Дом Медиа»<br />(dom.by)</div>
                            </div>
                            <div class="u_review rnum4">
                                <div class="ur_img"><img src="/views/salestart/i/review_small_img4.png" alt="" /></div>	
                                <a href="#" class="ur_name" id="rnum4">Ксения Клепчукова</a>
                                <div class="ur_work">Cпециалист по продажам  Релакс-медиа»</div>
                            </div>
                        </div>
                        <div class="right">
                            <div class="review_text">
                                <i></i>
                                <div class="rnum1">
                                    <p>Что было полезным на первом занятии? Теоретическое применение полученных знаний на практике в различных ситуациях; установление контакта с неизвестными людьми разных профессий. Мы отрабатывали навык установления контакта, обратной связи и порядок ведения диалога.</p>
                                    <p>Особенно полезным для меня был навык обратной связи. Я научилась слушать и слышать других. Это действительно важно, так как иногда за своими проблемами забываешь о других. Также хочется отметить отработку техники ведения диалога.</p>
                                    <p>Даже в незнакомой для меня обстановке среди новых людей дискомфорт был не ощутим, или же его просто не было.</p>
                                    <p>Я бы оценила это занятие в 8 баллов. Было, правда, интересно. Но мне трудно судить, так как не посещала тренинги до этого.</p>
                                </div>
                                <div class="rnum2" style="display:none;">
                                    <p>Отправляясь на данный курс, я хотела приобрести больше уверенности в себе, повысить навыки продаж, узнать какие-нибудь новые и интересные технологии продаж. Мало того что я достигла поставленных целей, я приобрела гораздо большее! </p>
                                    <p>Во-первых, это общение с замечательными преподавателями, знакомство с очень дружелюбными и креативными участниками. Во-вторых, много практики и интересных примеров, плюс огромное количество положительных эмоций.</p>
                                    <p>В большинстве все давалось достаточно легко благодаря доступному объяснению преподавателей и легкой позитивной атмосфере. Очень запомнились тематические фильмы ребят, смеялись от души и до слез. Очень важно было получать обратную связь от участников, но хотелось бы и знать мнение преподавателей, как они оценивают. Самым сложным был последний день и финальная игра, достаточно резко из положительной обстановки, нас постарались кинуть в реальность или даже в жесткую действительность, что тоже было весьма полезно! Последнее занятие было достаточно стрессовым, и я бы предпочла пройти еще одно, реабилитирующее.</p>
                                    <p>После окончания тренинга чувствую легкую грусть, очень жаль что эти 6 занятий так быстро пролетели.</p>
                                    <p>Спасибо всем организаторам за нестандартный подход к обучению и ваши замечательные идеи!</p>
                                    <p>Очень рекомендую всем, кому надоел рутинный и повседневный подход к продажам.</p>
                                    <p>Эти ребята ВДОХНОВЛЯЮТ! </p>
                                    <p>Если бы я не прошла SaleSTART, то не узнала бы как это здорово уметь продавать!</p>
                                </div>
                                <div class="rnum3" style="display:none;">
                                    <p>Мой опыт в активных продажах – 2 года. Сейчас работаю в ООО "Дом Медиа" (dom.by).</p>
                                    <p>Ждал начала тренинга с огромным нетерпением. Хотел возобновить в памяти основы продаж, потренироваться в продажах, в условиях максимально приближенных к реальным, узнать "фишечки" тренера. Сполна все это получил и еще вагон сверху! Яркие впечатления, драйв, энергия, позитив, продажи!</p>
                                    <p>Безумно понравилось, что тренер - настоящий профессионал-продавец, который учился продажам на своем личном опыте, а не по книгам. То, что он рассказывал, опираясь на свой огромный практический опыт, позволило и позволит сэкономить месяцы и даже годы своей практики в продажах. Позволит избежать массы ошибок. И конечно в денежном плане окупиться еще не раз и не два.</p>
                                    <p>Безумно понравилась работа с обратной связью. От тренера, от коллег по группе. Видеозапись и просмотр своих тренировочных продаж - это вообще взрыв мозга, переворот в мнении о себе, о том каким тебя видит покупатель. Эти записи открывают массу направлений, в которых тебе еще нужно работать. Ты как на ладони - можно разобрать каждый навык по отдельности, провести работу над ним и улучшить. Это здорово.</p>
                                    <p>Очень понравились видеоролики. Мотивация после них зашкаливает. Ты видишь к чему еще нужно стремиться. Ты видишь, как много нового еще тебе нужно постичь. После них хотелось бежать на встречи, звонить, тренироваться и совершенствоваться!))</p>
                                    <p>Приятная, дружественная, я бы сказал даже семейная обстановка располагала к общению, обмену мнениями, опытом.</p>
                                    <p>Всем огромное спасибо! До встреч на новых курсах!</p>
                                </div>
                                <div class="rnum4" style="display:none;">
                                    <p>Я работаю менеджером по продажам в компании "Релакс-медиа" уже 4 месяца.</p>
                                    <p>Мне очень понравился тренинг, очень много полезного для себя получила.</p> 
                                    <p>Он очень помог мне в работе: теперь, я гораздо лучше выясняю потребности у клиента, не боюсь задавать вопросы, слышать возражения. Я стала чувствовать себя более уверенной в том, что продаю и в тех аргументах, которые привожу. Всем буду теперь советовать посетить тренинг, чтобы научиться продавать.</p>
                                    <p>Спасибо тренеру Людмиле, замечательный тренер. Занятия проходили на одном дыхании. Интересно, необычно и весело :)</p>

                                </div>
                            </div>	
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="video_block">
                <i></i>
                <div class="cont">
                    <p class="line2">видео-Отзывы</p>
                    <div class="video"><iframe width="640" height="390" src="http://www.youtube.com/embed/4549aTduy4U" frameborder="0" allowfullscreen></iframe></div>
                    <div class="video"><iframe width="640" height="390" src="http://www.youtube.com/embed/pZhhO_cZlGU" frameborder="0" allowfullscreen></iframe></div>
                    <p class="line2">От автора</p>
                    <div class="video"><iframe width="640" height="390" src="http://www.youtube.com/embed/jsNc9861KjI" frameborder="0" allowfullscreen></iframe></div>
                </div>
            </div>
            <div class="sign_block">
                <div class="cont">
                    <div class="form" id="f3" style="display:block;">
                        <div class="line2"><span>Инвестиции в себя</span> — <b>3 600 000</b> руб.</div>
                        <div class="line3">Форма заявки:<span>Все поля обязательны для заполнения</span></div>
                        <input type="text" placeholder="Имя" class="name3" name="name3" id="name3" />
                        <input type="text" placeholder="E-mail" class="email3" name="email3" id="email3"  />
                        <input type="text" id="phone1" placeholder="+375 (__) ___-__-__" name="phone3" class="phone3" />
                        <input type="text" placeholder="Компания" class="company3" name="company3" id="company3" />
                        <label for="b4ch1"><input type="checkbox" id="b4ch1" class="news3" name="news3" id="news3" />Я согласен получать новости бизнес-школы</label>
                        <a href="#" onclick="make_order(3,2);return false;" class="btn">Хочу учиться</a>
                    </div>
                    <div class="success" id="fs3" style="display:none;">
                        <div class="s_cont">
                            <p>Спасибо!</p>
                            заявка принята. <br />
                            В ближайшее время с вами<br />
                            свяжется наш менеджер.
                        </div>
                    </div>
                </div>
            </div>
            <div class="our-phone">
                <div class="wrap">
                    <div class="nh1">ИЛИ ЗАПИСАТЬСЯ ПО ТЕЛЕФОНУ <span style="font-size: 48px;display:block;">+375 (29) 377-49-00</span></div>
                    <div class="soc_seti">
                        <img src="/views/salestart/i/bullet_line.png" alt="">
                            <div class="subscribe">
                                <p>Подпишитесь на новости бизнес-школы:</p>
                                <span>E-mail</span>
                                <input id="getSubscribe" type="text"><a href="javascript:void(0);" onclick="mailEmpty();getSubscribe();return false ">Подписаться</a><br />
                                    <div style="clear:left; margin-top:10px;">
                                        <span>E-mail</span>
                                        <input id="getSubscribe" type="text">
                                    </div>
                                    <b style="color:#c00;text-align:left;font:11px tahoma;display:block;"></b>
                            </div>
                            <div style="display: none;" class="subscribe subscribeDone">Для подтверждения подписки перейдите по ссылке в письме, которое мы отправили вам на почту.</div>
                            <div class="soc_links">
                                <p>Или следите за ними в соцсетях:</p>
                                <noindex><a rel="nofollow" href="https://twitter.com/rasti_by" class="first_tw" target="_blank">Twitter</a> | <a rel="nofollow" href="http://www.facebook.com/rasti.by" target="_blank">Facebook</a> | <a rel="nofollow" href="http://vk.com/rasti_by" target="_blank">ВКонтакте</a></noindex>
                            </div>
                            <div class="clear"></div>
                    </div>
                </div>
            </div>
            <section id="map">
                <div class="elka"></div>
                <div class="wrap">
                    <div id="contacts" name="contacts">
                        <!--<ul class="menu">
                                <li><a href="//rasti.by#traincenter">Тренинг-центр</a></li>
                                <li><a href="//rasti.by#salesprint">курсы</a></li>
                                <li><a href="//rasti.by#coach">тренеры</a></li>
                                <li><a href="//rasti.by#schedule">расписание</a></li>
                        </ul>-->
                        <div class="addr">
                            ул. Якуба Коласа 38,<br />бизнес-центр «Айсберг» оф. 25
                        </div>

                        <div class="inner">
                            <div class="label">
                                Телефон:
                            </div>
                            <div class="phones">
                                <div class="tel"><span>+375 (29)</span> 377-49-00</div>
                        <!--    <div class="tel"><span class="code">+375 (17)</span> 296-68-64</div>-->
                            </div> 
                            <div class="label">
                                E-mail:
                            </div>
                            <a href="mailto:info@rasti.by">info@rasti.by</a><br>

                                <div class="clear"></div>

                                </noindex><div class="clear"></div>
                        </div>
                        <a href="#" class="hide open">						
                            <span>контактная информация</span><i></i>

                        </a>
                        <div class="clear"></div>

                    </div>
                </div>
                <div id="myMap"></div>
                <div class="ontop" onclick="ScrollTO('body')"></div>
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



        </div>
    </body>
</html>
