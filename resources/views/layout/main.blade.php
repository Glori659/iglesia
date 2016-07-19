<!DOCTYPE html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Galley Financial | BlockScore</title>

        <!-- Bootstrap Core CSS -->
        {{ HTML::style('assets/css/bootstrap.min.css') }}

        <!-- Custom CSS -->
        {{ HTML::style('assets/css/sb-admin.css') }}
        {{ HTML::style('assets/css/new-main.css') }}

        <!-- Morris Charts CSS -->
        {{ HTML::style('assets/css/plugins/morris.css') }}

        <!-- Custom Fonts -->
        {{ HTML::style('assets/font-awesome/css/font-awesome.min.css') }}

        <!--Bootstrap-datepicker-->
        {{ HTML::style('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}


        @yield('style-page')
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/')}}">
                        <img  style="height: 169%; margin-top: -12px;" class="normal" src="http://galleyfinancial.com/wp-content/uploads/2016/05/galley-financial-logo_-header.png" alt="Logo">
                    </a>
                </div>
                <!-- Top Menu Items -->
                @include("layout.partials.top-menu")
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                @include("layout.partials.sidebar")
                <!-- /.navbar-collapse -->
            </nav>

                <div class="container container-main">
                   <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                @yield('tittle')
                                @yield('btn-header')
                            </h1>
                                @yield('breadcrumb')
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        <div class="col-lg-12">
                            @include("layout.partials.messages")
                        </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                        @yield('content')
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->

        <footer class="footer">
            <div class="container text-center">
                <p class="text-muted">
                    Desarrollado por 
                    <a href="http://zuliatec.com/">
                    Glorienllys Delgadillo 
                    </a>
                </p>
            </div>
        </footer>

        <!-- jQuery -->
        {{ HTML::script('assets/js/jquery.js') }}

        <!-- Bootstrap Core JavaScript -->
        {{ HTML::script('assets/js/bootstrap.min.js') }}

        <!-- Main JavaScript -->
        {{ HTML::script('assets/js/new-main.js') }}
        
        {{ HTML::script('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}


        @yield('script-page')
        <!-- Morris Charts JavaScript -->
        <!--{{ HTML::script('assets/js/plugins/morris/raphael.min.js') }}
        {{ HTML::script('assets/js/plugins/morris/morris.min.js') }}
        {{ HTML::script('assets/js/plugins/morris/morris-data.js') }}-->
    </body>
</html>
