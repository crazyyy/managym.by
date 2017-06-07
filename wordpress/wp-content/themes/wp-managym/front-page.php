<?php /* Template Name: Home Page */ get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>

  <div id="about" class="block-about">
    <div class="container">
      <div class="row">
        <div class="about-description col-lg-7 col-lg-push-5 col-md-7 col-md-push-5"><?php the_field('global_descr'); ?></div>
        <div class="heading-30 col-lg-12 col-md-12">ИСТОРИЯ ПРОЕКТА</div>
        <div class="new_artox col-lg-5 col-md-5">
          <img src="<?php echo the_post_thumbnail_url('full'); ?>" width="272" height="110" alt="">
        </div><!-- /.new_artox col-lg-5 col-md-5 -->
        <div class="new_why_us col-lg-6 col-lg-push-1 col-md-6 col-md-push-1">
          <?php the_content(); ?>
        </div><!-- /.new_why_us col-lg-6 col-lg-push-1 col-md-6 col-md-push-1 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /#about -->

  <?php $image = get_field('about_bgimage'); if( !empty($image) ): ?>
    <div id="o_gym" style="background-image: url(<?php echo $image['url']; ?>);">
  <?php endif; ?>
    <div class="container">
      <div class="row">
        <div class="o_gym_tx col-lg-6 col-lg-push-6 col-md-6 col-md-push-6">
          <span class="zag_gym"><?php the_field('about_title'); ?></span>
          <?php the_field('about_about'); ?>
        </div><!-- /.o_gym_tx col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- o_gym -->

  <div id="konk_prem" class="konk_prem-container">
    <div class="container">
      <div class="row">
        <h3 class="konk_prem--title col-lg-12 col-md-12"><?php the_field('about_title'); ?></h3>
        <div class="one_konks col-md-12 col-lg-12">
          <?php $i = 1; if( have_rows('thirderd_blocks') ): while ( have_rows('thirderd_blocks') ) : the_row();?>
            <div class="konk_op">
              <span class="numb">• <?php echo $i; ?> • </span>
              <span class="red_z"><?php the_sub_field('thirderd_headings'); ?></span>
              <?php the_sub_field('thirderd_content'); ?>
            </div>
          <?php $i++; endwhile; endif; ?>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- konk_prem -->

  <div id="center" class="thirtiimage clearfix">
    <h2 class="superheading"><span><?php the_field('thirtiimage_heading'); ?></span></h2>
    <div class="container">
      <div class="row">
        <div class="thirtiimage-descr col-lg-12 col-md-12">
          <?php the_field('thirtiimage_description'); ?>
        </div><!-- thirtiimage-descr -->
      </div>
    </div>
    <div class="container">
      <div class="row">
        <?php $i = 1; if( have_rows('thirtiimage_blocks') ): while ( have_rows('thirtiimage_blocks') ) : the_row();?>
          <?php if (($i == 4) || ($i == 5)) { ?>
          <div class="col-lg-1 col-md-1"></div>
          <?php } ?>
          <div class="thirtiimage-blocks col-lg-4 col-md-4">
            <?php $image = get_sub_field('image'); if( !empty($image) ): ?>
              <img src="<?php echo $image['url']; ?>" alt="">
            <?php endif; ?>
            <h5 class="thirtiimage_titles"><?php the_sub_field('title'); ?></h5>
            <?php the_sub_field('description'); ?>
          </div><!-- /.thirtiimage-blocks col-lg-4 col-md-4 -->
        <?php $i++; endwhile; endif; ?>
      </div><!-- row -->
    </div><!-- container -->
  </div><!-- thirtiimage -->

  <div id="our_blog" class="our_blog">
    <div class="container">
      <div class="row">
        <div class="our_blog--content col-lg-6 col-lg-push-3 col-md-6 col-md-push-3">
          <span>Следите за новостями MANAGYM в <a href="https://www.facebook.com/managym.by?ref=hl#!/managym.by" target="_blank">соц. сетях</a></span>
          <p>Вы узнаете, как ломаются стереотипы, разбиваются комплексы, примеряются роли и исчезают предубеждения.</p>
        </div><!-- /.our_blog--content col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- our_blog -->

  <div id="coach" class="coach-container">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12"><h2 class="superheading superheading--inverse"><span>2. Тренер-практик</span></h2></div>

        <div class="coach-container--descr col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <p>MANAGYM &mdash; это авторская система тренера-практика, продолжающего совмещать в себе руководителя с многолетним опытом подготовки специалистов различных уровней с тренером-фасилитатором, организующего тренинговые ситуации так, чтобы его присутствие не было чрезмерным, чтобы участники имели пространство мышления и действия. Мы не привлекаем шоуменов, которые забыли, что такое реальность руководства людьми в бизнесе, или фокусников, которые показывают чудеса.</p>
        </div><!-- /.coach-container--descr col-lg-8 col-lg-push-2 col-md-8 col-md-push-2 -->

        <div id="photos" class="photos-container col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <span class="photos-container--img"></span>
          <div class="name_teach">
            <span class="name">юрий</span>
            <span class="surname">анушкин</span>
          </div>
          <p class="teach_cit">«Главное отличие бизнес-тренера от бизнес-преподавателя в том, что он не учит — он создает ситуации. Иначе говоря, практики, кейсы, упражнения и игры — это то, чем тренер создает опыт, помогает сделать выводы, «протаскивает» их в рабочую реальность участников тренинга».</p>
        </div><!-- photos-container -->

        <div class="descr-container col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <p>Руководитель службы развития персонала одного из трех IT-китов Беларуси «Itransition». Один из «основных ответственных» за экспансию Евросети в Беларуси. Директор по персоналу «Евросеть-Беларусь». Директор по персоналу «Алютех». Руководитель службы обучения и развития персонала «Heineken-Беларусь».</p>
        </div><!-- descr-container -->

        <div class="descr-double descr-double--left col-lg-5 col-lg-push-2 col-md-5 col-md-push-2 ">
          <p>С 2004 г. Сертифицированный Специалист по Управлению Проектами — СПУП (Registered Project Management Professional — RPMP).</p>
          <p>Управленец с 15-летним стажем. Тренер и консультант с 10-летним стажем.</p>
          <p><span>Консультировал и тренировал управленческие команды:</span> «ЮКОС», «ЮниМилк», «ZTE», «Henkel», «Silverado», «Русские сладости», «Евросеть», «Развитие Бизнес Систем», «Itransition», «АЛАГОН», «Чайковский текстиль», «Ассопт-Торг», «Импресс Медиа Групп», «РДТЕХ», «Бизнес-Букет», «Морон», «Прайм-тайм»... И мы можем продолжать еще :)</p>
          <p><span>Основная специализация:</span> тренировка и коучинг менеджеров среднего и топ-уровня.</p>
          <p><span>География тренерского опыта:</span> от Калининграда — «АЛАГОН», до Нефтеюганска — «Юкос».</p>
          <p><span>Сферы бизнеса:</span> от B2C-ритейла — «Евросеть», до B2B IT-аутсорсинга — «Itransition».</p>
        </div><!-- descr-double--left col-lg-9 col-md-9 -->

        <div class="descr-double descr-double--right col-lg-3 col-lg-push-2 col-md-3 col-md-push-2">
          <div class="descr-double--right-inner">
            <span class="descr-double--right-title">Специализация</span>
            <p>Автор тренингов и корпоративных программ по следующим направлениям:</p>
            <ul>
              <li>переговоры, противостояние влиянию</li>
              <li>ежедневный тайм-менеджмент</li>
              <li>искусство целеполагания</li>
              <li>корпоративное управление людьми</li>
              <li>тренинги для тренеров в сегменте B2C.</li>
            </ul>
          </div><!-- /.descr-double--right-inner -->
        </div><!-- /.descr-double--right col-lg-9 col-md-9 -->

      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- coach-container -->



  <div class="kurs-programm" id="courses">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12"><h2 class="superheading"><span>3. Программа и расписание</span></h2></div>
        <h5 class="kurs-programm--heading col-lg-12 col-md-12">курс управленческих навыков</h5>
        <div class="kurs-programm--descr col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <p>Программа рассчитана на 9 дней, из них: 8 дней тренинга (более 33 часов), каждодневная практика выполнения «кейса на дом» (16 часов), последний 9-й день посттренинговой поддержки (4 часа). Курс включает 20% теории и 80% отработки правленческих навыков на уникальных тренажерах.</p>
        </div>
        <ul class="lessons-list col-lg-9 col-lg-push-1 col-md-9 col-md-push-1">
          <li class="active" data-id="1"><a href="#">Корпорация</a></li>
          <li data-id="2"><a href="#">Армии<br>наступают</a></li>
          <li data-id="3"><a href="#">Разрыв<br>шаблона</a></li>
          <li data-id="4"><a href="#">Карты<br>на башни</a></li>
          <li data-id="5"><a href="#">Колесо<br>белки</a></li>
          <li data-id="6"><a href="#">Убийство<br>дракона</a></li>
          <li data-id="7"><a href="#">День<br>масок</a></li>
          <li data-id="8"><a href="#">12</a></li>
          <li data-id="9"><a href="#">Посттренинг</a></li>
        </ul>
        <div class="lessons-bloks col-lg-9 col-lg-push-1 col-md-9 col-md-push-1">
          <div class="lesson lesson-1 lesson-active">
            <p>Зубодробительная бизнес-симуляция, которая дает каждому из участников прожить 5 лет в корпорации за 5 часов. Взлеты и подставы, невменяемые подчиненные, конкурентная борьба за власть и, наконец, власть. Вы узнаете о себе все, а самое главное, свой потенциал как управленца и его белые пятна, которые вам предстоит шлифовать оставшиеся 8 дней интенсива MANAGYM.</p>
          </div>
          <div class="lesson lesson-2">
            <p>Как понять, кто такой классный руководитель, если самому не попробовать? Именно попробовать. Мы даем вам 3 армии и подчиненных, с помощью которых вы будете ими руководить. Проверьте свои тип лидерства, посмотрите на себя со стороны, оцените себя. А теперь дайте оценить вас группе. После этого ничего уже не останется прежним: вы станете лидером ситуаций и поклонником как минимум двух стилей лидерства. Домашнее задание «like a boss» только добавит выбранной вами стратегии совершенства.</p>
          </div>
          <div class="lesson lesson-3">
            <p>Как вас воспринимают подчиненные? Вас слышат или прислушиваются? А может просто не понимают, что вы им говорите, и делают так, как "им показалось" правильно? Начинаем ставить задачи так, как нужно. Тренируемся спрашивать за выполнение. Получаем мастер-класс по выговорам для подчиненных. Осваиваем хитрое ремесло делегирования. На закрепление - домашнее задание ППВД.</p>
          </div>
          <div class="lesson lesson-4">
            <p>Поймем, что руководить постройкой вавилонской башни сможет только менеджер, победивший все "информационные пороки" корпорации. Вам самому предстоит построить свою башню в течение четвертого дня, прокачиваясь в построении и модернизации информационных потоков в собственной команде. Каждый столкнется с типичными ошибками в построении вертикальных, горизонтальных и нисходящих информационных схем. Каждый сделает свой выбор в пользу одной из информационных стратегий. На выходе еще + 2 прокачанные компетенции: внутренний пиарщик и интегратор.</p>
          </div>
          <div class="lesson lesson-5">
            <p>Белка движется, и Черчилль с Эйзенхауэром движутся – километры одни и те же, но результаты разные. Разница между белкой и Эйзенхауэром только в колесе, оно близко и заслоняет развитие, оставляя вас один на один с оперативкой. Закончим беготню. В этот день вы прокачаетесь в умении "на раз" отличать стратегию от оперативки. Научитесь правильно расставлять приоритеты сообразно ситуации. Попрактикуетесь в использовании своего внутреннего, "встроенного" тайм-менеджмента. Поймете проблемы идеального руководителя, став на день идеальным сотрудником.</p>
          </div>
          <div class="lesson lesson-6">
            <p>Подготовка – это тренировка. Шестой тренировочный день мы занимаемся совершенствованием навыков контроля и самоконтроля. Естественно, максимально интенсивно прокачиваемся в технологиях мотивации и стимулирования тех, кого вы контролируете или кого вам предстоит контролировать. Все будет отточено в ходе бизнес-игр.</p>
            <p>На выходе вы научитесь правильным методам контроля за подчиненными. Самоконтроль вам потребуется при найме людей на работу в «Минусинске» и в финале, где вы продемонстрируете свои компетенции «великого мотиватора» и «великого самомотиватора» при подготовке вашей команды к убийству дракона.</p>
          </div>
          <div class="lesson lesson-7">
            <p>Маски есть у всех. Часто маски прилипают к лицу. Это вы в образе или ваша маска? А не думали, что маску вы выбрали неудачную, неуправленческую, не под себя? Кто вы по жизни и в переговорах? Путин, Терминатор или Эрик Картман? Детский лепет? Бросьте! Дети уже давно рулят на переговорах, оставляя разумных взрослых в удивлении, злости и без дохода. Давайте менять маски. Или пробовать новые роли для вас, как управленца. У вас будут 4 часа и 3 маски на отработку каждой из ролей. Мало того, мы устроим управленческий батл, чтобы испытать на крепость каждую из масок и тех, кто под ними находится. Вы воспользуетесь навыками этого дня в ближайшей нестандартной ситуации, а домашнее задание «хамелеон» вам только в помощь.</p>
          </div>
          <div class="lesson lesson-8">
            <p>Ощутить себя доктором Хаусом в операционной вы гарантированно сможете, а вот спасти человека удастся только четко выполняя все то, что вы усвоили за предыдущие дни тренировок. Вам сегодня придется управлять по-взрослому. Причем управлять не исполнителями, а равными вам по компетенциям. Выбирайте стиль, речь, маску, тип мотивации, ставьте контроль и тайминг под него, учтите групповую динамику и все остальное, чего было так много, но только спасите жизнь человеку.</p>
          </div>
          <div class="lesson lesson-9">
            <p>Вы сыграете в бизнес-игру, о которой можно сказать сейчас только две вещи: игра определит, насколько отросли и заострились ваши зубы, и насколько увеличился процент в вашей крови управленческих генов.</p>
          </div>
        </div><!-- lessons-bloks col-lg-9 col-lg-push-1 col-md-9 col-md-push-1 -->
      </div><!-- /.row -->
    </div><!-- /.container -->







    <div class="wrap">
      <div class="bord_pay"></div>
      <div class="video_form clearfix">
        <div class="video_in_form">
          <iframe width="515" height="315" src="https://www.youtube.com/embed/LFzgP6EhGzg" style="border: 0px;" allowfullscreen></iframe>
        </div>
        <div class="form_in_form">
          <div class="form_payment">Стоимость обучения  —   980 BYN</div>
          <div id="top_form">
            <div class="top_form clearfix">
              <span>Имя:<sub>*</sub></span>
              <input type="text" id="top_name" name="query[name]" maxlength="50">
            </div>
            <div class="top_form clearfix">
              <span>E-mail:<sub>*</sub></span>
              <input type="text" id="top_mail" name="query[email]" maxlength="50">
            </div>
            <div class="top_form clearfix">
              <span>Телефон:<sub>*</sub></span>
              <input type="text" placeholder="+375 (__) ___-__-__" id="top_phone" name="query[tel]">
            </div>
            <div class="top_form">
              <label><span class="check_f"><input checked="checked" type="checkbox" id="subscribe_top" name="query[subscribe]"></span>Я согласен получать новости MANAGYM</label>
            </div>
            <a href="#topCheck" class="signup" onclick="topEmpty();">Подать заявку</a>
            <input type="hidden" id="courseType" value="Managym">
          </div>
          <div class="succes_top_form" style="display: none;">Спасибо, ваша заявка принята!
            <br> В ближайшее время с вами свяжется наш менеджер.</div>
        </div>
      </div>
    </div>
  </div>



  <div id="applic_center" style="display: none; left: 348px; top: 5261.5px; ">
    <div class="applic_form">
      <a href="#" id="close_applic" onclick="return false;">Закрыть</a>
      <div class="block_form" style="display:block;">
        <div class="nh1">Анкета</div>
        <p>Сегодня <b>гранты</b> на бесплатное обучение — это <b>реальная возможность</b> реализовать свой потенциал.</p>
        <p class="red" style="font-size:12px;">Все поля являются обязательными для заполнения.</p>
        <div class="one_line_form">
          <div class="one_field" style="width:412px; margin-right:18px;">
            <p class="name_field">ФИО</p>
            <span class="bord_field">
