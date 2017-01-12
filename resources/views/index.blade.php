@extends('layouts.default')

@section('content')
  @if($page == 'index')
    @include('front.pages.index')
  @elseif($page == 'register')
    @include('front.pages.register')
  @elseif($page == 'profile')
    @include('front.pages.profile')
  @elseif($page == 'create_post')
    @include('front.pages.create_post')
  @endif
@endsection
