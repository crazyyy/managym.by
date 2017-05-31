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
<!-- wrapper -->
<div class="wrapper">

  <div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <ul class="header-top--nav">
            <li class="active"><a href="">НАШИ КУРСЫ</a></li>
            <li><a href="">PROJECTOR</a></li>
            <li><a href="">MANAGYM 2</a></li>
            <li><a href="">bePUBLIC</a></li>
            <li><a href="">5 ОШИБОК РУКОВОДИТЕЛЯ</a></li>
          </ul>
        </div><!-- /.col-lg-12 col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.header-top -->

  <div class="header-redzone">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <h4>Новый курс управленческих навыков <span class="header-redzone--title">MANAGYM</span><span class="header-redzone--date">22 сентября<br>новый набор</span></h4>
        </div><!-- /.col-lg-12 col-md-12 -->
      </div><!-- /.row -->
    </div><!-- /.container -->
  </div><!-- /.header-redzone -->

  <header role="banner">
    <div class="inner">

      <div class="logo">
        <?php if ( !is_front_page() && !is_home() ){ ?>
          <a href="<?php echo home_url(); ?>">
        <?php } ?>
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php wp_title( '' ); ?>" title="<?php wp_title( '' ); ?>" class="logo-img">
        <?php if ( !is_front_page() && !is_home() ){ ?>
          </a>
        <?php } ?>
      </div><!-- /logo -->

      <nav class="nav" role="navigation">
        <?php wpeHeadNav(); ?>
      </nav><!-- /nav -->

    </div><!-- /.inner -->
  </header><!-- /header -->

  <section role="main">
    <div class="inner">
