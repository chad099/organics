<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Organics</title>

    <!-- Bootstrap Core CSS -->
    <link href="/assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/assets/admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="/assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="/assets/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/admin/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">Organic admin</a>
            </div>
            <!-- /.navbar-header -->
            @if(Auth::check())
              @include('admin.includes.navigation')
              @include('admin.includes.left_navigation')
            @endif
        </nav>

        <div id="page-wrapper">
            @yield('content')
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="/assets/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="/assets/admin/vendor/raphael/raphael.min.js"></script>
    <script src="/assets/admin/vendor/morrisjs/morris.min.js"></script>
    <script src="/assets/admin/data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/admin/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/assets/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>
    <script src="/assets/front/tinymce/tinymce.min.js"></script>
    <script src="/assets/front/js/general.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });

        //active menu based on url
        var pathname = window.location.pathname;
        var murl =  pathname.split('/');
        $('#side-menu li ul li a').each(function(){
            if(murl[2]) {
              if($(this).attr('href').indexOf(murl[2]) !== -1) { 
                   $(this).parent().parent().addClass('in');
                   $(this).addClass('active');
              }
            }

        });
    });
    </script>
</body>

</html>
