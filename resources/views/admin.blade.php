@extends('layouts.admin_layout')

@section('content')
  @if(Session::has('success'))
    <div class="alert alert-success">{{ Session::get('success')}}</div>
  @endif
  @if(Session::has('admin_error_message'))
    <div class="alert alert-danger">{{ Session::get('admin_error_message')}}</div>
  @endif
  @if($page == 'admin')
    @include('admin.pages.index')
  @elseif($page == 'login')
    @include('admin.pages.login')
  @elseif($page == 'userlist')
    @include('admin.pages.userlist')
  @elseif($page == 'useredit')
    @include('admin.pages.useredit')
  @elseif($page == 'admin_post')
    @include('admin.pages.admin_post')
  @elseif($page == 'admin_comments')
    @include('admin.pages.admin_comments')
  @elseif($page == 'usercreate')
    @include('admin.pages.usercreate')
  @elseif($page == 'admin_post_edit')
    @include('admin.pages.postedit')
  @endif
@endsection
