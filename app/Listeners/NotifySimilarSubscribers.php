<?php

namespace App\Listeners;

use App\Events\HotelCreated;
use App\Mail\NewSimilarHotel;
use App\Models\Subscription;
use Illuminate\Support\Facades\Mail;

class NotifySimilarSubscribers
{
    private const MATCHES_COUNT = 0;

    public function handle(HotelCreated $event): void
    {
        $newHotel = $event->hotel;

        Subscription::whereHas('subscriber', fn($q) => $q->where('verified', true))
            ->with([
                'hotel.tags',
                'hotel.features',
                'hotel.locations',
                'hotel.types',
                'subscriber',
            ])
            ->chunk(100, function($subscriptions) use ($newHotel) {
                foreach ($subscriptions as $subscription) {
                    $originalHotel = $subscription->hotel;
                    $matches = 0;

                    // helper to count intersection of two relations
                    $intersectCount = fn($a, $b) => count(
                        array_intersect(
                            $originalHotel->{$a}->pluck('id')->toArray(),
                            $newHotel->{$b}->pluck('id')->toArray()
                        )
                    );

                    // tags overlap?
                    if ($intersectCount('tags','tags') > 0) {
                        $matches++;
                    }

                    // features overlap?
                    if ($intersectCount('features','features') > 0) {
                        $matches++;
                    }

                    // locations overlap?
                    if ($intersectCount('locations','locations') > 0) {
                        $matches++;
                    }

                    // types overlap?
                    if ($intersectCount('types','types') > 0) {
                        $matches++;
                    }

                    // price within ±15%
                    $low  = $originalHotel->price * 0.85;
                    $high = $originalHotel->price * 1.15;
                    if ($newHotel->price >= $low && $newHotel->price <= $high) {
                        $matches++;
                    }

                    // if at least 3 criteria matched -> notify
                    if ($matches >= self::MATCHES_COUNT) {
                        Mail::to($subscription->subscriber->email)
                            ->queue(new NewSimilarHotel($subscription, $newHotel));
                    }
                }
            });
    }
}
