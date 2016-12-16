@extends('layouts.base')

@section('content')
  @include('partials.page-header')
    <div class="row">
      <div class="col-xs">
        <p>{{the_content()}}</p>
      </div>
    </div>
@endsection
