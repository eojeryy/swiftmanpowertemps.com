<?php

use App\Models\EmployerJobRequest;
use App\Models\BlogPost;
use App\Models\JobApplication;
use App\Http\Controllers\EmployeeAuthController;
use App\Http\Controllers\EmployeeDashboardController;
use App\Http\Controllers\PublicBlogController;
use App\Http\Controllers\PublicJobController;
use App\Http\Controllers\SuperAdminBlogController;
use App\Http\Controllers\SuperAdminBlogCategoryController;
use App\Http\Controllers\SuperAdminAuthController;
use App\Http\Controllers\SuperAdminApplicantController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\SuperAdminEmployerJobRequestController;
use App\Http\Controllers\SuperAdminJobOpeningController;
use App\Http\Controllers\SuperAdminJobApplicationController;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $featuredPosts = BlogPost::where('status', 'published')
        ->orderByDesc('published_at')
        ->orderByDesc('created_at')
        ->take(3)
        ->get();
    $partnerTestimonials = EmployerJobRequest::query()
        ->whereNotNull('message')
        ->where('message', '!=', '')
        ->where('status', 'approved')
        ->latest()
        ->take(24)
        ->get()
        ->unique(function (EmployerJobRequest $request): string {
            return strtolower(preg_replace('/\s+/', ' ', trim($request->company_name)));
        })
        ->take(6)
        ->values();

    return view('index', [
        'featuredPosts' => $featuredPosts,
        'partnerTestimonials' => $partnerTestimonials,
    ]);
})->name('home');

Route::get('/about-company', function () {
    return view('about-company');
})->name('about.company');

Route::get('/about-team', function () {
    return view('about-team');
})->name('about.team');

Route::get('/why-choose-us', function () {
    return view('why-choose-us');
})->name('why.choose.us');

Route::get('/how-we-work', function () {
    return view('how-we-work');
})->name('how.we.work');

Route::get('/recruitment-processes', function () {
    return view('recruitment-processes');
})->name('recruitment.processes');

Route::get('/staffing-solutions', function () {
    return view('staffing-solutions');
})->name('staffing.solutions');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/employee-overview', function () {
    return view('employee-overview');
})->name('employee.overview');

Route::get('/employer-overview', function () {
    return view('employer-overview');
})->name('employer.overview');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');

Route::get('/place-job', function () {
    return view('place-job');
})->name('place.job');

