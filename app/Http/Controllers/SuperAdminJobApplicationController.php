<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SuperAdminJobApplicationController extends Controller
{
    public function downloadResume(JobApplication $jobApplication): StreamedResponse
    {
        abort_unless(
            $jobApplication->upload_file && Storage::disk('public')->exists($jobApplication->upload_file),
            404
        );

        $extension = pathinfo($jobApplication->upload_file, PATHINFO_EXTENSION);
        $downloadName = trim($jobApplication->fname.' '.$jobApplication->lname).'-resume';

        if ($extension !== '') {
            $downloadName .= '.'.$extension;
        }

        return Storage::disk('public')->download($jobApplication->upload_file, $downloadName);
    }
}
