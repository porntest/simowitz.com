<!doctype html>
<html @php(language_attributes())>
  @include('partials.head')
  <body @php(body_class())>
    <!--[if IE]>
      <div class="alert alert-warning">
        {!! __('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage') !!}
      </div>
    <![endif]-->
    <div class="wrap container" role="document">
    @php(do_action('get_header'))
    @include('partials.header')
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          <aside class="sidebar">
            @include('partials.sidebar')
          </aside>
        @endif
      </div>
      <div class="consultation" style="background-image: url({{the_field('contact_form_background_image', 'option')}})">
        <div class="consultation__text"> 
          <h3>{{the_field('contact_form_title', 'option')}}</h3>
          <p>{{the_field('contact_form_text', 'option')}}</p>
        </div>
        <div class="consultation__form">
          @php(Ninja_Forms()->display(get_field('contact_select_form', 'option')))
        </div>
      </div>
    </div>
    @php(do_action('get_footer'))
    @include('partials.footer')
    @php(wp_footer())
  </body>
</html>