<input id="ap_name" style="width:405px" type="text">
</span>
          </div>
          <div class="one_field date_ap" style="width:145px;">
            <p class="name_field date">Дата рождения</p>
            <span class="bord_field" style="margin:0px 8px 0px 0px">
<input id="ap_date" placeholder="01/01/2012" maxlength="10" style="width:100px;" type="text">
</span>
          </div>
        </div>
        <div class="clr"></div>
        <div class="one_line_form">
          <div class="one_field half_bl">
            <p class="name_field">Телефон </p>
            <span class="bord_field">
<input placeholder="+375 __ ___-__-__" id="ap_phone" type="text">
</span>
            <p><span class="qualific_field">Например, +375 29 367-87-98</span></p>
          </div>
          <div class="one_field half_bl">
            <p class="name_field date">E-mail</p>
            <span class="bord_field">
<input id="ap_email" type="text">
</span>
            <label><span class="check_f chek"><input checked="checked" type="checkbox" id="ap_subscribe"></span>Я согласен получать новости MANAGYM</label>
          </div>
        </div>
        <div class="clr"></div>
        <div class="one_line_form">
          <div class="one_field half_bl">
            <p class="name_field">Место работы/учебы</p>
            <span class="bord_field">
<input type="text" id="ap_place">
</span>
          </div>
          <div class="one_field half_bl">
            <p class="name_field date">Должность</p>
            <span class="bord_field">
