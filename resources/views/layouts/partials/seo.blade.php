@php
    $seoPages = [
        'home' => ['Staffing Agency in Calgary, Canada | Swift Manpower Temps', 'Hire dependable staff or find your next job in Canada with Swift Manpower Temps Agency. Calgary-based temporary, contract and permanent recruitment support.'],
        'employer.overview' => ['Hire Staff in Canada | Calgary Recruitment Agency | Swift Manpower', 'Looking to hire staff in Canada? Connect with our Calgary recruitment team for temporary staffing, contract workers and permanent recruitment support.'],
        'employee.overview' => ['Find Work in Canada | Job Seeker Support | Swift Manpower', 'Looking for work in Canada? Explore job openings, submit your resume and connect with Swift Manpower Temps Agency in Calgary for candidate support.'],
        'job.openings' => ['Jobs in Canada | Current Vacancies | Swift Manpower Temps', 'Browse current jobs in Canada. Search vacancies by role, city and employment type, review requirements and apply through Swift Manpower Temps Agency.'],
        'place.job' => ['Request Staff in Canada | Swift Manpower Temps Agency', 'Tell our Calgary staffing team about your hiring needs. Request temporary staff, contract support or help recruiting for permanent roles in Canada.'],
        'apply.now' => ['Apply for Work in Canada | Submit Your Resume | Swift Manpower', 'Submit your resume, experience and availability to Swift Manpower Temps Agency in Calgary. Connect with our recruitment team about work opportunities in Canada.'],
        'staffing.solutions' => ['Temporary & Contract Staffing in Canada | Swift Manpower', 'Explore temporary, contract and permanent staffing support for Canadian businesses. Discuss your workforce needs with our Calgary recruitment team.'],
        'contact' => ['Contact Our Calgary Staffing Agency | Swift Manpower Temps', 'Contact Swift Manpower Temps Agency in Calgary, Alberta. Speak with our team about hiring staff, current vacancies or your job application in Canada.'],
        'about.company' => ['About Our Calgary Recruitment Agency | Swift Manpower Temps', 'Get to know Swift Manpower Temps Agency Ltd, a Calgary-based agency helping employers recruit staff and job seekers find work opportunities in Canada.'],
        'about.team' => ['Meet Our Calgary Recruitment Team | Swift Manpower Temps', 'Meet the people behind Swift Manpower Temps Agency in Calgary and connect with our team for staffing and candidate support.'],
        'why.choose.us' => ['Why Choose Swift Manpower | Canadian Staffing Support', 'Discover our approach to candidate matching, responsive communication and practical staffing support for employers and job seekers in Canada.'],
        'how.we.work' => ['How Our Staffing Agency Works | Swift Manpower Temps', 'Learn how Swift Manpower Temps Agency connects Canadian employers and job seekers, from your first conversation to candidate matching and placement.'],
        'recruitment.processes' => ['Recruitment Process for Canadian Employers | Swift Manpower', 'Explore our recruitment process, from understanding hiring needs and screening candidates to coordinating placements with Canadian employers.'],
        'faq' => ['Staffing & Job Application FAQs | Swift Manpower Canada', 'Find answers to common questions about staffing services, hiring requests, job openings and submitting an application to our Calgary recruitment agency.'],
        'blog.grid' => ['Hiring & Career Insights in Canada | Swift Manpower Temps', 'Read hiring and career insights from Swift Manpower Temps Agency. Explore resources for Canadian employers and job seekers.'],
    ];
    [$seoTitle, $seoDescription] = $seoPages[request()->route()?->getName()] ?? [trim($__env->yieldContent('title', 'Swift Manpower Temps Agency Ltd')), 'Swift Manpower Temps Agency connects Canadian employers and job seekers with staffing and recruitment support from Calgary, Alberta.'];
    $canonical = url()->current();
    $socialImage = asset('assets/images/banner/banner-7.jpg');
    if (isset($job)) {
        $seoTitle = $job->title.' in '.$job->location.' | Swift Manpower';
        $seoDescription = \Illuminate\Support\Str::limit(strip_tags($job->summary ?: $job->description), 160);
        $canonical = route('job.details.show', $job);
        $socialImage = asset($job->image_path ?: 'assets/images/banner/banner-7.jpg');
    } elseif (isset($post)) {
        $seoTitle = $post->title.' | Swift Manpower';
        $seoDescription = \Illuminate\Support\Str::limit(\App\Support\RichText::plainText($post->excerpt ?: $post->content), 160);
        $canonical = route('blog.details.show', $post);
        $socialImage = asset($post->image_path ?: 'assets/images/banner/banner-7.jpg');
    }
    if (isset($posts) && $posts instanceof \Illuminate\Pagination\LengthAwarePaginator && $posts->currentPage() > 1) {
        $canonical = route('blog.grid', ['page' => $posts->currentPage()]);
        $seoTitle .= ' | Page '.$posts->currentPage();
    }
    $noindex = request()->routeIs('jobs.search', 'employee.sign-*', 'employee.dashboard', 'super-admin.*');
    $organization = [
        '@context' => 'https://schema.org', '@type' => 'EmploymentAgency',
        '@id' => route('home').'#organization', 'name' => 'Swift Manpower Temps Agency Ltd',
        'url' => route('home'), 'logo' => asset('assets/images/logo/swiftmta4.png'),
        'telephone' => '+1-587-899-2598', 'email' => 'monica@swiftmanpowertemps.com',
        'address' => ['@type' => 'PostalAddress', 'streetAddress' => '#201, 3501 29 St NE', 'addressLocality' => 'Calgary', 'addressRegion' => 'AB', 'addressCountry' => 'CA'],
    ];
    $jsonFlags = JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT;
