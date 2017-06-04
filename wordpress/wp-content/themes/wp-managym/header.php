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
    <div class="upper-bar-wrapper">
      <div>НАШИ КУРСЫ</div>
      <table>
        <tbody>
          <tr>
            <td><a href="http://www.projector.by/">PROJECTOR</a></td>
            <td><a href="managym2/index.html">MANAGYM 2</a></td>
            <td><a href="bepublic/index.html">bePUBLIC</a></td>
            <td><a href="mistake/index.html">5 ОШИБОК РУКОВОДИТЕЛЯ</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <div id="up_ban">
    <div class="cen_up_ban">
      <h1><span class="lf">Новый курс управленческих навыков</span></h1>
      <span class="cn" style="left: 562px">MANAGYM</span>
      <div class="rg">22<span>сентября<br>новый набор</span>
      </div>
    </div>
  </div>

  <div class="overlay"></div>

  <header class="top_managym_bg">
    <div class="wrap">
      <div class="nh3" style="top: 90px;">
        <div style="margin-bottom: -20px;"><span style="border-bottom: 2px solid red;">managym</span> —</div>
        <br> КУРС управленческих
        <br>навыков</div>
      <div class="nh4">Прокачиваем молодых управленцев
        <br>для корпоративной борьбы</div>
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
    <div class="clear"></div>
  </header>

  <nav>
    <b></b>
    <ul>
      <li><a href="#" onclick="ScrollTO('#center'); return false;">Тренинг-центр</a></li>
      <li><a href="#" onclick="ScrollTO('#coach');return false;">Тренер</a></li>
      <li><a href="#" onclick="ScrollTO('.kurs-programm');return false;">Программа</a></li>
      <li><a href="#" onclick="ScrollTO('#contacts');return false;">Контакты</a></li>
      <li><a href="mistake/index.html" target="_blank">Видеокурс</a></li>
      <li><a href="managym2/index.html" target="_blank">Managym2</a></li>
      <li class="clear"></li>
    </ul>
    <i></i>
  </nav>
