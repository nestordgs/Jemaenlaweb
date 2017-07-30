<div class="col-md-4 visible-md visible-lg">
    {{--@php(dynamic_sidebar('sidebar-primary'))--}}
    <div class="row pad-btn-15 pad-top-15 bg-dark-gray">
        <div class="col-xs-12">
            <h4 class="text-center">
                ¿Quieres 6 de mis mejores recursos de marketing digital?
            </h4>
            <p class="h7 text-center text-gray">
                Suscríbete a mi newsletter y obtén contenido exclusivo que te ayudará a potenciar tus ventas en el mundo digital. #AprendoConJeMa
            </p>
            @php(dynamic_sidebar('sidebar-blog'))
        </div>
    </div>
    <div class="row pad-top-15">
        <div class="col-xs-12 bg-blue-white pad-top-15">
            <p class="text-center">
                Sigueme
            </p>
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
    </div>
    <div class="row pad-btn-15 pad-top-15">
        <div class="col-xs-12">
            @php(dynamic_sidebar('sidebar-blog-images'))
        </div>
    </div>
</div>
