@extends('layouts.base')

@section('content')
  @include('partials.page-header')
  @php(phpinfo())
    <div class="row">
      <div class="col-xs">
        <div class="hero">
          <h1>cache sucks</h1>
        </div>
      </div>
    </div>
@endsection
