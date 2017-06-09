<header class="banner">
  {{--<div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>--}}
  <nav class="navbar navbar-purple">
    <div class="container">
      {{-- Brand and toggle get grouped for better mobile display --}}
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
          @if(get_theme_mod('site_logo'))
            <img src="{{ esc_url(get_theme_mod('site_logo')) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" class="img-responsive">
          @endif
        </a>
      </div>

      {{-- Collect the nav links, forms, and other content for toggling --}}
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#">Sobre Mi <span class="sr-only">(current)</span></a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Recursos</a></li>
          <li><a href="#">¿Formamos un Equipo?</a></li>
        </ul>
      </div>{{-- /.navbar-collapse --}}
    </div> {{-- /.container --}}
  </nav>
</header>
