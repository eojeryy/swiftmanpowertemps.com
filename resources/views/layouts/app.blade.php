<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>@yield('title', 'Swift Manpower Temps Agency Ltd')</title>

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/images/logo/swiftmta2.png') }}" type="image/png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,300;1,400;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Muli:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <link href="{{ asset('assets/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">

    <style>
        .brand-logo {
            display: inline-flex;
            align-items: center;
        }

        .brand-logo img {
            display: block;
            height: 96px;
            width: auto;
        }

        .sticky-header .brand-logo img {
            height: 81px;
        }

        .brand-logo-mobile img {
            height: 75px;
        }

        .brand-logo-footer img {
            height: 87px;
        }

        .page-title {
            padding-top: 280px;
        }

        @media (max-width: 991px) {
            .page-title {
                padding-top: 180px;
            }
        }
    </style>

    @yield('styles')
</head>

<body>
    <div class="boxed_wrapper">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader"><div class="preloader-close">Preloader Close</div></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- search-popup -->
        <div id="search-popup" class="search-popup">
            <div class="close-search"><i class="flaticon-close"></i></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <form method="get" action="{{ route('jobs.search') }}">
                        <div class="form-group">
                            <fieldset>
                                <input type="search" class="form-control" name="q" value="{{ request('q') }}" placeholder="Search jobs, categories, or hiring companies" required>
                                <input type="submit" value="Search Jobs" class="theme-btn style-four">
                            </fieldset>
                        </div>
                    </form>
                    <h3>Popular Search Keywords</h3>
                    <ul class="recent-searches">
                        <li><a href="{{ route('jobs.search', ['q' => 'Warehouse']) }}">Warehouse</a></li>
                        <li><a href="{{ route('jobs.search', ['q' => 'Labour']) }}">Labour</a></li>
                        <li><a href="{{ route('jobs.search', ['q' => 'Office Support']) }}">Office Support</a></li>
                        <li><a href="{{ route('jobs.search', ['q' => 'Northline']) }}">Northline</a></li>
                        <li><a href="{{ route('jobs.search', ['q' => 'Customer Support']) }}">Customer Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- search-popup end -->

        @include('layouts.partials.header')

        @yield('content')

        @include('layouts.partials.footer')

        <button class="scroll-top scroll-to-target" data-target="html"><i class="flaticon-up-arrow-1"></i>Top</button>
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>
    <script src="{{ asset('assets/js/wow.js') }}"></script>
    <script src="{{ asset('assets/js/validation.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('assets/js/appear.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/tilt.jquery.js') }}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{ asset('assets/js/gmaps.js') }}"></script>
    <script src="{{ asset('assets/js/map-helper.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>

    @yield('scripts')
</body>
</html>
