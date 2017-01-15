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
  @elseif($page == 'posts')
    @include('front.pages.posts')
  @elseif($page == 'post')
    @include('front.pages.post')
  @endif
@endsection
