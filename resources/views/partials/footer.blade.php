<footer>
  <div class="container pad-btn-15">
    @php
      wp_nav_menu( array(
          'theme_location' => 'social_footer',
          'container'      => 'ul',
          'menu_class'     => 'list-inline social text-center purple',
          'menu_id'     => 'menu-social-header',
          'link_before' => '<span class="fa-stack fa-gradient fa-radius"><i class="fa fa-stack-1x text-gray"></i></span>'
      ));
    @endphp
  </div>
  <p class="text-center text-gray bg-dark-gray pad-btn-15 pad-top-15 h7">
    Diseñado por
    <img src="{{ home_url( '/' ) }}wp-content/themes/sage-9/dist/images/jema-logo.png" alt="Jean De La Hoz" class="img-responsive firma-soluciones"> |
    Desarrollado por
    <a href="http://solucioneskyk.com/" target="_blank">
      <img src="{{ home_url( '/' ) }}wp-content/themes/sage-9/dist/images/solucioneskyk.png" alt="Soluciones K&K" class="img-responsive firma-soluciones">
    </a>
  </p>
</footer>
