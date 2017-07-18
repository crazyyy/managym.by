<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">


  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

  <div class="upper-bar-courses">
    <div class="tog-menu-top"><i class="fa fa-bars" aria-hidden="true"></i></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <?php wpeTopHeadNav(); ?>
        </div><!-- /.col-lg-12 col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.upper-bar-courses -->

  <div class="up_ban">
    <div class="container">
      <div class="row">
        <div class="cen_up_ban col-lg-12 col-md-12 col-sm-12">
          <h6 class="up_ban--title"><span class="lf">Новый курс управленческих навыков</span></h6>
          <span class="cn">MANAGYM</span>
          <div class="rg">22 <span>сентября<br>новый набор</span></div>
        </div><!-- / col-lg-12 col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.up_ban -->

  <?php if ( is_page('30') ){ ?>
    <?php  echo do_shortcode('[rev_slider alias="home"]');  ?>

    <div class="headnav--container">
      <div class="tog-menu"><i class="fa fa-bars" aria-hidden="true"></i></div>
      <div class="container">
        <div class="row">
          <nav class="headnav--item col-lg-12 col-md-12">
            <?php wpeHeadNav(); ?>
          </nav><!-- / headnav--item .col-lg-12 col-md-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </div><!-- /.headnav--container -->

  <?php } ?>
