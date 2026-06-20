<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\View\View;

class SuperAdminJobOpeningController extends Controller
{
    public function index(): View
    {
        $jobOpenings = JobOpening::orderByRaw("case when status = 'active' then 0 else 1 end")
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('super-admin.job-openings.index', [
            'jobOpenings' => $jobOpenings,
            'totalJobCount' => $jobOpenings->count(),
            'activeJobCount' => $jobOpenings->where('status', 'active')->count(),
            'recentlyPublishedCount' => $jobOpenings
                ->filter(fn (JobOpening $job) => $job->published_at && $job->published_at->gte(now()->subDays(7)))
                ->count(),
        ]);
    }
}
