@extends('layouts.base')

@section('content')
    {{-- @if(get_field('select_slider')) --}}
    <div class="slider"> 
    @if(have_rows('create_slider', 'option'))
      @while(have_rows('create_slider', 'option'))
        @php(the_row())
        @if(get_sub_field('slider_name') == get_field('select_slider'))
          @while(have_rows('slider', 'option'))
          @php(the_row())
            <div class="slider__slide" style="background-image: url({{the_sub_field('background_image')}}); flex-direction: {{the_sub_field('image_position')}}">
              <div class="slider__info-text">
                <h2>{{the_sub_field('heading')}}</h2>
                {{the_sub_field('tagline')}}
                @if(get_sub_field('label'))
                <div class="slider__CAB">
                  <a href="@php get_sub_field('link_type') == 'page' ? the_sub_field('link') : the_sub_field('url') @endphp" class="btn--action">{{the_sub_field('label')}}</a>
                </div>
                @endif
              </div>
              <div class="slider__image">
                <img src="{{get_sub_field('image')['url']}}" alt="{{get_sub_field('image')['alt']}}">
              </div>
            </div>
          @endwhile
        @endif
      @endwhile
    @endif
    </div>
    <div class="sticky--hide"></div>
    {{-- @endif --}}
  <div class="awards">
    @if(have_rows('awards'))
      @while(have_rows('awards'))
        @php(the_row())
        @php($post_object = get_sub_field('award'))
        @if($post_object)
          <?php
            global $post;
            $post = $post_object;
            setup_postdata($post)
          ?>
          <div class="award">
            {{-- @if(get_field('image')['mime_type'] == 'image/svg+xml') --}}
              {{-- <img class="inject-svg" src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}"> --}}
            {{-- @else --}}
              {{-- <img src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}"> --}}
            {{-- @endif --}}
              <img src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}">
          </div>
          @php(wp_reset_postdata())
        @endif
      @endwhile
    @endif
  </div>
  <div class="process-container">
    <h2>The Legal Process</h2>
    @if(have_rows('steps'))
      @while(have_rows('steps'))
        @php(the_row())
        
      <div class="process" style="background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url({{the_sub_field('background_image')}})">
        <div class="process__step {{get_row_index() % 2 ? 'process__step--left' : 'process__step--right'}}">
        {{-- <div class="process__step process__step--right"> --}}
          <h3>{{the_sub_field('title')}}</h3>
          <p>{{the_sub_field('description')}}</p>
        </div>
      </div>
      @endwhile
    @endif
  </div>
  <div class="testimonials">
    @if(have_rows('testimonials'))
      @while(have_rows('testimonials'))
        @php(the_row())
        @php($post_object = get_sub_field('testimonial'))
        @if($post_object)
          <?php
            global $post;
            $post = $post_object;
            setup_postdata($post)
          ?>
        <div class="testimonial__slide">
        </div>
          @php(wp_reset_postdata())
        @endif
      @endwhile
    @endif 
  </div>
@endsection
