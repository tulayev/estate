<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'topic_id',
        'liked_by',
        'ip_address'
    ];
}
