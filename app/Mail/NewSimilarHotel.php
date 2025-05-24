<?php

namespace App\Mail;

use App\Models\Hotel;
use App\Models\Subscription;
use Illuminate\Mail\Mailable;

class NewSimilarHotel extends Mailable
{
    public readonly Subscription $subscription;
    public readonly Hotel $hotel;

    public function __construct(Subscription $subscription, Hotel $hotel)
    {
        $this->subscription = $subscription;
        $this->hotel = $hotel;
    }

    public function build(): NewSimilarHotel
    {
        return $this->subject('New similar hotel added')
            ->markdown('emails.similar-hotel-notification');
    }
}
