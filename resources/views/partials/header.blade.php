<header class="banner">
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand d-block d-lg-none" href="{{ home_url('/') }}" title="{{ get_bloginfo('name') }}">
        <img class="img-fluid" src="@if(get_field('website_logo', 'option')) {{ the_field('website_logo','option') }} @else {{ get_theme_file_uri().'/dist/images/logo.png' }} @endif" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name') }}"/>
        <span class="sr-only"> {{ get_bloginfo('name') }} </span>
      </a>

      <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
        <h2 class="sr-only">{{ _e('navigation', 'domain') }}</h2>
        @if (has_nav_menu('right_navigation'))
          {!! wp_nav_menu(['theme_location' => 'right_navigation', 'container' => false, 'menu_class' => 'navbar-nav', 'walker' => new NavWalker()]) !!}
        @endif
        @if(is_home() || is_front_page())
          <h1 class="logos d-lg-block d-none">
            <a class="navbar-brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name') }}">
              <img class="img-fluid" src="@if(get_field('website_logo', 'option')) {{ the_field('website_logo','option') }} @else {{ get_theme_file_uri().'/dist/images/logo.png' }} @endif" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name') }}"/>
              <span class="sr-only"> {{ get_bloginfo('name') }} </span>
            </a>
          </h1>
        @else
          <h2 class="logos d-lg-block d-none">
            <a class="navbar-brand" href="{{ home_url('/') }}" title="{{ get_bloginfo('name') }}">
              <img class="img-fluid" src="@if(get_field('website_logo', 'option')) {{ the_field('website_logo','option') }} @else {{ get_theme_file_uri().'/dist/images/logo.png' }} @endif" alt="{{ get_bloginfo('name', 'display') }}" title="{{ get_bloginfo('name') }}"/>
              <span class="sr-only"> {{ get_bloginfo('name') }} </span>
            </a>
          </h2>
        @endif
        @if (has_nav_menu('left_navigation'))
          {!! wp_nav_menu(['theme_location' => 'left_navigation', 'container' => false, 'menu_class' => 'navbar-nav', 'walker' => new NavWalker()]) !!}
        @endif
      </div>
    </nav>
  </div>
</header>
