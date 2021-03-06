<?php //Template Name: Practice Area ?>
@extends('layouts.base')

@section('content')
  @include('partials.featured-image')
  <section class="main">
    <aside class="sidebar">
      @php(dynamic_sidebar('sidebar-practices'))
    </aside>
    <article>
      <h1 class="practice__title">{{the_field('city', 'options')}} {{the_title()}} Attorney</h1>
      @if(have_posts()) @while(have_posts()) @php(the_post())
      {{the_content()}}
      @endwhile @endif
    </article>
  </section>
@endsection
