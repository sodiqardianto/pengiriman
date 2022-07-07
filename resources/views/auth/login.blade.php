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
                        <img src="{{ asset('/assets/images/logo-depo.png') }}" class="header-brand-img" style="width: 150px" alt="logo-depo">
                    </div>
                </div>

                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <span class="login100-form-title pb-5">
                                    Login
                                </span>

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        <span class="alert-inner--icon"><i class="fe fe-check-square"></i></span>
                                        <span class="alert-inner--text">{{ session('status') }}</span>
                                    </div>
                                    {{-- <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div> --}}
                                @endif

                                <div class="panel panel-primary">
                                    <div class="panel-body tabs-menu-body p-0 pt-5">
                                        <div class="tab-content">
                                            <div class="tab-pane active">
                                                <div class="form-row">
                                                    <div class="col-xl-12 mb-3">
                                                        <label><b>Email</b></label>
                                                        <input type="email" name="email" class="form-control @error('email') is-invalid state-invalid @enderror" placeholder="Input Email" value="{{ old('email') }}" autofocus required>
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>  
                                                    <div class="col-xl-12 mb-3">
                                                        <label><b>Password</b></label>
                                                        <input type="password" name="password" class="form-control @error('password') is-invalid state-invalid @enderror" placeholder="Input Password" required>
                                                        @error('password')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>  
                                                </div>
                                                <div class="text-end pt-4">
                                                    <p class="mb-0">
                                                        @if (Route::has('password.request'))
                                                            <a href="{{ route('password.request') }}" class="text-primary ms-1">Forgot Password?</a>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="container-login100-form-btn">
                                                    <button type="submit" class="login100-form-btn btn-primary">
                                                            Login
                                                    </button>
                                                </div>
                                                {{-- <div class="text-center pt-3">
                                                    <p class="text-dark mb-0">Not a member?<a href="register.html" class="text-primary ms-1">Sign UP</a></p>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- End PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('/assets/js/show-password.min.js') }}"></script>

    <!-- GENERATE OTP JS -->
    <script src="{{ asset('/assets/js/generate-otp.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('/assets/js/themeColors.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('/assets/js/custom.js') }}"></script>

</body>

</html>