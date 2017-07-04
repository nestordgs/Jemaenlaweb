<header class="banner">
  <nav class="navbar navbar-purple">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ home_url( '/' ) }}">
          @if(get_theme_mod('site_logo'))
            <img src="{{ esc_url(get_theme_mod('site_logo')) }}" alt="{{ esc_attr(get_bloginfo('name')) }}" class="img-responsive">
          @endif
        </a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        @php
          wp_nav_menu( array(
              'theme_location' => 'primary_navigation',
              'container'      => 'ul',
              'menu_class'     => 'nav navbar-nav text-center navbar-right',
          ));
        @endphp
      </div>
    </div>
  </nav>
</header>
