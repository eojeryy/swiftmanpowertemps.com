<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogStaffAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_super_admin_can_create_blog_staff_account(): void
    {
        $superAdmin = User::factory()->create([
            'is_super_admin' => true,
            'role' => User::ROLE_SUPER_ADMIN,
        ]);

        $response = $this->actingAs($superAdmin)->post(route('super-admin.staff-accounts.store'), [
            'name' => 'Blog Staff User',
            'email' => 'blogstaff@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ]);

        $response->assertRedirect(route('super-admin.staff-accounts.index'));

        $this->assertDatabaseHas('users', [
            'email' => 'blogstaff@example.com',
            'role' => User::ROLE_BLOG_STAFF,
            'is_super_admin' => false,
        ]);
    }

    public function test_blog_staff_can_sign_in_and_open_blog_dashboard(): void
    {
        $blogStaff = User::factory()->create([
            'email' => 'writer@example.com',
            'password' => 'secret123',
            'role' => User::ROLE_BLOG_STAFF,
        ]);

        $response = $this->post(route('super-admin.authenticate'), [
            'email' => 'writer@example.com',
            'password' => 'secret123',
        ]);

        $response->assertRedirect(route('super-admin.dashboard'));
        $this->assertAuthenticatedAs($blogStaff);

        $dashboardResponse = $this->get(route('super-admin.dashboard'));

        $dashboardResponse->assertOk();
        $dashboardResponse->assertSee('Blog Dashboard');
        $dashboardResponse->assertSee('Create Blog Post');
        $dashboardResponse->assertDontSee('Applicants');
    }

    public function test_blog_staff_can_manage_blog_posts_but_not_categories(): void
    {
        $blogStaff = User::factory()->create([
            'role' => User::ROLE_BLOG_STAFF,
        ]);

        BlogCategory::create([
            'name' => 'News',
            'slug' => 'news',
            'description' => 'News category',
            'status' => 'active',
        ]);

        $createPage = $this->actingAs($blogStaff)->get(route('super-admin.blogs.create'));
        $createPage->assertOk();

        $storeResponse = $this->actingAs($blogStaff)->post(route('super-admin.blogs.store'), [
            'title' => 'Fresh Update',
            'category' => 'News',
            'excerpt' => 'Short excerpt for the blog post.',
            'content' => 'Full blog content for the staff account.',
            'status' => 'published',
        ]);

        $storeResponse->assertRedirect(route('super-admin.blogs.index'));
        $this->assertDatabaseHas('blog_posts', [
            'title' => 'Fresh Update',
            'status' => 'published',
        ]);

        $categoryResponse = $this->actingAs($blogStaff)->get(route('super-admin.blog-categories.index'));
        $categoryResponse->assertRedirect(route('super-admin.sign-in'));
    }
}
