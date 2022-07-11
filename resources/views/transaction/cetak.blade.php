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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Cetak – Depo Bangunan</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css') }}" />

    <style>
            @media print {
            .print {
                display: none;
            }
        }
    </style>

</head>

<body class="app sidebar-mini ltr">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">
            <!--app-content open-->
            {{-- <div class="main-content app-content mt-0"> --}}
                {{-- <div class="side-app "> --}}

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid mt-5">

                        <!-- ROW-1 OPEN -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a class="header-brand" href="index.html">
                                                    <img style="width: 100px" src="{{ asset('assets/images/logo-depo.png') }}" class="header-brand-img logo-3" alt="Sash logo">
                                                    {{-- <img src="{{ asset('assets/images/brand/logo.png') }}" class="header-brand-img logo" alt="Sash logo"> --}}
                                                </a>
                                                <div>
                                                    <address class="pt-3">
                                                        Jl. Raya Serpong No.KM. 2<br>
                                                        Pakulonan<br>
                                                        Kec. Serpong Utara<br>
                                                        Kota Tangerang Selatan, Banten<br>
                                                        15325<br>
                                                    </address>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 text-end border-bottom border-lg-0">
                                                <h3>Date: {{ date('d-m-Y') }}</h3>
                                                {{-- <h5>Date Issued: 12-07-2021</h5>
                                                <h5>Due Date: 12-07-2021</h5> --}}
                                            </div>
                                        </div>
                                        <div class="row pt-5">
                                            <div class="col-lg-6">
                                                <p class="h3">Invoice To:</p>
                                                <p class="fs-18 fw-semibold mb-0">{{ucwords($transaction->nama)}}</p>
                                                <address>
                                                    {{$transaction->city->zona->zona}}<br>
                                                    {{$transaction->city->kelurahan->district->regency->name}}<br>
                                                    {{$transaction->city->kelurahan->district->name}}, {{$transaction->city->kelurahan->name}}<br>
                                                    {{$transaction->no_telp}}
                                                </address>
                                            </div>
                                            <div class="col-lg-6 text-end">
                                                <p class="h4 fw-semibold">Details:</p>
                                                <p class="mb-1"><b>100% Muatan:</b> Rp. {{$transaction->city->zona->harga100}}</p>
                                                <p class="mb-1"><b>50% Muatan:</b> Rp. {{$transaction->city->zona->harga50}}</p>
                                                <p class="mb-1"><b>20% Muatan:</b> Rp. {{$transaction->city->zona->harga25}}</p>
                                            </div>
                                        </div>

                                        <?php
                                    $muatan=0;
                                    $biaya=0;
                                    $surat=0;
                                        foreach ($transaction->details as $details ) {
                                            $muatan += $details->muatan;
                                            if($details->muatan==25){
                                                $biaya +=$transaction->city->zona->harga25;
                                            }else if($details->muatan==50){
                                                $biaya +=$transaction->city->zona->harga50;
                                            }else{
                                                $biaya +=$transaction->city->zona->harga100;
                                            }
                                            $surat++;
                                        }
                                        
                                    ?>
                                        <div class="table-responsive push">
                                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                                <tbody>
                                                    <tr class=" ">
                                                        <th class="text-center"></th>
                                                        <th>Keterangan</th>
                                                        <th class="text-center">Total Muatan</th>
                                                        <th class="text-end">Total Biaya</th>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">1</td>
                                                        <td>{{$surat}} Mobil</td>
                                                        <td class="text-center">{{$muatan}}%</td>
                                                        <td class="text-end">Rp. {{number_format($biaya)}}</td>
                                                    </tr>                                                    <tr>
                                                        <td colspan="3" class="fw-bold text-uppercase text-end">Total</td>
                                                        <td class="fw-bold text-end h4">Rp. {{number_format($biaya)}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-footer text-end">
                                        <button type="button" class="btn btn-danger mb-1 print" onclick="javascript:window.print();"><i class="si si-printer"></i> Print Invoice</button>
                                    </div>
                                </div>
                            </div>
                            <!-- COL-END -->
                        </div>
                        <!-- ROW-1 CLOSED -->

                    </div>
                    <!-- CONTAINER CLOSED -->
                {{-- </div> --}}
            {{-- </div> --}}
            <!--app-content closed-->
        </div>
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js') }}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{ asset('assets/js/circle-progress.min.js') }}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js') }}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js') }}"></script>

    <!-- Perfect SCROLLBAR JS-->
    <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll.js') }}"></script>
    <script src="{{ asset('assets/plugins/p-scroll/pscroll-1.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/js/themeColors.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/js/sticky.js') }}"></script>

    <!-- CUSTOM JS -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>