@extends('layouts.two_column')
@section('content')
  @if($page == 'post')
    @include('front.pages.post')
  @elseif($page == 'deal')
    @include('front.pages.deal')
  @endif
@endsection
