<?php /* Template Name: Mailing Page */ get_header(); ?>
  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="article-container">
      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-12 col-md-12'); ?>>

            <?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?>
            <h1 class="single-title inner-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
			
          </article>
        </div>
      </div>
    </div><!-- /.article-container -->
  <?php endwhile; endif; ?>

<?php get_footer(); ?>

