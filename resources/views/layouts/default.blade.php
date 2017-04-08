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
		<link rel="stylesheet" type="text/css" href="/assets/front/custom.css" />
		<link href="/assets/front/tab/responsive-tabs.css" rel="stylesheet" type="text/css" />
    <script src="/assets/front/js/responsive-tabs.js" type="text/javascript"></script>
		<title>Organic</title>
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
				@if(Session::has('error_message'))
				<div class="alert alert-info">
						{{ Session::get('error_message') }}
				</div>
				@endif
	       @yield('content')
				 <div class="row footer">
				   @include('front.includes.footer')
				 </div>
  </body>

	<script src="/assets/front/tinymce/tinymce.min.js"></script>
	<script src="/assets/front/js/general.js"></script>
</html>
