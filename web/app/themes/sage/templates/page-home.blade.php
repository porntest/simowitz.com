@extends('layouts.base')

@section('content')
  <div class="slider"> 
    @if(have_rows('slider'))
      @while(have_rows('slider'))
        @php(the_row())
        <div class="slider__slide" style="background-image: url({{the_sub_field('background_image')}}); flex-direction: {{the_sub_field('image_position')}}">
          <div class="slider__info-text">
            <h2>{{the_sub_field('heading')}}</h2>
            {{the_sub_field('tagline')}}
            @if(get_sub_field('link'))
            <div class="slider__CAB">
              <a href="{{the_sub_field('link')}}" class="btn--action">{{the_sub_field('label')}}</a>
            </div>
            @endif
          </div>
          <div class="slider__image">
            <img src="{{get_sub_field('image')['url']}}" alt="{{get_sub_field('image')['alt']}}">
          </div>
        </div>
      @endwhile
    @endif
  </div>
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
            @if(get_field('image')['mime_type'] == 'image/svg+xml')
              <img class="inject-svg" src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}">
            @else
              <img src="{{get_field('image')['url']}}" alt="{{get_field('image')['alt']}}">
            @endif
          </div>
          @php(wp_reset_postdata())
        @endif
      @endwhile
    @endif
  </div>
@endsection