@endphp
<title>{{ $seoTitle }}</title>
<meta name="description" content="{{ $seoDescription }}">
<meta name="robots" content="{{ $noindex ? 'noindex, follow' : 'index, follow, max-image-preview:large' }}">
<link rel="canonical" href="{{ $canonical }}">
<meta property="og:type" content="{{ isset($post) ? 'article' : 'website' }}">
<meta property="og:locale" content="en_CA">
<meta property="og:site_name" content="Swift Manpower Temps Agency Ltd">
<meta property="og:title" content="{{ $seoTitle }}">
<meta property="og:description" content="{{ $seoDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $socialImage }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seoTitle }}">
<meta name="twitter:description" content="{{ $seoDescription }}">
<meta name="twitter:image" content="{{ $socialImage }}">
<script type="application/ld+json">{!! json_encode($organization, $jsonFlags) !!}</script>
@if(isset($job) && $job->status === 'active')
    @php
        $employmentTypes = ['full time' => 'FULL_TIME', 'full-time' => 'FULL_TIME', 'part time' => 'PART_TIME', 'part-time' => 'PART_TIME', 'contract' => 'CONTRACTOR', 'temporary' => 'TEMPORARY'];
        $jobSchema = [
            '@context' => 'https://schema.org', '@type' => 'JobPosting', 'title' => $job->title,
            'description' => \App\Support\RichText::html($job->description).'<h2>Responsibilities</h2><ul>'.collect($job->responsibilities ?? [])->map(fn ($item) => '<li>'.e($item).'</li>')->implode('').'</ul><h2>Requirements</h2><ul>'.collect($job->requirements ?? [])->map(fn ($item) => '<li>'.e($item).'</li>')->implode('').'</ul>',
            'datePosted' => ($job->published_at ?? $job->created_at)->toIso8601String(),
            'hiringOrganization' => ['@type' => 'Organization', 'name' => $job->company_name],
            'jobLocation' => ['@type' => 'Place', 'name' => $job->location, 'address' => ['@type' => 'PostalAddress', 'addressLocality' => trim(explode(',', $job->location)[0]), 'addressCountry' => 'CA']],
            'url' => $canonical, 'identifier' => ['@type' => 'PropertyValue', 'name' => 'Swift Manpower Temps Agency Ltd', 'value' => (string) $job->id],
        ];
        if (isset($employmentTypes[strtolower($job->employment_type)])) {
            $jobSchema['employmentType'] = $employmentTypes[strtolower($job->employment_type)];
        }
    @endphp
    <script type="application/ld+json">{!! json_encode($jobSchema, $jsonFlags) !!}</script>
@endif
@if(isset($post))
    @php
        $articleSchema = [
            '@context' => 'https://schema.org', '@type' => 'BlogPosting',
            '@id' => $canonical.'#article', 'headline' => $post->title,
            'description' => $seoDescription, 'image' => $socialImage,
            'datePublished' => ($post->published_at ?? $post->created_at)->toIso8601String(),
            'dateModified' => ($post->updated_at ?? $post->published_at ?? $post->created_at)->toIso8601String(),
            'mainEntityOfPage' => $canonical, 'inLanguage' => 'en-CA',
            'author' => ['@type' => 'Organization', 'name' => 'Swift Manpower Temps Agency Ltd', 'url' => route('about.team')],
            'publisher' => ['@id' => route('home').'#organization'],
        ];
        $breadcrumbSchema = [
            '@context' => 'https://schema.org', '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.grid')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => $post->title, 'item' => $canonical],
            ],
        ];
    @endphp
    <meta property="article:published_time" content="{{ $articleSchema['datePublished'] }}">
    <meta property="article:modified_time" content="{{ $articleSchema['dateModified'] }}">
    <script type="application/ld+json">{!! json_encode($articleSchema, $jsonFlags) !!}</script>
    <script type="application/ld+json">{!! json_encode($breadcrumbSchema, $jsonFlags) !!}</script>
@endif