<input type="text" id="ap_job">
</span>
          </div>
        </div>
        <div class="clr"></div>
        <div class="one_line_form">
          <p>О себе <span class="qualific_field">Напишите, почему именно Вы заслуживаете получить грант на бесплатное обучение<br>в бизнес-школе (не менее 100 слов)</span></p>
          <span class="bord_field">
<textarea rows="5" id="ap_why" cols="100"></textarea>
</span>
        </div>
        <div class="clr"></div>
        <div class="one_line_form">
          <p>Ваши успехи <span class="qualific_field">Опишите 3 самые удачные/невероятные ситуации, где в наивысшей степени<br> проявились ваши управленческие компетенции (не менее 100 слов)</span></p>
          <span class="bord_field">
<textarea rows="5" id="ap_info" cols="100"></textarea>
</span>
        </div>
        <div class="clr"></div>
        <a href="#" onclick="topApplic(); return false;" class="btn" type="application/file">Отправить</a>
        <div class="clr"></div>
      </div>
      <div class="block_ok" style="display:none;">
        <div class="nh1">Спасибо</div>
        <p>Ваша заявка принята в обработку.</p>
      </div>
    </div>
  </div>
  <div id="our_blog1">
    <a href="https://www.facebook.com/managym.by?ref=hl#!/managym.by" target="_blank" class="red_blog_link"></a>
    <div class="wrap">
      <img src="<?php echo get_template_directory_uri(); ?>/img/microfon.png" alt="">
      <div class="blog_news">
        Следите за новостями MANAGYM в <a href="https://www.facebook.com/managym.by?ref=hl#!/managym.by" target="_blank">соц. сетях</a>
        <p>Вы узнаете, как ломаются стереотипы, разбиваются комплексы,
          <br>примеряются роли и исчезают предубеждения.</p>
      </div>
    </div>
  </div>
  <div id="ps">
    <div class="wrap">
      <h2 class="superheading"><span>P.S.</span></h2>
      <div class="nh1">КТО ДЛЯ ВАС БОСС? </div>
      <div class="nh3">Тот, кто слишком эмоционален и многословен? Или тот, кто четко ставит задачи,
        <br> и решает конкретные проблемы со спокойным лицом?</div>
      <div id="video">
        <!-- <embed height="267" width="624" flashvars="file=http://managym.by/files/MANAGYM_.flv&amp;autoplay=0" scale="exactfit" menu="false" wmode="transparent" quality="high" bgcolor="#000000" id="seevideo" src="http://www.artox-media.ru/images/flash/player.swf" style="position: relative; z-index: 1;" type="application/x-shockwave-flash"><img style="position: absolute; z-index: 0; margin-top: 0px; margin-left: -624px;" src="<?php echo get_template_directory_uri(); ?>/img/man_vid_scr.png" width="624" height="267" alt=""> -->
      </div>
      <div class="form_in_form">
        <div class="bott_form_succes">
          <form method="POST" action="http://managym.by/query/add">
            <div class="top_form clearfix">
              <span><sub>*</sub>Имя:</span>
              <input type="text" id="bot_name" maxlength="50">
            </div>
            <div class="top_form clearfix">
              <span><sub>*</sub>E-mail:</span>
              <input type="text" id="bot_mail" maxlength="50">
            </div>
            <div class="top_form clearfix">
              <span><sub>*</sub>Телефон:</span>
              <input type="text" id="bot_phone" placeholder="+375 (__) ___-__-__">
            </div>
            <div class="top_form">
              <label><span class="check_f"><input checked="checked" type="checkbox" id="subscribe_bot" name="query[subscribe]"></span>Я согласен получать новости MANAGYM</label>
            </div>
            <a class="signup" href="#bottomCheck" onclick="botEmpty()">Подать заявку</a>
          </form>
        </div>
        <div class="bottom_succedd" style="display: none;">
          Спасибо, ваша заявка принята!
          <br> В ближайшее время с вами свяжется наш менеджер.
        </div>
      </div>
      <span class="ps_angle"></span>
    </div>
  </div>
  <div class="our-phone">
    <div class="wrap">
      <div class="nh1">ИЛИ ЗАПИСАТЬСЯ ПО ТЕЛЕФОНУ <span style="font-size: 48px;display:block;padding:8px 0 0">+375 29 68-34-600</span></div>
      <div class="soc_seti clearfix">
        <img src="<?php echo get_template_directory_uri(); ?>/img/bullet_line.png" alt="">
        <div class="subscribe">
          <p>Подпишитесь на новости проекта MANAGYM:</p>
          <span>E-mail</span>
          <input id="getSubscribe" type="text"><a href="javascript:void(0);" onclick="mailEmpty();getSubscribe();return false ">Подписаться</a>
          <b style="color:#c00;text-align:left;font:11px tahoma;display:block;"></b>
        </div>
        <div style="display: none;" class="subscribe subscribeDone">Для подтверждения подписки перейдите по ссылке в письме, которое мы отправили вам на почту.</div>
        <div class="soc_links">
          <p>Следите за новостями проекта MANAGYM:</p>
          <a href="https://www.facebook.com/managym.by?ref=hl#!/managym.by" target="_blank">Facebook</a>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
