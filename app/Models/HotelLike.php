<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'hotel_id',
        'liked_by',
        'ip_address'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
