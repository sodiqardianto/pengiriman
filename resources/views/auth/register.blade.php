<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Sash – Bootstrap 5 Admin & Dashboard Template</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('/assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('/assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('/assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="text-center">
                        <img src="{{ asset('/assets/images/brand/logo-white.png') }}" class="header-brand-img m-0" alt="">
                    </div>
                </div>
                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <span class="login100-form-title">
									Registration
								</span>
                                <div class="form-row">
                                    <div class="col-xl-12 mb-3">
                                        <label><b>Nama</b></label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid state-invalid @enderror" placeholder="Input Nama" autofocus >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                    <div class="col-xl-12 mb-3">
                                        <label><b>Email</b></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid state-invalid @enderror" placeholder="Input Email" >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>  
                                    <div class="col-xl-12 mb-3">
                                        <label><b>Password</b></label>
                                        <input type="password" name="password" class="form-control @error('password') is-invalid state-invalid @enderror" placeholder="Input Password" >
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-3">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid state-invalid @enderror" placeholder="Confirm Password" >
                                    </div>
                                </div>
                            {{-- <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is : ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text" placeholder="User name">
                            </div>
                            <div class="wrap-input100 validate-input input-group" data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="email" placeholder="Email">
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="password" placeholder="Password">
                            </div> --}}
                            <div class="container-login100-form-btn">
                                <button type="submit" class="login100-form-btn btn-primary">
										Register
									</button>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="{{ route('login') }}" class="text-primary ms-1">Sign In</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('/assets/js/show-password.min.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('/assets/js/custom.js') }}"></script>

</body>

</html>