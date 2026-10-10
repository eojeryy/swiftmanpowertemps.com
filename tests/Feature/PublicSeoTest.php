<?php

namespace Tests\Feature;

use App\Models\JobOpening;
use Tests\TestCase;

class PublicSeoTest extends TestCase
{
    public function test_employer_and_candidate_pages_have_distinct_indexable_metadata(): void
    {
        foreach ([
            '/employer-overview' => 'Hire Staff in Canada',
            '/employee-overview' => 'Find Work in Canada',
        ] as $path => $title) {
            $this->get($path)->assertOk()->assertSee($title)
                ->assertSee('index, follow, max-image-preview:large')
                ->assertSee('rel="canonical"', false)
                ->assertSee('EmploymentAgency')->assertSee('lang="en-CA"', false);
        }
    }

    public function test_public_static_pages_render_successfully(): void
    {
        foreach (['/about-company', '/about-team', '/why-choose-us', '/how-we-work', '/recruitment-processes', '/staffing-solutions', '/contact', '/faq', '/place-job', '/apply-now'] as $path) {
            $this->get($path)->assertOk()->assertSee('name="description"', false)
                ->assertSee('id="main-content"', false);
        }
    }

    public function test_home_has_one_heading_and_working_audience_links_without_database_queries(): void
    {
        $html = view('index', ['featuredPosts' => collect()])->render();
        $this->assertSame(1, substr_count($html, '<h1>'));
        $this->assertStringContainsString(route('place.job'), $html);
        $this->assertStringContainsString(route('job.openings'), $html);
        $this->assertStringContainsString('name="location"', $html);
        $this->assertStringNotContainsString('loader-wrap', $html);
        $this->assertStringNotContainsString('maps.googleapis.com', $html);
    }

    public function test_job_schema_is_valid_json_and_does_not_allow_script_injection(): void
    {
        $job = new JobOpening([
            'title' => 'Warehouse </script><script>alert(1)</script>',
            'slug' => 'warehouse-test', 'category' => 'Warehouse', 'company_name' => 'Test Company',
            'location' => 'Calgary, AB', 'employment_type' => 'Full Time', 'summary' => 'Warehouse work.',
            'description' => 'Work safely.', 'status' => 'active',
            'published_at' => now(), 'responsibilities' => ['Pick orders'], 'requirements' => ['Reliability'],
        ]);
        $job->id = 123;
        $job->created_at = now();
        $html = view('job-details', ['job' => $job, 'relatedJobs' => collect()])->render();
        preg_match_all('/<script type="application\/ld\+json">(.*?)<\/script>/s', $html, $matches);
        $schemas = array_map(fn ($json) => json_decode($json, true, 512, JSON_THROW_ON_ERROR), $matches[1]);
        $schema = collect($schemas)->firstWhere('@type', 'JobPosting');
        $this->assertSame($job->title, $schema['title']);
        $this->assertSame('FULL_TIME', $schema['employmentType']);
        $this->assertSame('CA', $schema['jobLocation']['address']['addressCountry']);
        $this->assertSame(route('job.details.show', $job), $schema['url']);
        $this->assertStringNotContainsString('</script><script>alert(1)', $html);
        $this->assertStringContainsString('job_number=123', $html);
    }

    public function test_application_preserves_the_selected_job_reference(): void
    {
        $this->get('/apply-now?job_number=123')->assertOk()->assertSee('value="123"', false);
    }

    public function test_account_pages_are_excluded_from_search_results(): void
    {
        foreach (['/employee/sign-in', '/employee/sign-up', '/super-admin/sign-in'] as $path) {
            $this->get($path)->assertOk()->assertSee('noindex, nofollow');
        }
        $html = view('super-admin.auth.sign-up', ['remainingSlots' => 2])->render();
        $this->assertStringContainsString('noindex, nofollow', $html);
    }

    public function test_sitemap_template_produces_valid_xml_with_escaped_urls(): void
    {
        $html = view('seo.sitemap', ['pages' => collect([
            ['url' => 'https://example.com/jobs?x=1&y=2', 'modified' => '2026-10-10T12:00:00+00:00'],
        ])])->render();
        $xml = simplexml_load_string($html);
        $this->assertNotFalse($xml);
        $this->assertSame('https://example.com/jobs?x=1&y=2', (string) $xml->url->loc);
    }

    public function test_robots_exposes_an_absolute_sitemap_url(): void
    {
        $this->get('/robots.txt')->assertOk()->assertHeader('Content-Type', 'text/plain; charset=UTF-8')
            ->assertSee('Sitemap: '.route('seo.sitemap'), false)->assertSee('Disallow: /super-admin/', false);
    }
}
