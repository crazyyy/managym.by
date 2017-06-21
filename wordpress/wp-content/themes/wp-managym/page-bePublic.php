<?php /* Template Name: bePublic */ get_header(); ?>
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-push-6">
        <h1 class="page_header_title"><?php the_title(); ?></h1>
        <p class="undertitle">Как выступать умело и вести за собой</p>
        <p class="italic">«Публичное выступление – место, где удовольствие от публичности смешивается с ужасом от выступления перед толпой».</p>
        <p class="italic">«Страх публичных выступлений стоит на втором месте в списках страхов человека».</p>
        <p class="s16">— Юрий Анушкин, тренер</p>
        <div class="ib">
          <a href="#priceblock" class="button" id="toPrice">Записатся</a>
        </div>
      </div>
    </div>
     <div class="menu">
     <div class="tog-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
        <?php wpePublicHeadNav(); ?>
      </div>
  </div>
</div><!-- header -->

<div class="orators">
  <div class="container">
    <div class="row">
      <div class="col-md-7 toLeft">
        <h2>ВЫСТУПАТЬ ПРИХОДИТСЯ ВСЕМ. НО УМЕЕТЕ ЛИ ВЫ ЭТО ДЕЛАТЬ?</h2>
        <p>Если вы хотите сделать <b>блестящую карьеру руководителя</b>, то мало уметь хорошо управлять - важно уметь вести людей за собой, а для этого нужно выступать публично.</p>
        <p>Став управленцем, вам <b>постоянно приходится выступать</b> перед большими или малыми группами людей (совещания, стратегические сессии, корпоративы, планерки). Каждое такое событие - это возможность вдохновить, мотивировать и повести людей за собой.</p>
        <p>Если вам не нравится выступать, то это только потому, что вы не умеете делать это правильно. Однако <b>стоит вам этому научиться</b>, у вас тут же просыпается азарт, и вы начинаете жадно ловить каждую возможность выступить.</p>
      </div>
      <div class="col-md-5 toRight bg_icon">
        <h3>ОРАТОРАМИ <br> НЕ РОЖДАЮТСЯ, ИМИ СТАНОВЯТСЯ</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 megusta">
        <p>Вы выступаете не потому, что «надо», а потому, что <span>«хочется»</span> и <span>«нравится»</span>.</p>
      </div>
    </div>
  </div>
</div><!-- orators -->

<div class="portrait">
  <p class="s18">Нужно <span>не просто</span> хорошо управлять, нужно <b>уметь вести людей за собой.</b></p><br>
  <p class="s18">А это невозможно без публичных выступлений.</p>
</div><!-- portrait -->

