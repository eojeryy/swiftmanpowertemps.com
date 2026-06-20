<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Support\SuperAdminApplicantOverview;
use Illuminate\View\View;

class SuperAdminApplicantController extends Controller
{
    public function index(Request $request, SuperAdminApplicantOverview $applicantOverview): View
    {
        $data = $applicantOverview->build();
        $requestedJobId = $request->integer('job');
        $selectedJobEntry = null;

        if ($requestedJobId > 0) {
            $selectedJobEntry = collect($data['jobsWithApplicants'])
                ->first(fn (array $jobEntry): bool => (int) $jobEntry['job']->id === $requestedJobId);

            $data['jobsWithApplicants'] = $selectedJobEntry
                ? collect([$selectedJobEntry])
                : collect();
        }

        return view('super-admin.applicants.index', [
            ...$data,
            'selectedJobEntry' => $selectedJobEntry,
            'requestedJobId' => $requestedJobId > 0 ? $requestedJobId : null,
            'isFilteredToJob' => $selectedJobEntry !== null,
        ]);
    }
}
