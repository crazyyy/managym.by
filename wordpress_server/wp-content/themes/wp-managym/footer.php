  <div class="clients">
    <div class="container">
      <div class="row">
        <h4 class="col-lg-12 col-md-12 cl_head">Наши клиенты</h4>
        <div class="clients-container">
          <?php $images = get_field('clients', 30);if( $images ): ?>
            <ul>
              <?php foreach( $images as $image ): ?>
                <li>
                  <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>
        </div><!-- /.clientsc-container -->
      </div>
    </div><!-- container -->
  </div><!-- clients -->

  <div id="map">
    <div class="elka"></div>

    <div class="wrap">
      <div id="contacts" class="clearfix">
        <div class="addr">
          г. Минск
          <br> ул. Толбухина, 2,
          <br> Бизнес-центр Time эт. 5
        </div>
        <div class="inner clearfix">
          <div class="label">Телефон:</div>
          <div class="phones">
            <div class="tel">+375 29 68-34-600</div>
          </div>
          <div class="label">E-mail:</div>
          <a href="mailto:managym.by@gmail.com">managym.by@gmail.com</a>
          <br>
          <div class="clear"></div>
          <div class="label" style="clear:both;padding-top: 2px">Соц.сети:</div>
          <!--noindex-->
          <a rel="nofollow" href="https://www.facebook.com/managym.by?ref=hl#!/managym.by" style="text-decoration:underline;display:block;float:left;padding: 4px 3px 3px 0;" target="_blank">Facebook</a>
          <a rel="nofollow" href="https://vk.com/public67648684#/public67648684" style="text-decoration:underline;display:block;float:left;padding: 4px 3px 3px 7px;" target="_blank">ВКонтакте</a>
          <!--/noindex-->
        </div>
        <a href="#" class="hides open">
          <span>контактная информация</span>
          <i></i>
        </a>
      </div>
    </div><!-- wrap -->

    <?php $location = get_field('maps', 30); if( !empty($location) ):?>
    <div id="myMap" class="acf-map">
      <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
    </div>
    <?php endif; ?>

    <div class="ontop" onclick="ScrollTO('body')"></div>
  </div>

  <div class="footer">
    <div class="container">
      <div class="row">
        <p class="copyright col-lg-12 col-md-12">
          &copy; <?php echo date("Y"); ?> Собственность <?php bloginfo('name'); ?>.
        </p><!-- /copyright -->
      </div>
    </div>
  </div><!-- footer -->

  <?php wp_footer(); ?>

</body>
</html>
