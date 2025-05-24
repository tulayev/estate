<?php

namespace App\Events;

use App\Models\Hotel;
use Illuminate\Foundation\Events\Dispatchable;

class HotelCreated
{
    use Dispatchable;

    public readonly Hotel $hotel;

    public function __construct(Hotel $hotel)
    {
        $this->hotel = $hotel;
    }
}
