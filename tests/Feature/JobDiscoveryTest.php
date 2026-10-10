<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use App\Models\JobOpening;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobDiscoveryTest extends TestCase
{
    use RefreshDatabase;

    private function job(array $attributes = []): JobOpening
    {
        return JobOpening::create(array_merge([
            'title' => 'Test Picker', 'slug' => 'test-picker', 'category' => 'Warehouse',
            'company_name' => 'Test Employer', 'location' => 'Toronto, ON', 'employment_type' => 'Full Time',
            'summary' => 'Picking and packing.', 'description' => 'Pick orders safely.',
            'status' => 'active', 'published_at' => now(),
        ], $attributes));
    }

    public function test_search_applies_location_and_work_type_without_requiring_a_keyword(): void
    {
        $job = $this->job();
        $this->job(['slug' => 'other-city', 'title' => 'Wrong City', 'location' => 'Vancouver, BC']);
        $this->job(['slug' => 'other-type', 'title' => 'Wrong Type', 'employment_type' => 'Part Time']);
        $this->job(['slug' => 'closed-picker', 'title' => 'Closed Role', 'status' => 'inactive']);
        $this->get('/job-search?location=Toronto&work_status=Full%20Time')->assertOk()
            ->assertSee($job->title)->assertDontSee('Wrong City')->assertDontSee('Wrong Type')
            ->assertDontSee('Closed Role')->assertSee('noindex, follow');
    }

    public function test_inactive_jobs_and_unpublished_articles_are_not_public(): void
    {
        $job = $this->job(['status' => 'inactive']);
        $this->get(route('job.details.show', $job))->assertNotFound();
        $post = BlogPost::create(['title' => 'Draft', 'slug' => 'draft', 'category' => 'Hiring', 'excerpt' => 'Draft', 'content' => 'Draft content', 'status' => 'draft']);
        $this->get(route('blog.details.show', $post))->assertNotFound();
    }

    public function test_sitemap_contains_only_public_content_and_is_valid_xml(): void
    {
        $active = $this->job();
        $closed = $this->job(['slug' => 'closed-job', 'status' => 'inactive']);
        $post = BlogPost::create(['title' => 'Hiring tips', 'slug' => 'hiring-tips', 'category' => 'Hiring', 'excerpt' => 'Tips', 'content' => 'Tips for hiring.', 'status' => 'published', 'published_at' => now()]);
        $response = $this->get('/sitemap.xml')->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8')
            ->assertSee(route('job.details.show', $active), false)
            ->assertSee(route('blog.details.show', $post), false)
            ->assertDontSee(route('job.details.show', $closed), false)
            ->assertDontSee('/super-admin/')->assertDontSee('/employee/sign-in');
        $this->assertNotFalse(simplexml_load_string($response->getContent()));
    }
}
