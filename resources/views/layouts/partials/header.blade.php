<!-- main header -->
<header class="main-header style-three">
    <div class="header-lower">
        <div class="outer-box">
            <figure class="logo-box">
                <a href="{{ route('home') }}" class="brand-logo" aria-label="Swift Manpower Temps Agency Ltd">
                    <img src="{{ asset('assets/images/logo/swiftmta2.png') }}" alt="Swift Manpower Temps Agency Ltd logo">
                </a>
            </figure>
            <div class="menu-area">
                <div class="mobile-nav-toggler">
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                    <i class="icon-bar"></i>
                </div>
                <nav class="main-menu navbar-expand-md navbar-light">
                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                        <ul class="navigation clearfix">
                            <li class="current"><a href="{{ route('home') }}">Home</a></li>
                            <li class="dropdown"><a href="{{ route('about.company') }}">About</a>
                                <ul>
                                    <li><a href="{{ route('about.company') }}">About Company</a></li>
                                    <li><a href="{{ route('about.team') }}">Meet Our Team</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{ url('/') }}">Employers</a>
                                <ul>
                                    <li><a href="{{ route('employer.overview') }}">Overview</a></li>
                                    <li><a href="{{ route('place.job') }}">Place Job Order</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ’s</a></li>
                                    <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{ url('/') }}">Job Seekers</a>
                                <ul>
                                    <li><a href="{{ route('employee.overview') }}">Overview</a></li>
                                    <li class="dropdown"><a href="{{ url('/') }}">Job Openings</a>
                                        <ul>
                                            <li><a href="{{ route('job.openings') }}">Job Openings</a></li>
                                            <li><a href="{{ route('job.details') }}">Detail Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('apply.now') }}">Apply Now</a></li>
                                    <li><a href="{{ route('employee.sign-up') }}">Employee Sign Up</a></li>
                                    <li><a href="{{ route('employee.sign-in') }}">Employee Sign In</a></li>
                                    <li><a href="{{ route('faq') }}">FAQ’s</a></li>
                                    <li><a href="{{ route('testimonials') }}">Testimonials</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="{{ route('blog.grid') }}">Blog</a>
                                <ul>
                                    <li><a href="{{ route('blog.grid') }}">Grid View</a></li>
                                    <li><a href="{{ route('blog.details') }}">Single Post</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <ul class="menu-right-content pull-right clearfix">
                <li>
                    <div class="search-btn">
                        <button type="button" class="search-toggler"><i class="flaticon-loupe-1"></i></button>
                    </div>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="theme-btn-one">Appointment</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="sticky-header">
        <div class="outer-box clearfix">
            <div class="menu-area pull-left">
                <figure class="logo-box">
                    <a href="{{ route('home') }}" class="brand-logo" aria-label="Swift Manpower Temps Agency Ltd">
                        <img src="{{ asset('assets/images/logo/swiftmta2.png') }}" alt="Swift Manpower Temps Agency Ltd logo">
                    </a>
                </figure>
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
            </div>
            <ul class="menu-right-content pull-right clearfix">
                <li>
                    <div class="search-btn">
                        <button type="button" class="search-toggler"><i class="flaticon-loupe-1"></i></button>
                    </div>
                </li>
                <li>
                    <a href="{{ route('home') }}" class="theme-btn-one">Appointment</a>
                </li>
            </ul>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="{{ route('home') }}" class="brand-logo brand-logo-mobile" aria-label="Swift Manpower Temps Agency Ltd">
                <img src="{{ asset('assets/images/logo/swiftmta2.png') }}" alt="Swift Manpower Temps Agency Ltd logo">
            </a>
        </div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <h4>Contact Info</h4>
            <ul>
                <li>#201 3501 29st NE Calgary, AB</li>
                <li><a href="tel:+14388712598">438-871-2598</a> / <a href="tel:+15878992598">587-899-2598</a></li>
                <li><a href="mailto:swiftmanpowertemps@gmail.com">swiftmanpowertemps@gmail.com</a></li>
            </ul>
        </div>
        <div class="social-links">
            <ul class="clearfix">
                <li><a href="{{ url('/') }}"><span class="fab fa-twitter"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-facebook-square"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-pinterest-p"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-instagram"></span></a></li>
                <li><a href="{{ url('/') }}"><span class="fab fa-youtube"></span></a></li>
            </ul>
        </div>
    </nav>
</div>
<!-- End Mobile Menu -->
