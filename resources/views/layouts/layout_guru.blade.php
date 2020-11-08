<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

    <link href="{{asset('/')}}main.css" rel="stylesheet">
    <!-- Jquery  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script defer src="https://unpkg.com/ziggy-js@0.9.x/dist/js/route.min.js"></script>

    @yield('linkhead')
    <style media="screen">
    @import url('https://fonts.googleapis.com/css2?family=Palanquin:wght@500&display=swap');
    /* body {font-family: 'Palanquin', sans-serif;} */

    @media screen and (max-width: 1000px) {
        .table-inside {
            overflow-y:auto;
            overflow-x:scroll;
        }
        .btn { margin-bottom: 5px; }
    }
    .card{
        box-shadow: 2px 2px 10px rgba(48, 10, 64, 0.5);
        margin-bottom: 20px;
        border-radius: 0px 0px 15px 15px;
    }
    .card-header {
        background: rgba(26, 166, 65, 0.47);
    }
    .metismenu-icon {color: black; font-weight:bold;}
    thead{background-color:#393A3C; color:white; font-weight:bold}
    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow bg-heavy-rain header-text-dark" style="box-shadow: 2px 8px 8px rgba(0, 0, 0, 0.25);">
            <div class="app-header__logo">
              <!-- dibawah ini logonya nanti -->
              <img src="{{asset('Front_Home/assets/img/logo/logo2.png')}}" alt="" class="logo-src">
              
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="{{asset('assets/images/u.png')}}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>
                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <button type="button" tabindex="0" class="dropdown-item">Dividers</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        Guru
                                    </div>
                                    <div class="widget-subheading">
                                        {{auth()->user()->name}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- INI HEADER -->
            @include('layouts.guru.header')
        </div>

        <div class="app-main">
            <!-- ini sidebar -->
            @include('layouts.guru.sidebar')
				<div class="app-main__inner">
					@yield('content')
				</div>
                <div class="app-wrapper-footer">
                    <div class="app-footer ">
                        <div class="app-footer__inner bg-heavy-rain ">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <i> PhyDiags </i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                &copy
                                            </div>
                                            Pendidikan Fisika UNJA
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('assets/scripts/main.js')}}"></script>
    <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @yield('linkfooter')
</body>
@yield('js')
@yield('chart')
</html>
