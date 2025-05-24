<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Subscription extends Model
{
    protected $fillable = [
        'ip_address',
        'subscriber_id',
        'hotel_id',
    ];

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    protected static function booted(): void
    {
        static::creating(function ($subscription) {
            $subscription->unsubscribe_token = Str::random(32);
        });

        static::created(function ($subscription) {
            Log::channel('subscriptions')->info('!!New subscription!!', [
                'object' => $subscription->hotel->title,
                'subscriber' => Helper::maskEmail($subscription->subscriber->email),
                'subscribed_at' => now(),
            ]);
        });
    }
}
