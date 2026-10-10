<?php

namespace Tests\Feature;

use App\Http\Controllers\SuperAdminEmployerJobRequestController;
use App\Mail\EmployerJobRequestNotification;
use App\Models\EmployerJobRequest;
use App\Support\RichText;
use Illuminate\Support\Facades\Mail;
use ReflectionMethod;
use Tests\TestCase;

class EmployerRequestFormTest extends TestCase
{
    private function validRequest(): array
    {
        return [
            'company_name' => 'Example Company', 'industry' => 'Warehousing', 'company_phone' => '587-555-0100',
            'company_address' => '123 Example St, Calgary, AB', 'contact_first_name' => 'Alex', 'contact_last_name' => 'Smith',
            'email' => 'alex@example.com', 'phone' => '587-555-0101', 'interest' => 'Temporary Staffing',
            'specialization' => 'Warehouse Support', 'job_location' => 'Calgary, AB', 'position_hiring_for' => 'Warehouse associate',
            'subject' => 'Staffing request', 'message' => '<h3>Responsibilities</h3><ul><li>Pick orders</li></ul>',
        ];
    }

    public function test_form_shows_real_placeholders_and_a_full_width_editor_with_plain_text_fallback(): void
    {
        $response = $this->get('/place-job')->assertOk();
        $response->assertSee('value="">Select your industry', false)
            ->assertSee('value="">Choose the support you need', false)
            ->assertSee('role="textbox"', false)->assertSee('contenteditable="true"', false)
            ->assertSee('name="message"', false)->assertSee('data-editor-outline', false)
            ->assertSee('employer-request.js')->assertSee('Send staffing request')
            ->assertDontSee('data-textarea-toolbar', false);
    }

    public function test_required_selects_cannot_submit_placeholder_values(): void
    {
        Mail::fake();
        $payload = $this->validRequest();
        $payload['industry'] = '';
        $payload['interest'] = '';
        $payload['specialization'] = '';
        $this->from('/place-job')->post('/place-job', $payload)
            ->assertRedirect('/place-job')->assertSessionHasErrors(['industry', 'interest', 'specialization']);
        Mail::assertNothingSent();

    }

    public function test_validation_feedback_keeps_entries_and_renders_the_old_description_safely(): void
    {
        $payload = $this->validRequest();
        $payload['message'] .= '<script>alert(1)</script>';
        // Laravel 13 sessions deserialize error bags from this JSON structure.
        $errors = ['default' => ['messages' => ['industry' => ['Please choose an industry.']], 'format' => ':message']];
        $html = $this->withSession(['_old_input' => $payload, 'errors' => $errors])->get('/place-job')->assertOk()->getContent();
        $this->assertStringContainsString('aria-invalid="true"', $html);
        $this->assertStringContainsString('value="Example Company"', $html);
        $this->assertStringContainsString('<h3>Responsibilities</h3><ul><li>Pick orders</li></ul>', $html);
        $this->assertStringNotContainsString('<script>alert(1)</script>', $html);
    }

    public function test_description_limit_counts_text_instead_of_formatting_tags(): void
    {
        Mail::fake();
        $payload = $this->validRequest();
        $payload['message'] = '<p><strong>'.str_repeat('a', 5001).'</strong></p>';
        $this->from('/place-job')->post('/place-job', $payload)->assertRedirect('/place-job')
            ->assertSessionHasErrors(['message' => 'Please keep the job description to 5,000 characters or fewer.']);
        Mail::assertNothingSent();
    }

    public function test_notification_email_preserves_formatting_without_rendering_unsafe_markup(): void
    {
        $jobRequest = new EmployerJobRequest($this->validRequest());
        $jobRequest->message .= '<script>alert(1)</script><a href="javascript:bad()">Unsafe link</a>';
        $html = (new EmployerJobRequestNotification($jobRequest))->render();
        $this->assertStringContainsString('<h3>Responsibilities</h3><ul><li>Pick orders</li></ul>', $html);
        $this->assertStringNotContainsString('<script>', $html);
        $this->assertStringNotContainsString('javascript:', $html);
    }

    public function test_publication_preserves_formatted_description_and_escapes_company_data(): void
    {
        $jobRequest = new EmployerJobRequest($this->validRequest());
        $jobRequest->company_name = '<script>alert(1)</script> Company';
        $controller = new SuperAdminEmployerJobRequestController;
        $description = (new ReflectionMethod($controller, 'buildDescription'))->invoke($controller, $jobRequest);
        $this->assertStringContainsString('<h3>Responsibilities</h3><ul><li>Pick orders</li></ul>', $description);
        $this->assertStringNotContainsString('<script>', $description);
        $this->assertStringContainsString('&lt;script&gt;', $description);
        $this->assertStringContainsString('Company:', RichText::plainText($description));
        $summary = (new ReflectionMethod($controller, 'buildSummary'))->invoke($controller, $jobRequest);
        $this->assertSame("Responsibilities\nPick orders", $summary);
    }
}
