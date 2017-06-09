{{-- Created by Nestor on 6/7/2017. --}}
<div class="bg-picture" style="background-image: url('{{ (get_theme_mod('background_image')) ? esc_url(get_theme_mod('background_image')) : '' }}')" >
    <div class="container">
        <div class="row pad-15">
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
                    <div class="col-xs-2 col-xs-offset-2 text-center">
                        <a href="#">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-instagram fa-stack-1x fa-inverse" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-xs-2 text-center">
                        <a href="#">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-facebook fa-stack-1x fa-inverse" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-xs-2 text-center">
                        <a href="#">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-twitter fa-stack-1x fa-inverse" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                    <div class="col-xs-2 text-center">
                        <a href="#">
                            <span class="fa-stack fa-2x">
                                <i class="fa fa-circle fa-stack-2x"></i>
                                <i class="fa fa-pinterest-p fa-stack-1x fa-inverse" aria-hidden="true"></i>
                            </span>
                        </a>
                    </div>
                </div>
                @if(get_theme_mod('username'))
                    <p class="text-center username helve">{{ esc_attr(get_theme_mod('username')) }}</p>
                @endif
            </div>
        </div>
    </div>
</div>