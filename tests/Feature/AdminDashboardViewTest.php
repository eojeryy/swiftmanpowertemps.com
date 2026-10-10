<?php

namespace Tests\Feature;

use App\Models\EmployerJobRequest;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\User;
use Tests\TestCase;

class AdminDashboardViewTest extends TestCase
{
    private function dashboardData(): array
    {
        return [
            'errors' => new \Illuminate\Support\ViewErrorBag(),
            'superAdminCount' => 1, 'totalUserCount' => 6,
            'pendingJobRequestCount' => 0, 'publishedJobCount' => 0,
            'totalJobApplicationCount' => 0, 'jobsWithApplicantCount' => 0,
            'latestSuperAdmins' => collect(), 'latestJobRequests' => collect(),
            'jobsWithApplicants' => collect(), 'unmatchedApplications' => collect(),
            'recentJobApplications' => collect(),
        ];
    }

    public function test_empty_dashboard_renders_with_review_links_and_no_duplicate_job_sections(): void
    {
        $this->actingAs(new User(['name' => 'Test Admin', 'email' => 'admin@example.com', 'role' => User::ROLE_SUPER_ADMIN]));
        $html = view('super-admin.dashboard', $this->dashboardData())->render();
        $this->assertStringContainsString('Good to see you, Test.', $html);
        $this->assertStringContainsString('No employer requests yet', $html);
        $this->assertStringContainsString('No job-based applicant groups yet', $html);
        $this->assertStringContainsString(route('super-admin.job-openings.index'), $html);
        $this->assertStringContainsString('aria-label="Open navigation"', $html);
        $this->assertStringContainsString('noindex, nofollow', $html);
        $this->assertStringNotContainsString('Jobs With Applicants', $html);
    }

    public function test_populated_dashboard_keeps_candidate_and_request_actions_in_collapsible_sections(): void
    {
        $job = new JobOpening(['title' => 'Warehouse Associate', 'slug' => 'warehouse-associate', 'location' => 'Calgary', 'employment_type' => 'Full Time', 'category' => 'Warehouse', 'status' => 'active']);
        $job->id = 7;
        $applicant = new JobApplication(['fname' => 'Test', 'lname' => 'Candidate', 'email' => 'candidate@example.com', 'phone' => '+1 (403) 555-0100', 'job_number' => '0007', 'work_status' => 'Full Time']);
        $applicant->id = 9;
        $unmatched = clone $applicant;
        $unmatched->job_number = 'unknown';
        $unmatched->applied_job_label = 'Unmatched';
        $request = new EmployerJobRequest(['company_name' => 'Example Company', 'position_hiring_for' => 'Warehouse Associate', 'job_location' => 'Calgary', 'status' => 'approved']);
        $request->id = 2;
        $html = view('super-admin.dashboard', array_replace($this->dashboardData(), [
            'jobsWithApplicants' => collect([['job' => $job, 'job_id_label' => '0007', 'applicant_count' => 1, 'applicants' => collect([$applicant])]]),
            'jobsWithApplicantCount' => 1, 'totalJobApplicationCount' => 2,
            'unmatchedApplications' => collect([$unmatched]), 'recentJobApplications' => collect([$applicant]),
            'latestJobRequests' => collect([$request]),
        ]))->render();
        $this->assertSame(1, substr_count($html, 'id="job-applicants-7"'));
        $this->assertStringContainsString('<details class="unmatched-box">', $html);
        foreach ([route('super-admin.applications.resume', $applicant), route('super-admin.job-requests.show', $request), route('job.details.show', $job), 'mailto:candidate@example.com?subject=Interview%20Invitation', 'tel:+14035550100'] as $link) {
            $this->assertStringContainsString($link, $html);
        }
        $this->assertStringContainsString('Status: Approved', $html);
    }
}
