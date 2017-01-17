<?php //Template Name: Practice Area ?>
@extends('layouts.base')

@section('content')
  <div class="featured-image" style="background-image: url({{the_post_thumbnail_url()}})">
    <h2 class="page-title">{{the_title()}}</h2>
  </div>
  <section class="main">
    <aside class="sidebar">
      @php(dynamic_sidebar('sidebar-practices'))
    </aside>
    <article>
      <h1>{{the_field('city', 'options')}} {{the_title()}} Attorney</h1>
      @if(have_posts()) @while(have_posts()) @php(the_post())
      {{the_content()}}
      @endwhile @endif
    </article>
  </section>
@endsection
