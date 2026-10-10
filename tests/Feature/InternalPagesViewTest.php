<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\EmployerJobRequest;
use App\Models\JobApplication;
use App\Models\JobOpening;
use App\Models\User;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class InternalPagesViewTest extends TestCase
{
    private function renderPage(string $view, array $data = []): string
    {
        return view($view, ['errors' => new ViewErrorBag(), ...$data])->render();
    }

    private function records(): array
    {
        $category = new BlogCategory(['name' => 'Hiring Advice', 'slug' => 'hiring-advice', 'description' => 'Guidance for hiring.', 'status' => 'active']);
        $post = new BlogPost(['title' => 'Hiring in Canada', 'slug' => 'hiring-in-canada', 'category' => 'Hiring Advice', 'excerpt' => '<p>Useful <strong>advice</strong>.</p>', 'content' => '<h2>Plan ahead</h2><p>Hire well.</p>', 'status' => 'draft']);
        $staff = new User(['name' => 'Test Writer', 'email' => 'writer@example.com', 'role' => User::ROLE_BLOG_STAFF]);
        $job = new JobOpening(['title' => 'Warehouse Associate', 'slug' => 'warehouse-associate', 'location' => 'Calgary', 'category' => 'Warehouse', 'company_name' => 'Example Company', 'employment_type' => 'Full Time', 'status' => 'active']);
        $request = new EmployerJobRequest(['company_name' => 'Example Company', 'position_hiring_for' => 'Warehouse Associate', 'job_location' => 'Calgary', 'specialization' => 'Warehouse', 'industry' => 'Logistics', 'email' => 'employer@example.com', 'status' => 'new', 'message' => '<p>Help with <strong>staffing</strong>.</p>']);
        foreach ([$category, $post, $staff, $job, $request] as $record) {
            $record->id = 7;
            $record->exists = true;
            $record->created_at = now();
        }
        return compact('category', 'post', 'staff', 'job', 'request');
    }

    public function test_internal_lists_render_empty_and_populated_with_search_and_existing_actions(): void
    {
        $this->actingAs(new User(['name' => 'Admin', 'role' => User::ROLE_SUPER_ADMIN]));
        ['category' => $category, 'post' => $post, 'staff' => $staff, 'job' => $job, 'request' => $request] = $this->records();
        $pages = [
            ['super-admin.blogs.index', 'posts', $post, [], 'blog-records', route('super-admin.blogs.edit', $post)],
            ['super-admin.blog-categories.index', 'categories', $category, [], 'category-records', route('super-admin.blog-categories.edit', $category)],
            ['super-admin.staff-accounts.index', 'staffAccounts', $staff, [], 'staff-records', route('super-admin.staff-accounts.edit', $staff)],
            ['super-admin.employer-job-requests.index', 'requests', $request, ['pendingCount' => 1, 'approvedCount' => 0], 'request-records', route('super-admin.job-requests.approve', $request)],
            ['super-admin.job-openings.index', 'jobOpenings', $job, ['totalJobCount' => 1, 'activeJobCount' => 1, 'recentlyPublishedCount' => 0], 'job-records', route('super-admin.applicants.index', ['job' => 7])],
        ];
        foreach ($pages as [$view, $key, $record, $extra, $tableId, $action]) {
            $empty = $this->renderPage($view, [$key => collect(), ...$extra]);
            $this->assertStringContainsString('id="workspace-content"', $empty, $view);
            $html = $this->renderPage($view, [$key => collect([$record]), ...$extra]);
            $this->assertStringContainsString('data-table-filter="'.$tableId.'"', $html, $view);
            $this->assertStringContainsString('id="'.$tableId.'"', $html, $view);
            $this->assertStringContainsString('scope="col"', $html, $view);
            $this->assertStringContainsString($action, $html, $view);
            $this->assertStringContainsString('internal-components.css', $html, $view);
        }
    }

    public function test_create_edit_and_detail_pages_keep_values_methods_and_safe_rich_text(): void
    {
        ['category' => $category, 'post' => $post, 'staff' => $staff, 'job' => $job, 'request' => $request] = $this->records();
        foreach (['create', 'edit'] as $page) {
            $html = $this->renderPage('super-admin.blogs.'.$page, ['post' => $post, 'categories' => collect([$category])]);
            $this->assertStringContainsString('value="Hiring in Canada"', $html);
            $this->assertStringContainsString('aria-labelledby="content-label"', $html);
            $this->assertStringContainsString('admin-blog-editor.js', $html);
            $this->assertStringContainsString('enctype="multipart/form-data"', $html);
            $this->assertStringContainsString('Save changes', $html);
            $html = $this->renderPage('super-admin.blog-categories.'.$page, ['category' => $category]);
            $this->assertStringContainsString('value="Hiring Advice"', $html);
        }
        $html = $this->renderPage('super-admin.staff-accounts.edit', ['staffAccount' => $staff]);
        $this->assertStringContainsString('value="Test Writer"', $html);
        $this->assertStringContainsString('value="writer@example.com"', $html);
        $this->assertStringContainsString('name="_method" value="put"', $html);
        $html = $this->renderPage('super-admin.blog-categories.show', ['category' => $category]);
        $this->assertStringContainsString(route('super-admin.blog-categories.destroy', $category), $html);
        $html = $this->renderPage('super-admin.staff-accounts.show', ['staffAccount' => $staff]);
        $this->assertStringContainsString(route('super-admin.staff-accounts.edit', $staff), $html);
        $html = $this->renderPage('super-admin.employer-job-requests.show', ['jobRequest' => $request, 'publishedJob' => $job]);
        $this->assertStringContainsString('<strong>staffing</strong>', $html);
        $this->assertStringContainsString(route('job.details.show', $job), $html);
        $post->content .= '<script>alert(1)</script><img src=x onerror="alert(1)">';
        $html = $this->renderPage('super-admin.blogs.show', ['post' => $post]);
        $this->assertStringContainsString('<h2>Plan ahead</h2>', $html);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
        $this->assertStringNotContainsString('onerror=', $html);
    }

    public function test_field_validation_is_associated_with_the_correct_inputs(): void
    {
        ['category' => $category, 'post' => $post, 'staff' => $staff] = $this->records();
        $errors = (new ViewErrorBag())->put('default', new MessageBag(['title' => ['Please enter a title.'], 'name' => ['Please enter a name.']]));
        foreach ([
            ['super-admin.blogs.create', ['post' => $post, 'categories' => collect([$category])], 'title'],
            ['super-admin.blog-categories.create', ['category' => $category], 'name'],
            ['super-admin.staff-accounts.edit', ['staffAccount' => $staff], 'name'],
        ] as [$view, $data, $field]) {
            $html = $this->renderPage($view, ['errors' => $errors, ...$data]);
            $this->assertStringContainsString('aria-describedby="'.$field.'-error"', $html);
            $this->assertStringContainsString('id="'.$field.'-error"', $html);
            $this->assertStringContainsString('aria-invalid="true"', $html);
        }
    }

    public function test_employee_and_blog_staff_workspaces_preserve_role_specific_navigation(): void
    {
        $this->actingAs(new User(['name' => 'Test Writer', 'email' => 'writer@example.com', 'role' => User::ROLE_BLOG_STAFF]));
        ['post' => $post] = $this->records();
        foreach ([collect(), collect([$post])] as $posts) {
            $html = $this->renderPage('super-admin.blog-staff-dashboard', ['publishedBlogCount' => 1, 'draftBlogCount' => 0, 'recentPosts' => $posts]);
            $this->assertStringContainsString('Create Blog Post', $html);
            $this->assertStringNotContainsString(route('super-admin.applicants.index'), $html);
            $this->assertStringNotContainsString(route('super-admin.staff-accounts.index'), $html);
        }
        $this->actingAs(new User(['name' => 'Test Candidate', 'email' => 'candidate@example.com', 'role' => User::ROLE_EMPLOYEE]));
        $html = $this->renderPage('employee.dashboard');
        foreach (['job.openings', 'apply.now', 'contact', 'employee.logout'] as $route) {
            $this->assertStringContainsString(route($route), $html);
        }
        $this->assertStringContainsString('aria-label="Open navigation"', $html);
        $this->assertStringContainsString('workspace-navigation.js', $html);
        $this->assertStringNotContainsString(route('super-admin.job-requests.index'), $html);
    }

    public function test_applicant_review_renders_general_and_job_filtered_views_with_contact_actions(): void
    {
        ['job' => $job] = $this->records();
        $applicant = new JobApplication(['fname' => 'Test', 'lname' => 'Candidate', 'phone' => '+1 403 555 0100', 'email' => 'candidate@example.com', 'job_number' => '7']);
        $applicant->id = 2;
        $entry = ['job' => $job, 'applicant_count' => 1, 'job_id_label' => '0007', 'applicants' => collect([$applicant])];
        foreach ([false, true] as $filtered) {
            $html = $this->renderPage('super-admin.applicants.index', [
                'isFilteredToJob' => $filtered, 'selectedJobEntry' => $filtered ? $entry : null,
                'requestedJobId' => $filtered ? 7 : null, 'totalJobApplicationCount' => 1,
                'jobsWithApplicantCount' => 1, 'jobsWithApplicants' => collect([$entry]),
                'unmatchedApplications' => collect(), 'recentJobApplications' => collect([$applicant]),
            ]);
            $this->assertStringContainsString('id="job-applicants-7"', $html);
            $this->assertStringContainsString(route('super-admin.applications.resume', $applicant), $html);
            $this->assertStringContainsString('mailto:candidate@example.com', $html);
            $this->assertStringContainsString('tel:+14035550100', $html);
        }
    }

    public function test_account_forms_preserve_registration_sign_in_and_validation_details(): void
    {
        foreach ([
            ['employee.auth.sign-in', [], 'employee.authenticate', false],
            ['employee.auth.sign-up', [], 'employee.register', true],
            ['super-admin.auth.sign-up', ['remainingSlots' => 1], 'super-admin.register', true],
        ] as [$view, $data, $route, $registration]) {
            $errors = (new ViewErrorBag())->put('default', new MessageBag(['email' => ['Use a valid email.']]));
            $html = $this->renderPage($view, ['errors' => $errors, ...$data]);
            $this->assertStringContainsString('action="'.route($route).'"', $html);
            $this->assertStringContainsString('name="_token"', $html);
            $this->assertStringContainsString('noindex, nofollow', $html);
            $this->assertStringContainsString('aria-describedby="email-error"', $html);
            $this->assertStringContainsString('account-forms.js', $html);
            $this->assertStringContainsString('data-password-target="password"', $html);
            if ($registration) {
                $this->assertStringContainsString('minlength="8"', $html);
                $this->assertStringContainsString('name="password_confirmation"', $html);
                $this->assertStringNotContainsString('name="remember"', $html);
            } else {
                $this->assertStringContainsString('name="remember"', $html);
            }
        }
    }
}
