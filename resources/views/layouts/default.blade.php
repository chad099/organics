<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/assets/front/style.css" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="/assets/front/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="/assets/front/js/bootstrap.min.js"></script>
	</head>
	<body>
				<div class="header-wrapper">
					@include('front.includes.navigation')
				</div>
				@if(Session::has('message'))
				<div class="alert alert-success">
						{{ Session::get('message') }}
				</div>
				@endif
	       @yield('content')
				 <div class="row footer">
				   <div class="container"> <center style="color: rgb(152, 152, 152);">&#xA9; Copyright Organics.org<center></div>
				 </div>
  </body>

	<script src="/assets/front/tinymce/tinymce.min.js"></script>
	<script src="/assets/front/js/general.js"></script>
</html>
