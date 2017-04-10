<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/assets/front/style.css" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="/assets/front/css/bootstrap.min.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
    <link rel="stylesheet" type="text/css" href="/assets/front/custom.css" />
		<script src="/assets/front/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/assets/front/css/font-awesome.min.css" />
	</head>
	<body>
    <div class="header-wrapper">
      @include('front.includes.navigation')
    </div>

		<div class="center">
			<div class="row">
				<div class="col-sm-8">
					<div class=""><div>
						<div class="">
							@if(Session::has('message'))
							<div class="alert alert-success">
									{{ Session::get('message') }}
							</div>
							@endif
							@if(Session::has('error_message'))
							<div class="alert alert-alert">
									{{ Session::get('error_message') }}
							</div>
							@endif
              @yield('content')
						</div>
					 </div>
				  </div>
        </div>

    			<!-------------------------------------------------RIGHT SIDEBAR --------------------------------->
          <div class="col-sm-4">
            @include('front.includes.right_sidebar')
          </div>

					<!-------------------------------------------------Footer --------------------------------->
					<div class="row footer">
              @include('front.includes.footer')
					</div>
        </div>
		</div>
    <script src="/assets/front/tinymce/tinymce.min.js"></script>
    <script src="/assets/front/js/general.js"></script>
	</body>
</html>
