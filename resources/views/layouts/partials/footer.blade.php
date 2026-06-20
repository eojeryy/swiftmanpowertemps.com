<!-- main-footer -->
<footer class="main-footer style-three bg-color-1">
    <div class="auto-container">
        <div class="footer-top">
            <div class="widget-section">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget logo-widget">
                            <figure class="footer-logo">
                                <a href="{{ url('/') }}" class="brand-logo brand-logo-footer" aria-label="Swift Manpower Temps Agency Ltd">
                                    <img src="{{ asset('assets/images/logo/swiftmta4.png') }}" alt="Swift Manpower Temps Agency Ltd logo">
                                </a>
                            </figure>
                            <div class="text">
                                <p>Swift Manpower Temps Agency Ltd supports employers with dependable staffing solutions and helps job seekers connect with practical opportunities.</p>
                                <p>#201 3501 29st NE Calgary, AB</p>
                                <p>Ph: <a href="tel:+14388712598">438-871-2598</a> / <a href="tel:+15878992598">587-899-2598</a></p>
                                <p>Email: <a href="mailto:swiftmanpowertemps@gmail.com">swiftmanpowertemps@gmail.com</a></p>
                            </div>
                            <div class="upload-btn"><a href="{{ url('/') }}"><i class="flaticon-cloud-computing"></i>Upload Resume</a></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget">
                            <div class="widget-title">
                                <h3>Useful Links</h3>
                            </div>
                            <ul class="links-list clearfix">
                                <li><a href="{{ url('/') }}">About Us</a></li>
                                <li><a href="{{ url('/') }}">Resources</a></li>
                                <li><a href="{{ url('/') }}">Testimonials</a></li>
                                <li><a href="{{ url('/') }}">Employers</a></li>
                                <li><a href="{{ url('/') }}">How It’s Work</a></li>
                                <li><a href="{{ url('/') }}">Job Seekers</a></li>
                                <li><a href="{{ url('/') }}">Industries</a></li>
                                <li><a href="{{ url('/') }}">Leadership</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                <li><a href="{{ route('employee.sign-up') }}">Employee Sign Up</a></li>
                                <li><a href="{{ route('employee.sign-in') }}">Employee Sign In</a></li>
                                <li><a href="{{ route('super-admin.sign-up') }}">Super Admin Sign Up</a></li>
                                <li><a href="{{ route('super-admin.sign-in') }}">Super Admin Sign In</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 footer-column">
                        <div class="footer-widget post-widget">
                            <div class="widget-title">
                                <h3>Service Highlights</h3>
                            </div>
                            <div class="post-inner">
                                <div class="post">
                                    <figure class="image-box"><a href="{{ route('blog.details') }}"><img src="{{ asset('assets/images/resource/footer-post-1.jpg') }}" alt=""></a></figure>
                                    <span class="post-date">Staffing</span>
                                    <h5><a href="{{ route('blog.details') }}">Temporary workforce support for fast-moving business needs</a></h5>
                                </div>
                                <div class="post">
                                    <figure class="image-box"><a href="{{ route('blog.details') }}"><img src="{{ asset('assets/images/resource/footer-post-2.jpg') }}" alt=""></a></figure>
                                    <span class="post-date">Recruitment</span>
                                    <h5><a href="{{ route('blog.details') }}">Reliable candidate matching for long-term hiring goals</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom clearfix">
            <div class="copyright pull-left"><p>&copy; 2020 <a href="{{ url('/') }}">Swift Manpower Temps Agency Ltd</a>, All Rights Reserved.</p></div>
            <ul class="footer-nav pull-right clearfix">
                <li><a href="{{ route('employee.sign-up') }}">Employee Sign Up</a></li>
                <li><a href="{{ route('employee.sign-in') }}">Employee Sign In</a></li>
                <li><a href="{{ route('super-admin.sign-up') }}">Admin Sign Up</a></li>
                <li><a href="{{ route('super-admin.sign-in') }}">Admin Sign In</a></li>
                <li><a href="{{ url('/') }}">Privacy Policy</a></li>
                <li><a href="{{ url('/') }}">Terms & Conditions</a></li>
                <li><a href="{{ url('/') }}">Site Map</a></li>
            </ul>
        </div>
    </div>
</footer>
<!-- main-footer end -->
