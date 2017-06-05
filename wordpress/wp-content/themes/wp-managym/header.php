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
    <?php wpeTopHeadNav(); ?>
  </div>

  <div id="up_ban">
    <div class="cen_up_ban">
      <h6 class="up_ban--title"><span class="lf">Новый курс управленческих навыков</span></h6>
      <span class="cn" style="left: 562px">MANAGYM</span>
      <div class="rg">22<span>сентября<br>новый набор</span></div>
    </div><!-- cen_up_ban -->
  </div><!-- up_ban -->

  <div class="overlay"></div>

  <header class="top_managym_bg clearfix">
    <div class="wrap">
      <div class="nh3" style="top: 90px;">
        <div class="tmbg--heading">
          <span  class="tmbg--heading-red">managym</span> —
          <span>КУРС управленческих</span>
          <span>навыков</span>
        </div>
      </div>
      <div class="nh4">Прокачиваем молодых управленцев<br>для корпоративной борьбы</div>
      <p class="quote" style="margin:25px 0px 0px 0px;">
        «Снесём крышу до фундамента, на нём построим
        <br>все как нужно».
        <span class="author">— Юрий Анушкин, тренер</span>
      </p>
      <div class="date" style="width:200px;">
        <span class="head-date" style="text-align: right; width:200px;">22<b style="text-align: left">сентября<br><span>новый<br>набор</span></b>
        </span>
      </div>
      <a href="#schedule" class="signup" onclick="ScrollTO('.bott_form_succes'); return false;" id="top_reg_btn">Записаться</a>
    </div>
    <div class="img" id="managym_top_banner"></div>
  </header>

  <nav class="headnav--container">
    <b></b>
    <?php wpeHeadNav(); ?>
    <i></i>
  </nav><!-- headnav--container -->

