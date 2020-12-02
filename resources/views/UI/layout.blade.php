<!DOCTYPE html>
<html lang="en">

<head>

    @php
        $setting = App\Setting::first();
    @endphp
    @if (isset($setting))

        <title>{{ $setting->blog_name }} -  @yield('title-page')</title>
    @endif
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=B612+Mono|Cabin:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('UI/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('UI/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('UI/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('UI/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('UI/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('UI/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('UI/css/aos.css') }}">
    <link href="{{ asset('UI/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('UI/css/style.css') }}">

    <style>
        .badge-dark {
            color: #fff;
            background-color: #343a40;
            padding-left: 13px;
            padding-right: 13px;
            padding-top: 5px;
            padding-bottom: 5px;
        }
    </style>

<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

<div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>


    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 d-flex">
                    <a href="index.html" class="site-logo">
                        @if (isset($setting))
                            {{ $setting->blog_name }}
                        @endif
                    </a>

                    <a href="#"
                       class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                            class="icon-menu h3"></span></a>

                </div>
                <div class="col-12 col-lg-6 ml-auto d-flex">
                    <div class="ml-md-auto top-social d-none d-lg-inline-block">
                        @if (isset($setting))

                            <a href="{{ $setting->facebook }}" class="d-inline-block p-3"><span
                                    class="icon-facebook"></span></a>
                            <a href="{{ $setting->twitter }}" class="d-inline-block p-3"><span
                                    class="icon-twitter"></span></a>
                            <a href="{{ $setting->instagram }}" class="d-inline-block p-3"><span
                                    class="icon-instagram"></span></a>
                        @endif

                    </div>
                    <form method="GET" action="{{ route('UI.search') }}" class="search-form d-inline-block">

                        <div class="d-flex">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
                        </div>
                    </form>


                </div>
                <div class="col-6 d-block d-lg-none text-right">

                </div>
            </div>
        </div>

        <style>
            .active_menu a{
                color: #71af2a!important;
                font-weight: bold;
            }
        </style>

        <div class="site-navbar py-2 js-sticky-header site-navbar-target d-none pl-0 d-lg-block" role="banner">

            <div class="container">
                <div class="d-flex align-items-center">

                    <div class="mr-auto">
                        <nav class="site-navigation position-relative text-right" role="navigation">
                            <ul class="site-menu main-menu js-clone-nav mr-auto d-none pl-0 d-lg-block">
                                <li class="{{ Request::routeIs('UI.index') ? 'active_menu' : '' }}">
                                    <a href="{{ route('UI.index') }}" class="nav-link text-left">Home</a>
                                </li>
                                @foreach ($categories as $categoy)
                                    <li class="{{ Request::routeIs('UI.showCategory',['id' => $categoy->id,'slug' =>  $categoy->slug]) ? 'active_menu' : ''}}">
                                        <a href="{{ route('UI.showCategory',['id' => $categoy->id,'slug' =>  $categoy->slug]) }}"
                                           class="nav-link text-left">{{ $categoy->name }}</a>
                                    </li>
                                @endforeach

                                <li class="{{ Request::routeIs('UI.showContact') ? 'active_menu' : '' }}">
                                    <a href="{{ route('UI.showContact') }}" class="nav-link text-left">Contact</a>
                                </li>
                            </ul>
                        </nav>

                    </div>

                </div>
            </div>

        </div>

    </div>


    @yield('content')

</div>

<div class="footer">
    <div class="container">

        @if (isset($setting))

            <div class="row">
                <div class="col-12">
                    <div class="copyright">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            The Copy Right Save For &copy; {{ $setting->blog_name }}
                            <script>document.write(new Date().getFullYear()); </script>

                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>


<!-- .site-wrap -->


<!-- loader -->
<div id="loader" class="show fullscreen">
    <svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#ff5e15"/>
    </svg>
</div>

<script src="{{ asset('UI/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery-ui.js') }}"></script>
<script src="{{ asset('UI/js/popper.min.js') }}"></script>
<script src="{{ asset('UI/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('UI/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('UI/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('UI/js/aos.js') }}"></script>
<script src="{{ asset('UI/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('UI/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('UI/js/jquery.mb.YTPlayer.min.js') }}"></script>


<script src="{{ asset('UI/js/main.js') }}"></script>

@stack('scripts')

</body>

</html>
