<?php

namespace App\Models;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'active',
        'created_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($topic) {
            $topic->created_by = auth()->user()->id;
        });

        static::deleting(function ($topic) {
            if (!is_null($topic->image) && Storage::disk(Constants::PUBLIC_DISK)->exists($topic->image)) {
                Storage::disk(Constants::PUBLIC_DISK)->delete($topic->image);
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(TopicCategory::class);
    }
}
