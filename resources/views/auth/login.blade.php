<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Porto Ecommerce</title>
    <!--favicon-->
    <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css" rel="stylesheet') }}" />
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/icons.css') }}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/app.css') }}" />
</head>

<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="card radius-15">
                        <div class="row no-gutters">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5">
                                    <div class="text-center">
                                        <img src="{{ asset('backend/assets/images/logo-icon.png') }}" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                    </div>
                                    <div class="login-separater text-center"> <span>LOGIN WITH EMAIL</span>
                                        <hr />
                                    </div>
                                    <div class="bg-danger text-light rounded">
                                        <x-auth-validation-errors />
                                    </div>
                                    <form action="{{ route('staff.login') }}" method="POST">
                                        @csrf
                                        <div class="form-group mt-4">
                                            <label for="email">Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Enter your email address" />
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Enter your password" />
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="customSwitch1" checked>
                                                    <label class="custom-control-label" for="customSwitch1">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group col text-right"> <a
                                                    href="{{ route('password.request') }}"><i
                                                        class='bx bxs-key mr-2'></i>Forget Password?</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="lni lni-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="mb-0">Don't have an account? <a
                                                href="{{ route('staff.register') }}">Sign
                                                up</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{ asset('backend/assets/images/login-images/login-frent-img.jpg') }}"
                                    class="card-img login-img h-100" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>

</html>
