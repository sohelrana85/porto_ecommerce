<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Porto Ecommerce</title>
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
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div class="">
                    <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon-2" alt="" />
                </div>
                <div>
                    <h4 class="logo-text">Name</h4>
                </div>
                <a href="javascript:;" class="toggle-btn ml-auto"> <i class="bx bx-menu"></i>
                </a>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                    <ul>
                        <li> <a href="index.html"><i class="bx bx-right-arrow-alt"></i>Analytics</a>
                        </li>
                        <li> <a href="index2.html"><i class="bx bx-right-arrow-alt"></i>Sales</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar-wrapper-->
        <!--header-->
        <header class="top-header">
            <nav class="navbar navbar-expand">
                <div class="left-topbar d-flex align-items-center">
                    <a href="javascript:;" class="toggle-btn"> <i class="bx bx-menu"></i>
                    </a>
                </div>

                <div class="right-topbar ml-auto">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="javascript:;" data-toggle="dropdown"> <span class="msg-count">6</span>
                                <i class="bx bx-comment-detail vertical-align-middle"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <h6 class="msg-header-title">6 New</h6>
                                        <p class="msg-header-subtitle">Application Messages</p>
                                    </div>
                                </a>
                                <div class="header-message-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">Daisy Anderson <span class="msg-time float-right">5
                                                        sec
                                                        ago</span></h6>
                                                <p class="msg-info">The standard chunk of lorem</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="user-online">
                                                <img src="{{ asset('backend/assets/images/avatars/avatar-2.png') }}"
                                                    class="msg-avatar" alt="user avatar">
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">Althea Cabardo <span
                                                        class="msg-time float-right">14
                                                        sec ago</span></h6>
                                                <p class="msg-info">Many desktop publishing packages</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Messages</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-lg">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                href="javascript:;" data-toggle="dropdown"> <i
                                    class="bx bx-bell vertical-align-middle"></i>
                                <span class="msg-count">8</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="javascript:;">
                                    <div class="msg-header">
                                        <h6 class="msg-header-title">8 New</h6>
                                        <p class="msg-header-subtitle">Application Notifications</p>
                                    </div>
                                </a>
                                <div class="header-notifications-list">
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="notify bg-light-primary text-primary"><i
                                                    class="bx bx-group"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">New Customers<span class="msg-time float-right">14
                                                        Sec
                                                        ago</span></h6>
                                                <p class="msg-info">5 new user registered</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="javascript:;">
                                        <div class="media align-items-center">
                                            <div class="notify bg-light-danger text-danger"><i
                                                    class="bx bx-cart-alt"></i>
                                            </div>
                                            <div class="media-body">
                                                <h6 class="msg-name">New Orders <span class="msg-time float-right">2 min
                                                        ago</span></h6>
                                                <p class="msg-info">You have recived new orders</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <a href="javascript:;">
                                    <div class="text-center msg-footer">View All Notifications</div>
                                </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-user-profile">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-toggle="dropdown">
                                <div class="media user-box align-items-center">
                                    <div class="media-body user-info">
                                        <p class="user-name mb-0">Sohel Rana</p>
                                        <p class="designattion mb-0">Available</p>
                                    </div>
                                    <img src="{{ asset('backend/assets/images/avatars/avatar-1.png') }}"
                                        class="user-img" alt="user avatar">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"> <a class="dropdown-item"
                                    href="javascript:;"><i class="bx bx-user"></i><span>Profile</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cog"></i><span>Settings</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-tachometer"></i><span>Dashboard</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-wallet"></i><span>Earnings</span></a>
                                <a class="dropdown-item" href="javascript:;"><i
                                        class="bx bx-cloud-download"></i><span>Downloads</span></a>
                                <div class="dropdown-divider mb-0"></div> <a class="dropdown-item"
                                    href="javascript:;"><i class="bx bx-power-off"></i><span>Logout</span></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="row">
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-voilet">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">649 <i
                                                    class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ml-auto font-35 text-white"><i class="bx bx-cart-alt"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Item Delivered</p>
                                        </div>
                                        <div class="ml-auto font-14 text-white">+23.4%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-primary-blue">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">114 <i
                                                    class='bx bxs-down-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ml-auto font-35 text-white"><i class="bx bx-support"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Refund Request</p>
                                        </div>
                                        <div class="ml-auto font-14 text-white">+14.7%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-rose">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">98 <i
                                                    class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ml-auto font-35 text-white"><i class="bx bx-tachometer"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">Cancelled Orders</p>
                                        </div>
                                        <div class="ml-auto font-14 text-white">-12.9%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="card radius-15 bg-sunset">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h2 class="mb-0 text-white">208 <i
                                                    class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
                                        </div>
                                        <div class="ml-auto font-35 text-white"><i class="bx bx-user"></i>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-white">New Users</p>
                                        </div>
                                        <div class="ml-auto font-14 text-white">+13.6%</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                    <div class="card radius-15">
                        <div class="card-header border-bottom-0">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="mb-0">Recent Orders</h5>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-white radius-15">View More</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Product Name</th>
                                            <th>Customer</th>
                                            <th>Product id</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="product-img bg-transparent border">
                                                    <img src="{{ asset('backend/assets/images/icons/smartphone.png') }}"
                                                        width="35" alt="">
                                                </div>
                                            </td>
                                            <td>Honor Mobile 7x</td>
                                            <td>Mitchell Daniel</td>
                                            <td>#835478</td>
                                            <td>$54.68</td>
                                            <td><a href="javascript:;"
                                                    class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-img bg-transparent border">
                                                    <img src="{{ asset('backend/assets/images/icons/watch.png') }}"
                                                        width="35" alt="">
                                                </div>
                                            </td>
                                            <td>Hand Watch</td>
                                            <td>Milona Burke</td>
                                            <td>#987546</td>
                                            <td>$43.78</td>
                                            <td><a href="javascript:;"
                                                    class="btn btn-sm btn-light-warning btn-block radius-30">Pending</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-img bg-transparent border">
                                                    <img src="{{ asset('backend/assets/images/icons/laptop.png') }}"
                                                        width="35" alt="">
                                                </div>
                                            </td>
                                            <td>Mini Laptop</td>
                                            <td>Craig Clayton</td>
                                            <td>#325687</td>
                                            <td>$62.21</td>
                                            <td><a href="javascript:;"
                                                    class="btn btn-sm btn-light-success btn-block radius-30">Delivered</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="product-img bg-transparent border">
                                                    <img src="{{ asset('backend/assets/images/icons/shirt.png') }}"
                                                        width="35" alt="">
                                                </div>
                                            </td>
                                            <td>Slim-T-Shirt</td>
                                            <td>Clark Andola</td>
                                            <td>#658972</td>
                                            <td>$75.68</td>
                                            <td><a href="javascript:;"
                                                    class="btn btn-sm btn-light-danger btn-block radius-30">Cancelled</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
        <div class="footer">
            <p class="mb-0">copyright@2021 | Developed By : <a href="" target="_blank">Sohel</a>
            </p>
        </div>
        <!-- end footer -->
    </div>

    <!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/bootstrap.min.js') }}">
    </script>
    <!--plugins-->
    <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
    </script>
    <!-- Vector map JavaScript -->
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-in-mill.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-au-mill.js') }}">
    </script>
    <script src="{{ asset('backend/assets/plugins/apexcharts-bundle/js/apexcharts.min.js') }}">
    </script>
    <script src="{{ asset('backend/assets/js/index2.js') }}"></script>
    <!-- App JS -->
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
</body>

</html>
