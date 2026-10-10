<footer class="site-footer">
    <div class="auto-container">
        <div class="footer-grid">
            <div>
<a class="footer-wordmark" href="{{ route('home') }}">Swift Manpower<span>Temps Agency Ltd</span>
</a>
<p>A Calgary-based staffing agency connecting Canadian employers with people ready for their next opportunity.</p>
<a href="tel:+15878992598">587-899-2598</a>
<br>
<a href="tel:+14388712598">438-871-2598</a>
</div>
            <div>
<h2>For employers</h2>
<a href="{{ route('employer.overview') }}">Hire staff in Canada</a>
<a href="{{ route('staffing.solutions') }}">Staffing solutions</a>
<a href="{{ route('place.job') }}">Request staff</a>
<a href="{{ route('recruitment.processes') }}">Recruitment process</a>
</div>
            <div>
<h2>For job seekers</h2>
<a href="{{ route('job.openings') }}">Current job openings</a>
<a href="{{ route('employee.overview') }}">Candidate support</a>
<a href="{{ route('apply.now') }}">Submit your resume</a>
<a href="{{ route('employee.sign-in') }}">Candidate sign in</a>
<a href="{{ route('blog.grid') }}">Hiring &amp; career insights</a>
</div>
            <div>
<h2>Let’s connect</h2>
<address>#201, 3501 29 St NE<br>Calgary, Alberta, Canada</address>
<a href="mailto:monica@swiftmanpowertemps.com">monica@swiftmanpowertemps.com</a>
<a href="mailto:fabian@swiftmanpowertemps.com">fabian@swiftmanpowertemps.com</a>
<a href="{{ route('contact') }}">Contact our team</a>
<a href="{{ route('faq') }}">Frequently asked questions</a>
</div>
        </div>
        <div class="site-footer-bottom">
<p>&copy; {{ now()->year }} Swift Manpower Temps Agency Ltd. All rights reserved.</p>
<a href="{{ route('about.company') }}">About the agency</a>
</div>
    </div>
</footer>