Route::post('/place-job', function (Request $request) {
    $validated = $request->validate([
        'company_name' => ['required', 'string', 'max:255'],
        'website' => ['nullable', 'string', 'max:255'],
        'industry' => ['required', 'string', 'max:100'],
        'company_phone' => ['required', 'string', 'max:50'],
        'company_address' => ['required', 'string', 'max:500'],
        'contact_first_name' => ['required', 'string', 'max:255'],
        'contact_last_name' => ['required', 'string', 'max:255'],
        'profile_link' => ['nullable', 'string', 'max:500'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'interest' => ['required', 'string', 'max:100'],
        'specialization' => ['required', 'string', 'max:120'],
        'job_location' => ['required', 'string', 'max:255'],
        'pay_rate' => ['nullable', 'string', 'max:255'],
        'position_hiring_for' => ['required', 'string', 'max:255'],
        'preferred_pronoun' => ['nullable', 'string', 'max:120'],
        'openings_count' => ['nullable', 'string', 'max:50'],
        'subject' => ['required', 'string', 'max:255'],
        'message' => ['nullable', 'string', 'max:5000'],
    ]);

    $contactName = trim($validated['contact_first_name'].' '.$validated['contact_last_name']);

    $requestStored = true;

    try {
        EmployerJobRequest::create([
            ...$validated,
            'username' => $contactName,
        ]);
    } catch (QueryException $exception) {
        $requestStored = false;

        Log::warning('Employer job request could not be saved.', [
            'error' => $exception->getMessage(),
            'email' => $validated['email'],
            'subject' => $validated['subject'],
        ]);
    }

    $body = implode("\n", [
        'New employer job request from Swift Manpower Temps Agency Ltd',
        '',
        'Company Name: '.$validated['company_name'],
        'Website: '.($validated['website'] ?: 'Not provided'),
        'Industry: '.$validated['industry'],
        'Company Phone: '.$validated['company_phone'],
        'Company Address: '.$validated['company_address'],
        'Contact First Name: '.$validated['contact_first_name'],
        'Contact Last Name: '.$validated['contact_last_name'],
        'Contact Person: '.$contactName,
        'Email: '.$validated['email'],
        'Contact Phone: '.$validated['phone'],
        'Profile Link: '.($validated['profile_link'] ?: 'Not provided'),
        'Service Needed: '.$validated['interest'],
        'Specialisation: '.$validated['specialization'],
        'Job Location: '.$validated['job_location'],
        'Pay Rate Range: '.($validated['pay_rate'] ?: 'Not provided'),
        'Position Hiring For: '.$validated['position_hiring_for'],
        'Preferred Pronoun: '.($validated['preferred_pronoun'] ?: 'Not provided'),
        'Number of Openings: '.($validated['openings_count'] ?: 'Not provided'),
        'Subject: '.$validated['subject'],
        'Job Details: '.($validated['message'] ?: 'No additional job details provided.'),
    ]);

    Mail::raw($body, function ($message) use ($validated) {
        $message
            ->to('swiftmanpowertemps@gmail.com')
            ->replyTo($validated['email'], trim($validated['contact_first_name'].' '.$validated['contact_last_name']))
            ->subject('Employer job request: '.$validated['subject']);
    });

    return redirect()
        ->route('place.job')
        ->with('status', $requestStored
            ? 'Thanks, your job request has been sent successfully.'
            : 'Thanks, your job request was sent, but we could not save a local copy right now.');
})->name('place.job.submit');

Route::get('/testimonials', function () {
    return view('testimonials');
})->name('testimonials');

Route::get('/job-openings', [PublicJobController::class, 'index'])->name('job.openings');
Route::get('/job-details', [PublicJobController::class, 'show'])->name('job.details');
Route::get('/job-details/{job}', [PublicJobController::class, 'show'])->name('job.details.show');
Route::get('/job-search', [PublicJobController::class, 'search'])->name('jobs.search');

Route::get('/blog-grid', [PublicBlogController::class, 'index'])->name('blog.grid');

Route::get('/blog-list', function () {
    return view('blog-list');
})->name('blog.list');

Route::get('/blog-details', [PublicBlogController::class, 'show'])->name('blog.details');
Route::get('/blog-details/{blog}', [PublicBlogController::class, 'show'])->name('blog.details.show');

Route::prefix('super-admin')->name('super-admin.')->group(function () {
    Route::get('/sign-up', [SuperAdminAuthController::class, 'showSignUp'])->name('sign-up');
    Route::post('/sign-up', [SuperAdminAuthController::class, 'signUp'])->name('register');
    Route::get('/sign-in', [SuperAdminAuthController::class, 'showSignIn'])->name('sign-in');
    Route::post('/sign-in', [SuperAdminAuthController::class, 'signIn'])->name('authenticate');

    Route::middleware('super.admin')->group(function () {
        Route::get('/dashboard', [SuperAdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/applicants', [SuperAdminApplicantController::class, 'index'])->name('applicants.index');
        Route::get('/job-openings', [SuperAdminJobOpeningController::class, 'index'])->name('job-openings.index');
        Route::get('/applications/{jobApplication}/resume', [SuperAdminJobApplicationController::class, 'downloadResume'])->name('applications.resume');
        Route::get('/job-requests', [SuperAdminEmployerJobRequestController::class, 'index'])->name('job-requests.index');
        Route::get('/job-requests/{employerJobRequest}', [SuperAdminEmployerJobRequestController::class, 'show'])->name('job-requests.show');
        Route::post('/job-requests/{employerJobRequest}/approve', [SuperAdminEmployerJobRequestController::class, 'approve'])->name('job-requests.approve');
        Route::resource('blogs', SuperAdminBlogController::class)->parameters([
            'blogs' => 'blog',
        ]);
        Route::resource('blog-categories', SuperAdminBlogCategoryController::class)->parameters([
            'blog-categories' => 'blogCategory',
        ]);
        Route::post('/logout', [SuperAdminAuthController::class, 'logout'])->name('logout');
    });
});

Route::prefix('employee')->name('employee.')->group(function () {
    Route::get('/sign-up', [EmployeeAuthController::class, 'showSignUp'])->name('sign-up');
    Route::post('/sign-up', [EmployeeAuthController::class, 'signUp'])->name('register');
    Route::get('/sign-in', [EmployeeAuthController::class, 'showSignIn'])->name('sign-in');
    Route::post('/sign-in', [EmployeeAuthController::class, 'signIn'])->name('authenticate');

    Route::middleware('employee')->group(function () {
        Route::get('/dashboard', [EmployeeDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [EmployeeAuthController::class, 'logout'])->name('logout');
    });
});

Route::get('/apply-now', function () {
    return view('apply-now');
})->name('apply.now');

Route::post('/apply-now', function (Request $request) {
    $validated = $request->validate([
        'fname' => ['required', 'string', 'max:255'],
        'lname' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'address' => ['required', 'string', 'max:500'],
        'education' => ['required', 'string', 'max:255'],
        'skills' => ['required', 'string', 'max:255'],
        'experience' => ['required', 'string', 'max:255'],
        'qualities' => ['required', 'string', 'max:255'],
        'upload_file' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:1024'],
        'job_number' => ['required', 'string', 'max:100'],
        'work_status' => ['required', 'string', 'max:255'],
        'message' => ['nullable', 'string', 'max:5000'],
    ]);

    $resumeFile = $request->file('upload_file');
    $resumePath = $resumeFile->store('job-applications/resumes', 'public');
    $applicationStored = true;

    try {
        JobApplication::create([
            ...$validated,
            'upload_file' => $resumePath,
            'user_id' => auth()->check() && ! auth()->user()->is_super_admin ? auth()->id() : null,
        ]);
    } catch (QueryException $exception) {
        $applicationStored = false;

        Log::warning('Job application could not be saved.', [
            'error' => $exception->getMessage(),
            'email' => $validated['email'],
            'job_number' => $validated['job_number'],
            'resume_path' => $resumePath,
        ]);
    }

    $body = implode("\n", [
        'New job seeker application from Swift Manpower Temps Agency Ltd',
        '',
        'First Name: '.$validated['fname'],
        'Last Name: '.$validated['lname'],
        'Email: '.$validated['email'],
        'Phone: '.$validated['phone'],
        'Address: '.$validated['address'],
        'Education: '.$validated['education'],
        'Skills: '.$validated['skills'],
        'Total Experience: '.$validated['experience'],
        'Personal Qualities: '.$validated['qualities'],
        'Resume File: '.$resumeFile->getClientOriginalName(),
        'Resume Storage Path: '.$resumePath,
        'Job Number: '.$validated['job_number'],
        'Desired Work Status: '.$validated['work_status'],
        'Additional Information: '.($validated['message'] ?: 'No additional information provided.'),
    ]);

    Mail::raw($body, function ($message) use ($validated, $resumeFile, $resumePath) {
        $message
            ->to('swiftmanpowertemps@gmail.com')
            ->replyTo($validated['email'], $validated['fname'].' '.$validated['lname'])
            ->subject('Job application: '.$validated['job_number']);

        $storedResume = storage_path('app/public/'.$resumePath);

        if (is_file($storedResume)) {
            $message->attach($storedResume, [
                'as' => $resumeFile->getClientOriginalName(),
            ]);
        }
    });

    return redirect()
        ->route('apply.now')
        ->with('status', $applicationStored
            ? 'Thanks, your application has been sent successfully.'
            : 'Thanks, your application was sent, but we could not save a local copy right now.');
})->name('apply.submit');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255'],
        'phone' => ['required', 'string', 'max:50'],
        'interest' => ['required', 'string', 'max:100'],
        'subject' => ['required', 'string', 'max:255'],
        'message' => ['nullable', 'string', 'max:5000'],
    ]);

    $body = implode("\n", [
        'New contact form submission from Swift Manpower Temps Agency Ltd',
        '',
        'Name: '.$validated['username'],
        'Email: '.$validated['email'],
        'Phone: '.$validated['phone'],
        'Interest: '.$validated['interest'],
        'Subject: '.$validated['subject'],
        'Message: '.($validated['message'] ?: 'No message provided.'),
    ]);

    Mail::raw($body, function ($message) use ($validated) {
        $message
            ->to('swiftmanpowertemps@gmail.com')
            ->replyTo($validated['email'], $validated['username'])
            ->subject('Website contact: '.$validated['subject']);
    });

    return redirect()
        ->route('contact')
        ->with('status', 'Thanks, your message has been sent successfully.');
})->name('contact.submit');
