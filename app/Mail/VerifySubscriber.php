<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Mail\Mailable;

class VerifySubscriber extends Mailable
{
    public readonly Subscriber $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function build(): VerifySubscriber
    {
        return $this->subject('Verify your email')
            ->view('emails.verify-subscriber');
    }
}
