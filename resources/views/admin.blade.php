@extends('layouts.admin_layout')

@section('content')
  @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success')}}</div>
  @endif
  @if($page == 'admin')
    @include('admin.pages.index')
  @elseif($page == 'login')
    @include('admin.pages.login')
  @elseif($page == 'userlist')
    @include('admin.pages.userlist')
  @elseif($page == 'useredit')
    @include('admin.pages.useredit')
  @endif
@endsection
