<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('/assets/images/logo-depo.png') }}" class="header-brand-img desktop-logo" style="width:80px" alt="logo">
                <img src="{{ asset('/assets/images/logo-depo.png') }}" class="header-brand-img toggle-logo" style="width:50px; height:30px" alt="logo">
                <img src="{{ asset('/assets/images/logo-depo.png') }}" class="header-brand-img light-logo" style="width:50px; height:30px" alt="logo">
                <img src="{{ asset('/assets/images/logo-depo.png') }}" class="header-brand-img light-logo1" style="width:80px" alt="logo">
            </a>
            <!-- LOGO -->
        </div>
        <div class="main-sidemenu">
            <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                    fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                </svg></div>
            <ul class="side-menu">
                <li class="sub-category">
                    <h3>Main</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item @if (Request::segment(1) == 'dashboard') active @endif" data-bs-toggle="slide" href="/dashboard"><i
                            class="side-menu__icon fe fe-home"></i><span
                            class="side-menu__label active">Dashboard</span></a>
                </li>
                @can('read-role',Permission::class)
                <li class="sub-category">
                    <h3>Management</h3>
                </li>
                <li class="slide @if (Request::segment(1) == 'role' || Request::segment(1) == 'createRole' || Request::segment(1) == 'editRole' || Request::segment(1) == 'aksesRole') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'role' || Request::segment(1) == 'createRole' || Request::segment(1) == 'editRole' || Request::segment(1) == 'aksesRole') active @endif" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-slack"></i><span
                            class="side-menu__label">Management</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu ">
                        <li class="side-menu-label1"><a href="#">Management</a></li>
                        <li><a href="/role" class="slide-item @if (Request::segment(1) == 'role' || Request::segment(1) == 'createRole' || Request::segment(1) == 'editRole' || Request::segment(1) == 'aksesRole') active @endif"> Role Management</a></li>
                        {{-- <li><a href="calendar.html" class="slide-item"> Default calendar</a></li>
                        <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li> --}}
                    </ul>
                </li>
                @endcan
                <!-- if (Auth::user()->hasRole('superadmin'))
                endif -->
                @can(['read-zona','read-kota'],Permission::class)
                <li class="sub-category">
                    <h3>Data</h3>
                </li>
                <li class="slide @if (Request::segment(1) == 'zona' || Request::segment(1) == 'createZona' || Request::segment(1) == 'editZona' || Request::segment(1) == 'city' || Request::segment(1) == 'createCity' || Request::segment(1) == 'editCity' || Request::segment(1) == 'users') is-expanded @endif">
                    <a class="side-menu__item @if (Request::segment(1) == 'zona' || Request::segment(1) == 'createZona' || Request::segment(1) == 'editZona' || Request::segment(1) == 'city' || Request::segment(1) == 'createCity' || Request::segment(1) == 'editCity' || Request::segment(1) == 'users') active @endif" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-box"></i><span
                            class="side-menu__label">Master Data</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="#">Master Data</a></li>
                        @can('read-user',Permission::class)
                        <li><a href="/users" class="slide-item @if (Request::segment(1) == 'users' || Request::segment(1) == 'createUser' || Request::segment(1) == 'editUser') active @endif"> User</a></li>
                        @endcan
                        @can('read-zona',Permission::class)
                        <li><a href="/zona" class="slide-item @if (Request::segment(1) == 'zona' || Request::segment(1) == 'createZona' || Request::segment(1) == 'editZona') active @endif"> Zona</a></li>
                        @endcan
                        @can('read-kota',Permission::class)
                        <li><a href="/city" class="slide-item @if (Request::segment(1) == 'city' || Request::segment(1) == 'createCity' || Request::segment(1) == 'editCity') active @endif"> Kota</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan
                @can('read-transaksi',Permission::class)
                <li class="sub-category">
                    <h3>Transaksi</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item @if (Request::segment(1) == 'transaction' || Request::segment(1) == 'createTransaction') active @endif" data-bs-toggle="slide" href="/transaction"><i
                            class="side-menu__icon fe fe-book"></i><span
                            class="side-menu__label active">Transaksi</span></a>
                </li>
                @endcan
                @can('read-laporan',Permission::class)
                <li class="sub-category">
                    <h3>Laporan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="#"><i
                            class="side-menu__icon fe fe-book-open"></i><span
                            class="side-menu__label">Report</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Laporan</a></li>
                        <li><a href="{{ 'reportHarian' }}" class="slide-item"> Laporan Harian</a></li>
                        <li><a href="{{ 'reportMingguan' }}" class="slide-item"> Laporan Mingguan</a></li>
                        <li><a href="{{ 'reportBulanan' }}" class="slide-item"> Laporan Bulanan</a></li>
                    </ul>
                </li>
                @endcan
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                </svg>
            </div>
        </div>
    </div>
    <!--/APP-SIDEBAR-->
</div>