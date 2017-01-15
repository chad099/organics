@extends('layouts.two_column')
@section('content')
  @if($page == 'post')
    @include('front.pages.post')
  @endif
@endsection
