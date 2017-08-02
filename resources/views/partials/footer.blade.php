<footer class="bg-gray form-inverse">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 pad-top-15 pad-btn-15">
                <h4 class="text-center">{{ get_theme_mod('form-title') }}</h4>
                <h6 class="text-justify">{{ get_theme_mod('form-text') }}</h6>
                @php(dynamic_sidebar('sidebar-footer'))
            </div>
            <div class="col-xs-12 col-sm-4 pad-top-15 pad-btn-15">
                @php(dynamic_sidebar('sidebar-footer-2'))
            </div>
            <div class="col-xs-12 col-sm-4 pad-top-15 pad-btn-15">
                <h4 class="text-center">Conéctemonos</h4>
                @php
                    wp_nav_menu( array(
                        'theme_location' => 'social_footer',
                        'container'      => 'ul',
                        'menu_class'     => 'list-inline social text-center purple',
                        'menu_id'     => 'menu-social-header',
                        'link_before' => '<span class="fa-stack fa-gradient fa-radius"><i class="fa fa-stack-1x text-gray"></i></span>'
                    ));
                @endphp
                <address class="text-center">
                    @if(get_theme_mod('email_footer'))
                        <a href="mailto:{{ get_theme_mod('email_footer') }}" class="text-white">
                            <i class="fa fa-envelope"></i> {{ get_theme_mod('email_footer') }}
                        </a>
                        <br>
                    @endif
                        @if(get_theme_mod('phone_footer'))
                            <i class="fa fa-phone"></i> {{ get_theme_mod('phone_footer') }}
                            <br>
                        @endif
                        @if(get_theme_mod('address_footer'))
                            <i class=" fa fa-map-marker"></i> {{ get_theme_mod('address_footer') }}
                        @endif
                </address>
            </div>
        </div>
        <p class="text-center h7">
            Diseñado por
            <img src="{{ home_url( '/' ) }}wp-content/themes/sage-9/dist/images/jema-logo.png" alt="Jean De La Hoz" class="img-responsive firma-soluciones"> |
            Desarrollado por
            <a href="http://solucioneskyk.com/" target="_blank">
                <img src="{{ home_url( '/' ) }}wp-content/themes/sage-9/dist/images/solucionesk&k.png" alt="Soluciones K&K" class="img-responsive firma-soluciones">
            </a>
        </p>
    </div>
</footer>