<div class="priceblock" id="priceblock">
  <div class="container">
    <div class="row">
      <div class="col-md-6 toLeft">
        <div class="price_right_wrap">
          <h4>ЭТОТ ТРЕНИНГ ДЛЯ ВАС, ЕСЛИ:</h4>
          <ul>
          <?php if( have_rows('training_reasons') ): while ( have_rows('training_reasons') ) : the_row(); ?>
            <li><?php the_sub_field('reason'); ?></li>
            <?php endwhile; endif; ?>
          </ul>
          <div class="bottom_text">
            <p>Приходите на тренинг-интенсив bePublic.<b>Научитесь делать то, что все делать боятся.</b></p>
          </div>
        </div>
      </div>
      <div class="col-md-6 toRight">
        <div class="price_left_wrap">
          <p class="s20">СТОИМОСТЬ ОБУЧЕНИЯ — 90 BYN.</p>
          <?php echo do_shortcode('[contact-form-7 id="182" title="Стоимость обучения"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div><!-- priceblock -->

<div class="schedule">
  <div class="container">
    <h5>ПРОГРАММА 4-ЧАСОВОГО ТРЕНИНГА-ИНТЕНСИВА</h5>
    <?php if( have_rows('4_hours_training') ): while ( have_rows('4_hours_training') ) : the_row(); ?>
    <div class="row">
      <div class="col-md-6 right_schedule">
        <p><?php the_sub_field('title_one'); ?></p>
      </div>
      <div class="col-md-6 left_schedule">
        <p class="first_paragraph"><?php the_sub_field('descr_one'); ?></p>
      </div>
    </div>
    <?php endwhile; endif; ?>
  </div>
</div><!-- schedule -->

<div class="results">
  <div class="container">
    <div class="row">
      <h5>КАКИХ РЕЗУЛЬТАТОВ ЖДАТЬ?</h5>
      <div class="divide"></div>
      <p class="between_deviders">НАУЧИТЬСЯ ВЫСТУПАТЬ ПУБЛИЧНО НЕВОЗМОЖНО, ЧИТАЯ КНИГИ И ПРОСМАТРИВАЯ ОБУЧАЮЩИЕ ВИДЕОРОЛИКИ.<br> ЭТОТ НАВЫК ФОРМИРУЕТСЯ В ПРОЦЕССЕ АКТИВНОЙ ТРЕНИРОВКИ.</p>
      <div class="divide"></div>
      <div class="col-md-5 col-md-push-1 first-res">
        <p>На тренинге bePUBLIC вы будете <b>выступать постоянно</b>. Под руководством тренера путем многократного повторения простых упражнений навык выступления будет сформирован на уровне рефлекса.</p>
        <strong>Вы будете знать</strong>
        <ul>
        <?php if( have_rows('expected_results') ): while ( have_rows('expected_results') ) : the_row(); ?>
          <li><?php the_sub_field('results_1'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
        <div class="selfvideo">
          <p>ПО ИТОГУ ТРЕНИНГА КАЖДЫЙ ПОЛУЧИТ <span>СОБСТВЕННУЮ ВИДЕОЗАПИСЬ</span> С РАЗБОРОМ ОШИБОК</p>
        </div>
      </div>
      <div class="col-md-5 col-md-push-1 second_res">
        <strong>На тренинге вы:</strong>
        <ul>
        <?php if( have_rows('on_training') ): while ( have_rows('on_training') ) : the_row(); ?>
          <li><?php the_sub_field('item_2'); ?></li>
          <?php endwhile; endif; ?>
        </ul>
        <p class="italic"><b>Результат:</b> всего за 4 часа тренинга вы сформируете РЕАЛЬНЫЙ НАВЫК выступать публично.</p>
      </div>
    </div>
  </div>
</div><!-- results -->

<div class="priceblock2">
    <div class="container">
    <div class="row">
      <div class="col-md-6 toLeft">
        <div class="price_right_wrap">
          <div class="time">
            <p class="lead_p">ВРЕМЯ ЗАНЯТИЯ:</p>
            <p><?php the_field('time'); ?></p>
          </div>
          <div class="Durability">
            <p class="lead_p">ПРОДОЛЖИТЕЛЬНОСТЬ:</p>
            <p><?php the_field('durability'); ?></p>
          </div>
          <div class="place">
            <p class="lead_p">МЕСТО ПРОВЕДЕНИЯ:</p>
            <p><?php the_field('place'); ?></p>
          </div>
          <div class="practice">
            <p class="red_p">ТОЛЬКО ПРАКТИКА</p>
            <p>на наших занятиях</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 toRight">
        <div class="price_left_wrap">
          <p class="s20">ИНВЕСТИЦИИ В СЕБЯ — 90 BYN.</p>
          <?php echo do_shortcode('[contact-form-7 id="182" title="Стоимость обучения"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div><!-- priceblock2 -->

<div class="steps">
  <div class="container">
    <div class="row">
    <div class="col-md-12">
      <h5>ЭВОЛЮЦИЯ ОРАТОРА</h5>
      <?php if( have_rows('steps') ): while ( have_rows('steps') ) : the_row(); ?>
      <div class="stepname"><?php the_sub_field('step_title'); ?></div>
      <div class="understep"><?php the_sub_field('step_slogan'); ?></div>
        <?php the_sub_field('step_description'); ?>
      <?php endwhile; endif; ?>
    </div>
    </div>
  </div>
</div><!-- steps -->

<div class="review">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="reviews">
          <h6>Отзывы</h6>
          <p class="rewp">
              <p class="break_p">«Форма проведения тренинга радует, чувствовалась легкость в подаче материала. Вся теоретическая и практическая часть хорошо выстроена, мы были очень увлечены выступлениями собственными и своих коллег.</p>
              <p class="break_p">Интересно было всё! Я никогда не был на тренингах и внимательно слушал всё, о чем говорил Юрий, без лишнего  скепсиса. Последние сомнения развеялись, когда мы начали выступать перед аудиторией. На практике отрабатывали различные ситуации, которые могут возникнуть во время публичного выступления.</p>
                <p>Что было полезного и какие техники я стал применять:</p>
               <p>1) Я понял насколько важно поддерживать зрительный контакт.</p>
               <p>2) Начал учиться работать на цель здесь и сейчас!</p>
                <p>3) Страх публичного выступления реально уменьшился.</p>
                <p>Техники работы с сопротивлениями - просто супер! На мой взгляд, этим техникам нужно учиться, постоянно выступая перед различной публикой».</p>
                <strong>Болондзь Максим</strong>
            </p>
            <p class="rewp">
              <p class="break_p">«Кто Я? И почему именно я? На эти вопросы я смог ответить только на тренинге в бизнес-школе «Расти». Ни разу не посещал никаких подобных тренингов или курсов.</p>

              <p class="break_p">Недавно мне повезло, я оказался бесплатным участником тренинга. За это отдельное "спасибо".</p>

              <p class="break_p">В первые минуты происходящее вызвало большой интерес! В аудитории были по кругу расставлены стулья и каждому участнику предназначалась табличка с именем. Обстановка производила "определенное" впечатление: на ум сразу пришли картины из фильмов, где таким же образом сидят люди и по очереди говорят: "Меня зовут Джон! Я алкоголик!" :) Но не тут-то было. При виде тренера стало понятно, что будет много слов и действий.</p>


             <p class="break_p">Дальше посетила мысль, что сейчас будем писать и слушать. Но я снова был не прав. Мы больше говорили и много двигались. После этого я понял, почему его - Юрия Аушкина - называют тренером. Этот процесс всех так захватил, что если бы не лимитировали время, мы бы точно остались до утра (а такие предложения поступали :)). Вывод: у меня получилось осознать основные проблемы в процессе общения.</p>

              <p class="break_p">Хочу поблагодарить коллектив «РАСТИ». Это интересные и умные люди, с ними было очень приятно работать. Подводя итог, хочу сказать, что получил массу удовольствия и рекомендую другим поучаствовать в подобном тренинге.»</p>

                <strong class="strong_right">
                <p class="right_sign">Дмитрий Чернушевич,</p>
                <p class="right_sign">Заместитель директора</p>
                <p class="right_sign">агентства по недвижимости</p>
                </strong>
              </p>
        </div>
        <div class="reviewsend"></div>
      </div>
    </div>
  </div>
