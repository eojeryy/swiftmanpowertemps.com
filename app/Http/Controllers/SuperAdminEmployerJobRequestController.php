<?php

namespace App\Http\Controllers;

use App\Models\EmployerJobRequest;
use App\Models\JobOpening;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SuperAdminEmployerJobRequestController extends Controller
{
    public function index(): View
    {
        return view('super-admin.employer-job-requests.index', [
            'requests' => EmployerJobRequest::latest()->get(),
            'pendingCount' => EmployerJobRequest::where('status', 'new')->count(),
            'approvedCount' => EmployerJobRequest::where('status', 'approved')->count(),
        ]);
    }

    public function show(EmployerJobRequest $employerJobRequest): View
    {
        $publishedJob = $employerJobRequest->job_opening_id
            ? JobOpening::find($employerJobRequest->job_opening_id)
            : null;

        return view('super-admin.employer-job-requests.show', [
            'jobRequest' => $employerJobRequest,
            'publishedJob' => $publishedJob,
        ]);
    }

    public function approve(EmployerJobRequest $employerJobRequest): RedirectResponse
    {
        if ($employerJobRequest->status === 'approved' && $employerJobRequest->job_opening_id) {
            return redirect()
                ->route('super-admin.job-requests.show', $employerJobRequest)
                ->with('status', 'This job request has already been approved and published.');
        }

        $jobOpening = DB::transaction(function () use ($employerJobRequest) {
            $jobOpening = JobOpening::create([
                'title' => $employerJobRequest->position_hiring_for,
                'slug' => $this->generateUniqueSlug($employerJobRequest->position_hiring_for),
                'category' => $employerJobRequest->specialization,
                'company_name' => $employerJobRequest->company_name,
                'location' => $employerJobRequest->job_location,
                'employment_type' => 'Employer Request',
                'schedule' => $this->buildScheduleLine($employerJobRequest),
                'summary' => $this->buildSummary($employerJobRequest),
                'description' => $this->buildDescription($employerJobRequest),
                'image_path' => 'assets/images/news/news-1.jpg',
                'tags' => array_values(array_filter([
                    $employerJobRequest->industry,
                    $employerJobRequest->specialization,
                    $employerJobRequest->interest,
                ])),
                'responsibilities' => $this->buildResponsibilities($employerJobRequest),
                'requirements' => $this->buildRequirements($employerJobRequest),
                'status' => 'active',
                'published_at' => now(),
            ]);

            $employerJobRequest->update([
                'status' => 'approved',
                'job_opening_id' => $jobOpening->id,
                'approved_at' => now(),
            ]);

            return $jobOpening;
        });

        return redirect()
            ->route('super-admin.job-requests.show', $employerJobRequest)
            ->with('status', '"'.$employerJobRequest->position_hiring_for.'" was approved and published to the public job openings page.')
            ->with('published_job_id', $jobOpening->id);
    }

    protected function buildScheduleLine(EmployerJobRequest $jobRequest): ?string
    {
        $parts = array_filter([
            $jobRequest->openings_count ? 'Openings: '.$jobRequest->openings_count : null,
            $jobRequest->pay_rate ? 'Pay: '.$jobRequest->pay_rate : null,
        ]);

        return $parts ? implode(' | ', $parts) : null;
    }

    protected function buildSummary(EmployerJobRequest $jobRequest): string
    {
        if ($jobRequest->message) {
            return Str::limit(strip_tags($jobRequest->message), 220, '...');
        }

        return $jobRequest->company_name.' is hiring for '.$jobRequest->position_hiring_for.' in '.$jobRequest->job_location.'.';
    }

    protected function buildDescription(EmployerJobRequest $jobRequest): string
    {
        $lines = array_filter([
            $jobRequest->message,
            'Company: '.$jobRequest->company_name,
            'Industry: '.$jobRequest->industry,
            'Location: '.$jobRequest->job_location,
            $jobRequest->pay_rate ? 'Pay range: '.$jobRequest->pay_rate : null,
            $jobRequest->openings_count ? 'Number of openings: '.$jobRequest->openings_count : null,
            $jobRequest->website ? 'Company website: '.$jobRequest->website : null,
        ]);

        return implode("\n\n", $lines);
    }

    protected function buildResponsibilities(EmployerJobRequest $jobRequest): array
    {
        return array_values(array_filter([
            'Support '.$jobRequest->company_name.' as a '.$jobRequest->position_hiring_for.' in '.$jobRequest->job_location.'.',
            'Work within the '.$jobRequest->specialization.' area and help meet day-to-day business needs.',
            $jobRequest->message ? Str::limit(strip_tags($jobRequest->message), 180, '...') : null,
        ]));
    }

    protected function buildRequirements(EmployerJobRequest $jobRequest): array
    {
        return array_values(array_filter([
            'Candidates should be comfortable with '.$jobRequest->specialization.' work requirements.',
            $jobRequest->preferred_pronoun ? 'Preferred candidate focus: '.$jobRequest->preferred_pronoun.'.' : null,
            $jobRequest->pay_rate ? 'Role discussed with compensation guidance of '.$jobRequest->pay_rate.'.' : null,
            'Applicants should be ready to work in '.$jobRequest->job_location.'.',
        ]));
    }

    protected function generateUniqueSlug(string $title): string
    {
        $baseSlug = Str::slug($title);
        $slug = $baseSlug;
        $counter = 2;

        while (JobOpening::where('slug', $slug)->exists()) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
