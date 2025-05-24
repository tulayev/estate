<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscriber extends Model
{
    protected $fillable = [
        'email',
        'verified',
        'verification_code',
        'verification_expires_at',
    ];

    protected $casts = [
        'verified' => 'boolean',
        'verification_expires_at' => 'datetime',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function isExpired(): bool
    {
        return $this->verification_expires_at && now()->greaterThan($this->verification_expires_at);
    }

    protected static function booted(): void
    {
        static::creating(function ($subscriber) {
            $subscriber->verification_code = random_int(100000, 999999);
            $subscriber->verification_expires_at = now()->addDay();
        });
    }
}
