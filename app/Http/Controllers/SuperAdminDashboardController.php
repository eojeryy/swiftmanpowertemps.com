<?php

namespace App\Http\Controllers;

use App\Models\EmployerJobRequest;
use App\Models\BlogPost;
use App\Models\User;
use App\Support\SuperAdminApplicantOverview;
use Illuminate\View\View;

class SuperAdminDashboardController extends Controller
{
    public function index(SuperAdminApplicantOverview $applicantOverview): View
    {
        if (auth()->user()->isBlogStaff()) {
            return view('super-admin.blog-staff-dashboard', [
                'publishedBlogCount' => BlogPost::where('status', 'published')->count(),
                'draftBlogCount' => BlogPost::where('status', 'draft')->count(),
                'recentPosts' => BlogPost::latest()->take(5)->get(),
            ]);
        }

        $superAdminCount = User::where('role', User::ROLE_SUPER_ADMIN)
            ->orWhere('is_super_admin', true)
            ->count();
        $totalUserCount = User::count();
        $latestSuperAdmins = User::where('role', User::ROLE_SUPER_ADMIN)
            ->orWhere('is_super_admin', true)
            ->latest()
            ->take(5)
            ->get();
        $pendingJobRequestCount = EmployerJobRequest::where('status', 'new')->count();
        $publishedJobCount = \App\Models\JobOpening::where('status', 'active')->count();
        $latestJobRequests = EmployerJobRequest::latest()
            ->take(5)
            ->get();
        $applicantData = $applicantOverview->build();

        return view('super-admin.dashboard', [
            'superAdminCount' => $superAdminCount,
            'totalUserCount' => $totalUserCount,
            'latestSuperAdmins' => $latestSuperAdmins,
            'pendingJobRequestCount' => $pendingJobRequestCount,
            'publishedJobCount' => $publishedJobCount,
            'latestJobRequests' => $latestJobRequests,
            ...$applicantData,
        ]);
    }
}
