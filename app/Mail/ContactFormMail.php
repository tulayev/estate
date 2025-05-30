<?php

namespace App\Mail;

use App\Models\ContactFormSubmission;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public readonly ContactFormSubmission $submission;

    public function __construct(ContactFormSubmission $submission)
    {
        $this->submission = $submission;
    }

    public function build(): ContactFormMail
    {
        return $this->subject('New Contact Form Submission - ' . config('app.name'))
            ->view('emails.contact-form')
            ->with([
                'submission' => $this->submission,
            ]);
    }
}