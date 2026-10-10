<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\JobOpening;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $pages = collect([
            'home', 'about.company', 'about.team', 'why.choose.us', 'how.we.work',
            'recruitment.processes', 'staffing.solutions', 'contact', 'employee.overview',
            'employer.overview', 'faq', 'place.job', 'apply.now', 'job.openings', 'blog.grid',
        ])->map(fn ($name) => ['url' => route($name), 'modified' => null]);

        foreach (JobOpening::where('status', 'active')->get(['slug', 'updated_at']) as $job) {
            $pages->push(['url' => route('job.details.show', $job), 'modified' => $job->updated_at?->toAtomString()]);
        }

        foreach (BlogPost::where('status', 'published')->get(['slug', 'updated_at']) as $post) {
            $pages->push(['url' => route('blog.details.show', $post), 'modified' => $post->updated_at?->toAtomString()]);
        }

        return response()->view('seo.sitemap', ['pages' => $pages])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots(): Response
    {
        return response("User-agent: *\nAllow: /\nDisallow: /super-admin/\nDisallow: /employee/\nDisallow: /job-search\nSitemap: ".route('seo.sitemap')."\n")
            ->header('Content-Type', 'text/plain; charset=UTF-8');
    }
}
