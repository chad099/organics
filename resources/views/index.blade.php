@extends('layouts.default')

@section('content')
  @if($page == 'index')
    @include('front.pages.index')
  @elseif($page == 'register')
    @include('front.pages.register')
  @endif
@endsection
