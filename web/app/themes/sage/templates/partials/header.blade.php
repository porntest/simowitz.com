<header class="banner">
  <div class="container">
    <nav class="nav-primary">
      <button class="nav-button"></button>
      <a href="tel:{{the_field('phone', 'options')}}">{{the_field('phone', 'options')}}</a>
        <div class="sidebar__header">
          <a class="brand" href="{{ home_url('/') }}">
            <img class="brand__logo" src="{{get_field('logo', 'options')['url']}}" alt="{{get_field('logo', 'options')['alt']}}">
            <div class="brand__text">
              <p>
              @if (get_field('company_name', 'options'))
                {{ the_field('company_name', 'options') }}
              @else
                {{ get_bloginfo('name', 'display') }}
              @endif
              </p>
              <p>{{the_field('company_slogan', 'options')}}</p>
            </div>
          </a>
        </div>
      <nav class="sidebar">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </nav>
  </div>
</header>
