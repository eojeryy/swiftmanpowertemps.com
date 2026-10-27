<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogSeoPublishingTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->actingAs(User::factory()->create(['role' => User::ROLE_BLOG_STAFF]));
        BlogCategory::create(['name' => 'Employer Resources', 'slug' => 'employer-resources', 'status' => 'active']);
    }

    private function postData(array $overrides = []): array
    {
        return array_merge([
            'title' => 'Why Canadian Employers Should Post Jobs Online in 2026: 7 Key Benefits',
            'slug' => 'why-canadian-employers-should-post-jobs-online-2026',
            'seo_title' => 'Post jobs online in Canada: 7 benefits for employers',
            'primary_keyword' => 'Post jobs online in Canada',
            'target_audience' => 'Canadian employers, recruiters, HR managers',
            'search_intent' => 'informational-commercial',
            'image_alt' => 'Canadian employers posting jobs online to recruit qualified candidates in 2026.',
            'meta_description' => 'Explore seven benefits of online job postings for Canadian employers.',
            'category' => 'Employer Resources',
            'excerpt' => 'Seven practical benefits for Canadian employers.',
            'content' => '<h2>Reach qualified candidates</h2><p>Explain the role clearly.</p>',
            'status' => 'published',
        ], $overrides);
    }

    public function test_staff_can_save_and_edit_seo_settings_without_changing_existing_urls(): void
    {
        $this->get(route('super-admin.blogs.create'))->assertOk()->assertSee('SEO &amp; audience', false)->assertSee('name="image_alt"', false);
        $data = $this->postData();
        $this->post(route('super-admin.blogs.store'), $data)->assertSessionHasNoErrors()->assertRedirect(route('super-admin.blogs.index'));
        $this->assertDatabaseHas('blog_posts', $data);
        $post = BlogPost::firstOrFail();
        $this->get(route('super-admin.blogs.edit', $post))->assertOk()->assertSee($data['slug']);

        $update = $this->postData(['title' => 'An updated employer guide', 'slug' => '', 'seo_title' => 'Updated SEO title']);
        $this->put(route('super-admin.blogs.update', $post), $update)->assertSessionHasNoErrors()->assertRedirect();
        $this->assertSame($data['slug'], $post->fresh()->slug);
        $this->assertSame('Updated SEO title', $post->fresh()->seo_title);
    }

    public function test_custom_slugs_must_be_valid_and_unique(): void
    {
        $this->post(route('super-admin.blogs.store'), $this->postData())->assertSessionHasNoErrors();
        $this->post(route('super-admin.blogs.store'), $this->postData())->assertSessionHasErrors('slug');
        $this->post(route('super-admin.blogs.store'), $this->postData(['slug' => 'Invalid / Slug']))->assertSessionHasErrors('slug');
        $this->assertDatabaseCount('blog_posts', 1);
    }

    public function test_blank_slug_is_generated_and_title_changes_preserve_it(): void
    {
        $data = $this->postData(['slug' => null]);
        $this->post(route('super-admin.blogs.store'), $data)->assertSessionHasNoErrors();
        $post = BlogPost::firstOrFail();
        $slug = $post->slug;
        unset($data['slug']);
        $data['title'] = 'A revised title';
        $this->put(route('super-admin.blogs.update', $post), $data)->assertSessionHasNoErrors();
        $this->assertSame($slug, $post->fresh()->slug);
    }
}
