<?php /* Template Name: mistake */ get_header(); ?>
<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="header_inner_wrap">
          <p class="first_row">Бесплатный Видеокурс</p>
          <h1><?php the_field('page_title'); ?></h1>
          <p class="underslogan"><?php the_field('page_undertitle'); ?></p>
        </div>
      </div>
    </div>
  </div>
</div><!-- header -->

<div class="white_gray">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="block_inner_wrap">
          <h4>ИЗ КУРСА ВЫ УЗНАЕТЕ:</h4>
          <ul>
          <?php if( have_rows('course_knows') ): while ( have_rows('course_knows') ) : the_row(); ?>
            <li><span><?php the_sub_field('knowledge_item'); ?></span></li>
          <?php endwhile; endif; ?>
          </ul>
        </div>
      </div>
      <div class="col-md-6">
        <div class="second_inner_wrap">
          <?php echo do_shortcode('[contact-form-7 id="189" title="БЕСПЛАТНЫЙ ВИДЕОКУРС"]'); ?>
        </div>
      </div>
    </div>
  </div>
</div><!-- white_gray -->

<div class="mistake-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p><?php the_field('footer_phone'); ?></p>
      </div>
    </div>
  </div>
</div><!-- mistake-footer -->

<?php get_footer(); ?>
