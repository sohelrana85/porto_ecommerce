<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- Vector CSS -->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}') }}" rel="stylesheet" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-sidebar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        @include('backend.components.sidebar')
        <!--end sidebar-wrapper-->
        <!--header-->
        @include('backend.components.header')
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    @yield('content')
                </div>
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
        @include('backend.components.footer')
        <!-- end footer -->
    </div>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}"> </script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"> </script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"> </script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"> </script>
    <script src="{{ asset('backend/assets/js/index2.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function () {
			//Default data table
			$('#example').DataTable();
		});
    </script>
</body>

</html>
