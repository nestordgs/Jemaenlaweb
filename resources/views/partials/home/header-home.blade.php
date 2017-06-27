{{-- Created by Nestor on 6/7/2017. --}}
<div class="bg-picture" style="background-image: url('{{ (get_theme_mod('background_image')) ? esc_url(get_theme_mod('background_image')) : '' }}')">
    <div class="container pad-top-15">
        <div class="row pad-top-15 pad-btn-15">
            <div class="col-xs-6 col-md-5">
                <div class="center-table">
                    @if(get_theme_mod('title_site'))
                        <p class="reg bg-shadow text-center">{{ esc_attr(get_theme_mod('title_site')) }}<span class="text-purple">.</span></p>
                    @endif
                </div>
            </div>
            <div class="col-xs-6 col-md-6 col-md-offset-1">
                @if(get_theme_mod('logo_header'))
                    <img src="{{ esc_url(get_theme_mod('logo_header')) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" class="img-responsive center-block">
                @endif
                <div class="row">
                    <div class="col-xs-10 col-xs-offset-1 text-center">
                        @php
                            wp_nav_menu( array(
                                'theme_location' => 'social_header',
                                'container'      => 'ul',
                                'menu_class'     => 'list-inline social text-center sng',
                                'menu_id'     => 'menu-social-header',
                                'link_before' => '<span class="fa-stack fa-rest fa-gradient fa-radius"><i class="fa fa-stack-1x text-gray"></i></span>'

                            ));
                        @endphp
                    </div>
                </div>
                @if(get_theme_mod('username'))
                    <p class="text-center username helve">{{ esc_attr(get_theme_mod('username')) }}</p>
                @endif
            </div>
        </div>
    </div>
</div>