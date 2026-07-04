<?php

namespace App\Mail;

use App\Models\EmployerJobRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployerJobRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public EmployerJobRequest $jobRequest,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Employer job request: '.$this->jobRequest->subject,
            replyTo: [
                new \Illuminate\Mail\Mailables\Address(
                    $this->jobRequest->email,
                    trim($this->jobRequest->contact_first_name.' '.$this->jobRequest->contact_last_name),
                ),
            ],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.employer-job-request-notification',
        );
    }
}
