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

        abort_unless($job && $job->status === 'active', 404);

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
            'q' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'work_status' => ['nullable', 'string', 'in:Full Time,Part Time,Contract,Temporary'],
        ]);

        $term = trim($validated['q'] ?? '');
        $location = trim($validated['location'] ?? '');
        $workType = $validated['work_status'] ?? '';

        $jobs = JobOpening::where('status', 'active')
            ->when($term !== '', function ($query) use ($term) {
                $query->where(function ($query) use ($term) {
                    $query->where('title', 'like', '%'.$term.'%')
                        ->orWhere('category', 'like', '%'.$term.'%')
                        ->orWhere('company_name', 'like', '%'.$term.'%')
                        ->orWhere('summary', 'like', '%'.$term.'%');
                });
            })
            ->when($location !== '', fn ($query) => $query->where('location', 'like', '%'.$location.'%'))
            ->when($workType !== '', fn ($query) => $query->whereRaw("LOWER(REPLACE(employment_type, '-', ' ')) LIKE ?", ['%'.strtolower($workType).'%']))
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();

        return view('job-search-results', [
            'searchTerm' => implode(' · ', array_filter([$term, $location, $workType])) ?: 'All current openings',
            'jobs' => $jobs,
            'matchingCategories' => $jobs->pluck('category')->filter()->unique()->values(),
            'matchingCompanies' => $jobs->pluck('company_name')->filter()->unique()->values(),
        ]);
    }
}
