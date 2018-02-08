<?php get_header(); ?>

  <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="article-container">
      <div class="container">
        <div class="row">
          <article id="post-<?php the_ID(); ?>" <?php post_class('col-lg-9 col-md-9'); ?>>
            <h1 class="single-title inner-title"><?php the_title(); ?></h1>
            <?php the_content(); ?>
            <?php the_tags( __( 'Tags: ', 'wpeasy' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>
            <p><?php _e( 'Categorised in: ', 'wpeasy' ); the_category(', '); // Separated by commas ?></p>

          </article>

          <?php get_sidebar(); ?>

        </div>
      </div>
    </div><!-- /.article-container -->
  <?php endwhile; endif; ?>

<?php get_footer(); ?>
