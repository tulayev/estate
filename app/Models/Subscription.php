<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        static::creating(function ($sub) {
            $sub->unsubscribe_token = Str::random(32);
        });
    }
}
