<!--APP-SIDEBAR-->
<div class="sticky">
    <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
    <div class="app-sidebar">
        <div class="side-header">
            <a class="header-brand1" href="index.html">
                <img src="{{ asset('/assets/images/brand/logo.png') }}" class="header-brand-img desktop-logo" alt="logo">
                <img src="{{ asset('/assets/images/brand/logo-1.png') }}" class="header-brand-img toggle-logo"
                    alt="logo">
                <img src="{{ asset('/assets/images/brand/logo-2.png') }}" class="header-brand-img light-logo" alt="logo">
                <img src="{{ asset('/assets/images/brand/logo-3.png') }}" class="header-brand-img light-logo1"
                    alt="logo">
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
                <li class="sub-category">
                    <h3>Management</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-slack"></i><span
                            class="side-menu__label">Management</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Management</a></li>
                        <li><a href="{{ 'role' }}" class="slide-item"> Role Management</a></li>
                        <li><a href="calendar.html" class="slide-item"> Default calendar</a></li>
                        <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>Data</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-box"></i><span
                            class="side-menu__label">Master Data</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Master Data</a></li>
                        <li><a href="{{ 'zona' }}" class="slide-item"> Zona</a></li>
                        <li><a href="{{ 'city' }}" class="slide-item"> Kota</a></li>
                    </ul>
                </li>
                <li class="sub-category">
                    <h3>Transaksi</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item @if (Request::segment(1) == 'transaksi') active @endif" data-bs-toggle="slide" href="/transaction"><i
                            class="side-menu__icon fe fe-book"></i><span
                            class="side-menu__label active">Transaksi</span></a>
                </li>
                <li class="sub-category">
                    <h3>Laporan</h3>
                </li>
                <li class="slide">
                    <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                            class="side-menu__icon fe fe-book-open"></i><span
                            class="side-menu__label">Report</span><i
                            class="angle fe fe-chevron-right"></i></a>
                    <ul class="slide-menu">
                        <li class="side-menu-label1"><a href="javascript:void(0)">Laporan</a></li>
                        <li><a href="{{ 'zona' }}" class="slide-item"> Histori Transaksi</a></li>
                    </ul>
                </li>
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