<?php

namespace App\Http\Controllers;

use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PublicJobController extends Controller
{
    public function index(): View
    {
        $jobs = JobOpening::where('status', 'active')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('job-openings', [
            'jobs' => $jobs,
        ]);
    }

    public function show(?JobOpening $job = null): View
    {
        $job ??= JobOpening::where('status', 'active')
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->first();

        abort_unless($job, 404);

        $relatedJobs = JobOpening::where('status', 'active')
            ->where('id', '!=', $job->id)
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        return view('job-details', [
            'job' => $job,
            'relatedJobs' => $relatedJobs,
        ]);
    }

    public function search(Request $request): View
    {
        $validated = $request->validate([
            'q' => ['required', 'string', 'max:255'],
        ]);

        $term = trim($validated['q']);

        $jobs = JobOpening::where('status', 'active')
            ->where(function ($query) use ($term) {
                $query
                    ->where('title', 'like', '%'.$term.'%')
                    ->orWhere('category', 'like', '%'.$term.'%')
                    ->orWhere('company_name', 'like', '%'.$term.'%');
            })
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('job-search-results', [
            'searchTerm' => $term,
            'jobs' => $jobs,
            'matchingCategories' => $jobs->pluck('category')->filter()->unique()->values(),
            'matchingCompanies' => $jobs->pluck('company_name')->filter()->unique()->values(),
        ]);
    }
}
