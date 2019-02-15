{{-- Created by Nestor on 6/22/2017. --}}
<div class="pad-top-15" id="sobreMi">
  <div class="container">
    <div class="row vertical-align pad-top-15">
      <div class="col-xs-12 col-sm-6">
        <div class="">
          <h1 class="text-gray-dark text-center">
              {{ esc_attr(get_theme_mod('name_about')) }}
          </h1>
          <p class="text-gray">
            {!! App\styleTextArea(nl2br(get_theme_mod('text_about'))) !!}
          </p>
        </div>
      </div>
      <div class="col-xs-12 col-sm-6">
        <img src="{{ esc_url(get_theme_mod('about_me_site_icon')) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" class="img-responsive center-block">
      </div>
    </div>
  </div>
</div>
<div style="background-color: #FAFAFA">
  <div class="container">
    <div class="row pad-btn-15 pad-top-15">
      <div class="col-xs-12 col-sm-4">
        <h5 class="text-center">
          <span class="fa-stack fa-3x">
            <i class="fa fa-circle fa-stack-2x text-purple-2"></i>
            <i class="fa fa-cog fa-stack-1x fa-inverse" aria-hidden="true"></i>
          </span>
        </h5>
        <h4 class="text-center"><strong>{{ esc_attr(get_theme_mod('about_title_service_1')) }}</strong></h4>
        <p class="text-center">
          {!! App\styleTextArea(nl2br(get_theme_mod('about_text_service_1'))) !!}
        </p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <h5 class="text-center">
          <span class="fa-stack fa-3x">
          <i class="fa fa-circle fa-stack-2x text-purple-2"></i>
          <i class="fa fa-volume-up fa-stack-1x fa-inverse" aria-hidden="true"></i>
        </span>
        </h5>
        <h4 class="text-center"><strong>{{ esc_attr(get_theme_mod('about_title_service_2')) }}</strong></h4>
        <p class="text-center">
          {!! App\styleTextArea(nl2br(get_theme_mod('about_text_service_2'))) !!}
        </p>
      </div>
      <div class="col-xs-12 col-sm-4">
        <h5 class="text-center">
          <span class="fa-stack fa-3x">
            <i class="fa fa-circle fa-stack-2x text-purple-2"></i>
            <i class="fa fa-heart fa-stack-1x fa-inverse" aria-hidden="true"></i>
          </span>
        </h5>
        <h4 class="text-center"><strong>{{ esc_attr(get_theme_mod('about_title_service_3')) }}</strong></h4>
        <p class="text-center">
          {!! App\styleTextArea(nl2br(get_theme_mod('about_text_service_3'))) !!}
        </p>
      </div>
    </div>
  </div>
</div>
