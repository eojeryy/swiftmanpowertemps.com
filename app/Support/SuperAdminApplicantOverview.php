<?php

namespace App\Support;

use App\Models\JobApplication;
use App\Models\JobOpening;

class SuperAdminApplicantOverview
{
    public function build(): array
    {
        $jobOpenings = JobOpening::orderByRaw("case when status = 'active' then 0 else 1 end")
            ->orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->get();
        $jobApplications = JobApplication::latest()->get();

        $jobsWithApplicants = $jobOpenings
            ->map(function (JobOpening $job) use ($jobApplications): array {
                $applicants = $jobApplications
                    ->filter(fn (JobApplication $application) => $this->applicationMatchesJob($application, $job))
                    ->values();

                return [
                    'job' => $job,
                    'job_id_label' => str_pad((string) $job->id, 4, '0', STR_PAD_LEFT),
                    'applicants' => $applicants,
                    'applicant_count' => $applicants->count(),
                ];
            })
            ->filter(fn (array $jobEntry): bool => $jobEntry['applicant_count'] > 0)
            ->values();

        $matchedApplicationIds = $jobsWithApplicants
            ->flatMap(fn (array $jobEntry) => $jobEntry['applicants']->pluck('id'))
            ->unique()
            ->values();

        $unmatchedApplications = $jobApplications
            ->reject(fn (JobApplication $application): bool => $matchedApplicationIds->contains($application->id))
            ->map(function (JobApplication $application) use ($jobOpenings): JobApplication {
                $application->setAttribute(
                    'applied_job_label',
                    $this->buildAppliedJobLabel($application, $jobOpenings)
                );

                return $application;
            })
            ->values();

        return [
            'totalJobApplicationCount' => $jobApplications->count(),
            'jobsWithApplicants' => $jobsWithApplicants,
            'jobsWithApplicantCount' => $jobsWithApplicants->count(),
            'recentJobApplications' => $jobApplications->take(6),
            'unmatchedApplications' => $unmatchedApplications,
        ];
    }

    private function applicationMatchesJob(JobApplication $application, JobOpening $job): bool
    {
        $applicationToken = $this->normalizeJobReference($application->job_number);

        if ($applicationToken === '') {
            return false;
        }

        if (in_array($applicationToken, $this->jobReferenceTokens($job), true)) {
            return true;
        }

        $applicationDigits = ltrim(preg_replace('/\D+/', '', $application->job_number), '0');
        $jobDigits = ltrim((string) $job->id, '0');

        return $applicationDigits !== '' && $applicationDigits === ($jobDigits === '' ? '0' : $jobDigits);
    }

    private function jobReferenceTokens(JobOpening $job): array
    {
        $jobId = (string) $job->id;
        $paddedJobId = str_pad($jobId, 4, '0', STR_PAD_LEFT);

        return array_values(array_unique([
            $this->normalizeJobReference($jobId),
            $this->normalizeJobReference($paddedJobId),
            $this->normalizeJobReference('Job '.$jobId),
            $this->normalizeJobReference('Job '.$paddedJobId),
            $this->normalizeJobReference('Job ID '.$jobId),
            $this->normalizeJobReference('Job ID '.$paddedJobId),
        ]));
    }

    private function normalizeJobReference(?string $value): string
    {
        return strtoupper((string) preg_replace('/[^A-Za-z0-9]+/', '', trim((string) $value)));
    }

    private function buildAppliedJobLabel(JobApplication $application, $jobOpenings): string
    {
        $relatedJob = $jobOpenings->first(
            fn (JobOpening $job): bool => $this->applicationMatchesJobByDigits($application, $job)
        );

        if (! $relatedJob) {
            return 'Not matched to any backend job yet';
        }

        return $relatedJob->title.' (Job ID '.str_pad((string) $relatedJob->id, 4, '0', STR_PAD_LEFT).')';
    }

    private function applicationMatchesJobByDigits(JobApplication $application, JobOpening $job): bool
    {
        $applicationDigits = ltrim(preg_replace('/\D+/', '', $application->job_number), '0');
        $jobDigits = ltrim((string) $job->id, '0');

        return $applicationDigits !== '' && $applicationDigits === ($jobDigits === '' ? '0' : $jobDigits);
    }
}
