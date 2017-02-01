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
              {{the_sub_field('answer')}}
            </div>
          </div>
        @endwhile
      @endif
    </div>
  </div>
  </section>
@endsection
