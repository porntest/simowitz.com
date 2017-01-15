@extends('layouts.base')

@section('content')
  <div class="featured-image" style="background-image: url({{the_post_thumbnail_url()}})">
    <h2 class="page-title">{{the_title()}}</h2>
  </div>
  <section class="faq-section">
  <aside class="sidebar">
    @php(dynamic_sidebar('sidebar-practices'))
  </aside>
  <div class="faq-container">
    <div class="accordion">
      @if(have_rows('questions'))
        @while(have_rows('questions'))
          @php(the_row())
          <div class="faq-question">
            <div>
              <h4>{{the_sub_field('question')}}</h4>
            </div>
            <div>
              <p>{{the_sub_field('answer')}}</p>
            </div>
          </div>
        @endwhile
      @endif
    </div>
  </div>
  {{-- <div class="process-container"> --}}
    {{-- <h2>The Legal Process</h2> --}}
    {{-- @if(have_rows('steps')) --}}
      {{-- @while(have_rows('steps')) --}}
        {{-- @php(the_row()) --}}
        {{-- <div class="process" style="@if(the_sub_field('background')) --}}
        {{-- background-image: linear-gradient(rgba(0,0,0,0.65), rgba(0,0,0,0.65)), url({{the_sub_field('background_image')}}) --}}
        {{-- @endif"> --}}
          {{-- <div class="process__step {{get_row_index() % 2 ? 'process__step--left' : 'process__step--right'}}"> --}}
          {{-- [> <div class="process__step process__step--right"> <] --}}
            {{-- <h3>{{the_sub_field('title')}}</h3> --}}
            {{-- <p>{{the_sub_field('description')}}</p> --}}
          {{-- [> </div> <] --}}
          {{-- </div> --}}
        {{-- </div> --}}
      {{-- @endwhile --}}
    {{-- @endif --}}
  {{-- </div> --}}
  </section>
@endsection
