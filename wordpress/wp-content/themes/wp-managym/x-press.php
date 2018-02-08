<?php /* Template Name: X-Press Page */ get_header(); ?>
  <div class="header">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        <div class="tog-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
          <nav class="top_nav_bar">
            <ul class="navigation_x-press headnav">
              <li><a href="<?php echo home_url(); ?>">Главная</a></li>
              <li><a href="#for_team">Для команды</a></li>
              <li><a href="#corporation">Корпорация 2.0</a></li>
              <li><a href="#rapid_link">Rapid Foresight</a></li>
              <li><a href="#rapid_task_link">Программа</a></li>
              <li><a href="#authors_link">Авторы</a></li>
              <li><a href="#authors_link">Контакты</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="title-button_wrapp">
            <h1>X-PRESS</h1>
            <p class="undertitle">новый формат проведения стратегической сессии от <a href="http://managym.by/" target="_blank">MANAGYM.BY</a> и <a href="http://projector.by/" target="_blank">Projector.by</a></p>
            <button class="get_in">Записаться</button>
          </div>
        </div>
      </div>
    </div>
  </div><!-- header -->

  <div class="team_guiders" id="for_team">
    <h4><?php the_field('block_1_title'); ?></h4>
    <p><?php the_field('block_1_undertitle'); ?></p>
    <div class="container">
      <div class="row">
        <?php if( have_rows('4_blocks') ): while ( have_rows('4_blocks') ) : the_row();
        $image = get_sub_field('team_manage_img'); ?>
          <div class="col-md-3">
            <div class="img_wrapp">
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
            </div>
            <p><?php the_sub_field('team_manage_text'); ?></p>
          </div>
        <?php endwhile; endif; ?>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="HO_wrap">
            <p class="HO_title">HO</p>
            <p class="HO_descr"><?php the_field('red_text'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- team_guiders -->

  <div class="corp2_0" id="corporation">
    <h4><?php the_field('block_2_title'); ?></h4>
    <p class="corp_undertitle"><?php the_field('block_2_undertitle'); ?></p>
    <p><?php the_field('corp20_descr'); ?></p>
    <div class="container">
      <div class="row">
        <?php if( have_rows('corporation_steps') ): while ( have_rows('corporation_steps') ) : the_row();
          $image = get_sub_field('step_img'); ?>
            <div class="col-md-12 block_description">
              <div class="content_wraper">
                <h6><?php the_sub_field('step_title'); ?></h6>
                <p><?php the_sub_field('step_descr'); ?></p>
                <div class="image_wraper">
                  <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                </div>
              </div>
            </div>
          <?php endwhile; endif; ?>
      </div>
      <div class="row">
        <div class="col-md-6">
          <h6>СубЪективно,</h6>
          <p><?php the_field('second_part_corp_text'); ?></p>
          <p><?php the_field('second_half_text'); ?></p>
        </div>
        <div class="col-md-6">
          <div class="content_wrapp">
            <h6>По итогу,</h6>
            <p>участники</p>
            <ul>
            <?php if( have_rows('members') ): while ( have_rows('members') ) : the_row(); ?>
              <li><?php the_sub_field('member_item'); ?></li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!-- corp2_0 -->

  <div class="rapid_foresight" id="rapid_link">
    <h4><?php the_field('block_3_title'); ?></h4>
    <p class="foresight_undertitle"><?php the_field('block_3_undertitle'); ?></p>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="first_text_block">
            <p><?php the_field('ccontent_front'); ?></p>
            <p><?php the_field('content_all'); ?></p>
          </div>
          <div class="right_image">
            <?php $image = get_field('right_image'); if( !empty($image) ): ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="diagram_wrap">
            <?php $image = get_field('diagramm'); if( !empty($image) ): ?>
              <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- rapid_foresight -->

  <div class="rapid_tasks">
    <h4><?php the_field('block_4_title'); ?></h4>
    <div class="container">
      <div class="row">
      <?php $i=1; if( have_rows('rapid_tasks') ): while ( have_rows('rapid_tasks') ) : the_row(); ?>
        <div class="col-md-4">
          <div class="contentt_wraper">
            <div class="rapid_descr">
              <span class="count_number"><?php echo $i; ?>.</span>
              <p><?php the_sub_field('rapid_task_title'); ?></p>
            </div>
            <div class="rapid_hover_text"><?php the_sub_field('rapid_task_desc'); ?></div>
          </div>
        </div>
        <?php $i++; endwhile; endif; ?>
      </div>
    </div>
  </div><!-- rapid_tasks -->

  <div class="event_news_block">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h4><?php the_field('big_right_text'); ?></h4>
        </div>
        <div class="col-md-4">
        <p class="fist_text"><?php the_field('top_black_text'); ?></p>
        <p class="second_text"><?php the_field('undertitle_content'); ?></p>
        </div>
        <div class="col-md-4">
          <p><?php the_field('second_text-right'); ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="last_event_text">
          <p><?php the_field('example_text-links'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div><!-- event_news_block -->

  <div class="red_line">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><?php the_field('red_line_text'); ?></p>
        </div>
      </div>
    </div>
  </div><!-- red_line -->

  <div class="programm_include" id="rapid_task_link">
    <h4><?php the_field('block_6_title'); ?></h4>
    <div class="container">
      <div class="row">
        <?php  if( have_rows('programm_days') ): while ( have_rows('programm_days') ) : the_row(); ?>
            <div id="dropdown_wrapper" class="col-md-6">
              <div class="programm_form_wrap">
                <h5><?php the_sub_field('day_title'); ?></h5>
                  <div class="programm_content_wrap">
                    <ul>
                    <?php $i=1; if( have_rows('day_programm_item') ): while ( have_rows('day_programm_item') ) : the_row(); ?>
                      <li><span class="programm_number"><?php echo $i; ?>.</span> <?php the_sub_field('day_item_list'); ?></li>
                      <?php $i++; endwhile; endif; ?>
                    </ul>
                    <div id="dropdown_item" class="table_arrow_down"></div>
                  </div>
              </div>
            </div>
          <?php endwhile; endif; ?>
      </div>
      <div class="row second_include_row">
        <div class="graph_wrap">
          <?php $image = get_field('graph_item'); if( !empty($image) ): ?>
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          <?php endif; ?>
        </div>
        <h6><?php the_field('under_text'); ?></h6>
        <div class="col-md-12">
          <div class="important_text-wrapp">
            <p>важно</p>
            <ul>
            <?php  if( have_rows('important_items') ): while ( have_rows('important_items') ) : the_row(); ?>
              <li><?php the_sub_field('important_item'); ?></li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div><!-- programm_include -->

  <div class="team_cost" id="team_cost_form">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="cost_wrap">
            <h4><?php the_field('block_7_little_title'); ?></h4>
            <p>Вы получите:</p>
            <ul>
            <?php  if( have_rows('cost_steps') ): while ( have_rows('cost_steps') ) : the_row(); ?>
              <li><?php the_sub_field('cost_item'); ?></li>
              <?php endwhile; endif; ?>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <p class="cost_form_title">Оставить заявку</p>
          <div class="sub_form_wrap">
            <?php echo do_shortcode('[contact-form-7 id="566" title="X-press"]'); ?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- team_cost -->

  <div class="white_line">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p><?php the_field('white_text_line'); ?></p>
        </div>
      </div>
    </div>
  </div><!-- white_line -->

  <div class="authors" id="authors_link">
    <h4><?php the_field('block_8_title'); ?></h4>
    <div class="container">
      <div class="row">
      <?php  if( have_rows('author_blocks') ): while ( have_rows('author_blocks') ) : the_row();
        $image = get_sub_field('author_img'); ?>
        <div class="col-md-6">
          <div class="author_img_wrap">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
          </div>
          <div class="name_block">
            <p><?php the_sub_field('authot_name'); ?></p>
          </div>
        </div>
        <?php endwhile; endif; ?>
      </div>
      <div class="row contacts_row">
        <div class="col-md-12">
          <p class="bright_text">Контакты:</p>
          <p>Анушкин Юрий</p>
          <p class="bright_text"><?php the_field('bottom_phone'); ?></p>
          <p>email: <?php the_field('email'); ?></p>
          <p>skype: <?php the_field('skype_item'); ?></p>
        </div>
      </div>
    </div>
  </div><!-- authors -->

  <div class="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p>Разработано в <span>Gold PR</span> Studio</p>
        </div>
      </div>
    </div>
  </div><!-- copyright -->

<?php get_footer(); ?>
