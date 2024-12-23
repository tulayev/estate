<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($feature) {
            if (!is_null($feature->icon) && Storage::disk(Constants::PUBLIC_DISK)->exists($feature->icon)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($feature->icon);
            }
        });
    }

    public function hotels()
    {
        return $this->belongsToMany(Hotel::class, 'hotel_feature');
    }
}