</div><!-- review -->

<div class="priceblock2">
    <div class="container">
    <div class="row">
      <div class="col-md-6 toLeft">
        <div class="price_right_wrap">
          <div class="time">
            <p class="lead_p">ВРЕМЯ ЗАНЯТИЯ:</p>
            <p><?php the_field('time'); ?></p>
          </div>
          <div class="Durability">
            <p class="lead_p">ПРОДОЛЖИТЕЛЬНОСТЬ:</p>
            <p><?php the_field('durability'); ?></p>
          </div>
          <div class="place">
            <p class="lead_p">МЕСТО ПРОВЕДЕНИЯ:</p>
            <p><?php the_field('place'); ?></p>
          </div>
          <div class="practice">
            <p class="red_p">ТОЛЬКО ПРАКТИКА</p>
            <p>на наших занятиях</p>
          </div>
        </div>
      </div>
      <div class="col-md-6 toRight">
        <div class="price_left_wrap">
          <p class="s20">ИНВЕСТИЦИИ В СЕБЯ — 90 BYN.</p>
          <?php echo do_shortcode('[contact-form-7 id="182" title="Стоимость обучения"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div><!-- priceblock2 -->

<div class="our-phone">
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
      </div>
    </div>
  </div>
  <div class="elka"></div>
</div><!-- our-phone -->

<?php get_footer(); ?>
