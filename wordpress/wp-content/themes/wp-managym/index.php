<?php get_header(); ?>

  <div class="article-container">
    <div class="container">
      <div class="row">

        <h1 class="ctitle"><?php _e( 'Latest Posts', 'wpeasy' ); ?></h1>

        <div class="category-inner col-lg-9 col-md-9">
          <?php get_template_part('loop'); ?>
          <?php get_template_part('pagination'); ?>
        </div>
        <!-- /.category-inner col-lg-9 col-md-9 -->

        <?php get_sidebar(); ?>

      </div>
    </div>
  </div><!-- /.article-container -->

<?php get_footer(); ?>