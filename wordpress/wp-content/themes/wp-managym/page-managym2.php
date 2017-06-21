<?php /* Template Name: managym2 */ get_header(); ?>
  <div class="header">
    <div class="banner">
      <div class="container">
        <div class="row">
         <div class="col-md-8">
          <?php $image = get_field('img_header'); if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
          </div>
          <div class="col-md-4 header_info_block">
            <div class="in_banner_wrap">
              <h1><?php the_title(); ?></h1>
              <p>ТРЕНИНГ УПРАВЛЕНИЯ ОРГАНИЗАЦИЯМИ</p>
              <p class="txt1">Тренируем моделирование, построение и управление системами в процессе становления</p>
              <a href="#toPhone" id="to_telephone">Записатся</a>
            </div>
          </div>
        </div>
        <div class="row menu_top_wrapper">
          <div class="tog-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
          <nav class="headnav--item col-lg-12 col-md-12">
            <?php wpeManagym2HeadNav(); ?>
          </nav>
        </div>
      </div>
    </div>
  </div><!-- header -->

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="menu_slide_down"><?php the_field('first_title'); ?></p>
          <h4>ИСТОРИЯ ПРОЕКТА</h4>
          <div class="content_wrap">
            <?php $image_2 = get_field('history_image'); if( !empty($image_2) ): ?>
            <img src="<?php echo $image_2['url']; ?>" alt="<?php echo $image_2['alt']; ?>" />
            <?php endif; ?>
            <p><?php the_field('history_description'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- content -->

  <div class="banner1">
    <div class="container">
      <div class="row">
        <div class="col-md-6 first_container_img">
          <h4>O MANAGYM</h4>
          <?php if( have_rows('о_managym') ): while ( have_rows('о_managym') ) : the_row(); ?>
            <p><?php the_sub_field('about_item'); ?></p>
          <?php endwhile; endif; ?>
        </div>
        <div class="col-md-6 second_container_img">
            <?php $image_3 = get_field('about_image'); if( !empty($image_3) ): ?>
              <img src="<?php echo $image_3['url']; ?>" alt="<?php echo $image_3['alt']; ?>" />
            <?php endif; ?>
        </div>
      </div>
    </div>
  </div><!-- banner1 -->

<div class="content2">
  <div class="container">
    <div class="row">
    <h4>КОНКУРЕНТНЫЕ ПРЕИМУЩЕСТВА</h4>
      <div class="col-md-12 one_konks">
        <?php if( have_rows('advantages') ): while ( have_rows('advantages') ) : the_row(); ?>
          <div class="konk_op">
                <span class="numb">• <?php the_sub_field('adv_number'); ?> • </span>
                <span class="red_z"><?php the_sub_field('adv_title'); ?></span>
                <p><?php the_sub_field('adv_desc'); ?></p>
          </div>
        <?php endwhile; endif; ?>
      </div><!-- one_konks -->
    </div>
  </div>
</div><!-- content2 -->

<div class="fullSizeBanner">
      <?php $image_4 = get_field('banner_img'); if( !empty($image_4) ): ?>
         <img src="<?php echo $image_4['url']; ?>" alt="<?php echo $image_4['alt']; ?>" />
       <?php endif; ?>
</div><!-- fullSizeBanner -->

<div class="preBanner">
  <div class="container">
    <div class="row">
      <div class="col-md-12 first_row">
        <h2 class="superheading"><span>1. уникальный тренинг-центр</span></h2>
        <p>Тренинг проводится с использованием авторских тренажеров, которые позволяют сжиться с ролями, а затем увидеть себя со стороны. Каждый элемент реквизита имеет смысл и используется в тренинге. Как? Приходите — и узнаете.</p>
      </div>
    </div>
    <div class="row second_row">
    <?php if( have_rows('training_centr') ): while ( have_rows('training_centr') ) : the_row();
    // vars
      $image_item = get_sub_field('training_img'); ?>
      <div class="col-md-4 content_block">
        <img src="<?php echo $image_item['url']; ?>" alt="<?php echo $image_item['alt'] ?>" />
        <p class="titl"><?php the_sub_field('training_title'); ?></p>
        <p class="descr"><?php the_sub_field('training_desc'); ?></p>
      </div>
    <?php endwhile; endif; ?>
    </div>
  </div>
</div><!-- preBanner -->

<div class="socialBanner">
  <div class="container">
    <div class="row">
    <div class="col-md-4">
      <img src="<?php echo get_template_directory_uri(); ?>/img/live.png" alt="">
    </div>
      <div class="col-md-8 ">
        <p class="yellowTxt1">Следите за новостями MANAGYM в <span>соц. сетях</span></p>
        <p>Вы узнаете, как ломаются стереотипы, разбиваются комплексы, примеряются роли и исчезают предубеждения.</p>
      </div>
    </div>
  </div>
</div><!-- socialBanner -->

<div class="blackCover">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="prebanner">
          <h2 class="superheading"><span>2. тренерский состав</span></h2>
        </div>
        <div class="coach_info">
          <span class="photos-container--img"></span>
          <h4>ЮРИЙ АНУШКИН</h4>
          <p>«Главное отличие бизнес-тренера от бизнес-преподавателя в том, что он не учит — он создает ситуации. Иначе говоря, практики, кейсы, упражнения и игры — это то, чем тренер создает опыт, помогает сделать выводы, «протаскивает» их в рабочую реальность участников тренинга».</p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="descr-container col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <p>Директор «QA-academy», экс-начальник отдела персонала одного из трех IT-китов Беларуси «Itransition». Бывший HRD «Алютех» и «Евросеть», Lead Master Trainer of Heineken C&EE «Heineken-Беларусь».</p>
        </div><!-- descr-container -->

        <div class="descr-double descr-double--left col-lg-5 col-lg-push-2 col-md-5 col-md-push-2 ">
          <p> С 2004 г. Сертифицированный Специалист по Управлению Проектами — СПУП </p>
          <p>(Registered Project Management Professional — RPMP). </p>
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
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="coach_info second_coach_info">
          <span class="photos-container--img_second"></span>
          <h4 class="second_name">АНДРЕЙ МИРОШНИЧЕНКО</h4>
          <p> «Вопрос не в том, чему вы учитесь на тренингах. Вопрос в том, чему вы учитесь в  своей повседневной профессиональной деятельности и жизни. Какую свою деятельность вы готовы совершенствовать и развивать вечно? Какие цели и  ценности должны быть в этой деятельности? Как вы должны ее осуществлять, чтоб  постоянно совершенствовать?» </p>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="descr-container col-lg-8 col-lg-push-2 col-md-8 col-md-push-2">
          <p> Консультировал и сотрудничал с такими компаниями как: «РЖД», ФПУ «Синергия», Нацбанк РБ, РДТЕХ, СТА Логистик, Ситек, "Райдла Лейинш Норкус", КоСмарт, Fasionzone.by, Еврокара, Дайнова, Психологический центр Елены Арлановой и др. </p>
        </div><!-- descr-container -->

        <div class="descr-double descr-double_second descr-double--right col-lg-3 col-lg-push-2 col-md-3 col-md-push-2">
          <div class="descr-double--right-inner">
            <span class="descr-double--right-title">Специализация</span>
            <p>Автор тренингов и корпоративных программ по следующим направлениям:</p>
            <ul>
              <li>постановка и решение управленческих задач</li>
              <li>выявление и снятие системных ограничений фирмы</li>
              <li>управление знаниями и компетенциями</li>
              <li>создание самообучающейся организации</li>
              <li>управление талантами.</li>
            </ul>
          </div><!-- /.descr-double--right-inner -->
        </div><!-- /.descr-double--right col-lg-9 col-md-9 -->

        <div class="descr-double descr-double--left col-lg-5 col-lg-push-2 col-md-5 col-md-push-2 ">
          <p>Руководитель Центра управления знаниями и компетенциями Института философии НАН РБ, преподаватель Русской школы управления, Эксперт школы EMAS по управлению знаниями и компеенциями, приглашенный лектор в нескольких белорусских бизнес-школах.</p>
          <p> Кандидат философских наук, профессиональный коуч ICU, бизнес-консультант. </p>
          <p> Ведущий консультант по управлению «Интелпарт», специалист по управлению интеллектуальными активами «СТА Логистик», менеджер по управлению нтеллектуальными активами «Ситек», преподаватель БГУ. </p>
          <p> Основная специализация: коучинг первых лиц организаций, управление знаниями и компетенциями, создание систем непрерывного совершенствования деятельности. </p>
        </div><!-- descr-double--left col-lg-9 col-md-9 -->

    </div>
  </div>
</div><!-- blackCover -->

<div class="contProg" id="toProgramm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h2 class="superheading"><span>3. программа и расписание</span></h2>
        <p class="underheading"> КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ</p>
        <p>Программа рассчитана на 9 дней, из них: 8 дней тренинга (более 33 часов), каждодневная практика выполнения «кейса на дом» (16 часов), последний 9-й день посттренинговой поддержки (4 часа). Курс включает 20% теории и 80% отработки управленческих навыков на уникальных тренажерах.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="tabs">
          <ul class="tab_wrap">
            <li class="tab active">День 1 <span>Личность как капитал</span></li>
            <li class="tab">День 2 <span>Цена доверия</span></li>
            <li class="tab">День 3 <span>Партнерство ради денег</span></li>
            <li class="tab">День 4 <span>Пределы успеха</span></li>
            <li class="tab">День 5 <span>Исправление ошибок и наращивание эффективности</span></li>
            <li class="tab">День 6 <span>Решение управленческих задач</span></li>
            <li class="tab">День 7 <span>Драматургия бизнеса</span></li>
            <li class="tab">День 8 <span>Полезные диверсии в бизнесе</span></li>
          </ul>
          <div class="tabcontent current">
            <p><?php the_field('day_1_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_2_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_3_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_4_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_5_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_6_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_7_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
          <div class="tabcontent">
            <p><?php the_field('day_8_text'); ?></p>
            <iframe width="500" height="315" src="https://www.youtube.com/embed/MKES4YjCksg" frameborder="0" allowfullscreen></iframe>
            <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
          </div>
        </div><!-- tabs -->
    </div>
  </div>
 </div>
</div><!-- contProg -->

<div class="socialBanner">
  <div class="container">
    <div class="row">
    <div class="col-md-4">
      <img src="<?php echo get_template_directory_uri(); ?>/img/live.png" alt="">
    </div>
      <div class="col-md-8 ">
        <p class="yellowTxt1">Следите за новостями MANAGYM в <span>соц. сетях</span></p>
        <p>Вы узнаете, как ломаются стереотипы, разбиваются комплексы, примеряются роли и исчезают предубеждения.</p>
      </div>
    </div>
  </div>
</div><!-- socialBanner -->

<div class="blackForm">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php echo do_shortcode('[contact-form-7 id="190" title="КУРС УПРАВЛЕНЧЕСКИХ НАВЫКОВ"]'); ?>
      </div>
    </div>
  </div>
</div><!-- blackForm -->

<div class="our-phone" id="toPhone">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="nh1">ИЛИ ЗАПИСАТЬСЯ ПО ТЕЛЕФОНУ <span>+375 29 68-34-600</span></div>
      </div>
    </div>
    <div class="row alignment">
    <img src="<?php echo get_template_directory_uri(); ?>/img/bullet_line.png" alt="">
      <div class="col-md-6">
        <p>Подпишитесь на новости проекта MANAGYM:</p>
        <div class="subscribe">
          <span>E-mail</span>
          <input type="text">
          <a href="#">Подписатся</a>
        </div>
      </div>
      <div class="col-md-6">
        <p class="follow_news">Следите за новостями проекта MANAGYM:</p>
        <a href="#" class="social_button">Facebook</a>
        <div class="scrollToTop"></div>
      </div>
    </div>
  </div>
  <div class="elka"></div>
</div><!-- our-phone -->

<?php get_footer(); ?>
