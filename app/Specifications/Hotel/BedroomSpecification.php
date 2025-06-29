<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class BedroomSpecification implements ISpecification
{
    private readonly ?float $min;
    private readonly ?float $max;

    public function __construct($min = null, $max = null)
    {
        $this->min = $min;
        $this->max = $max;
    }

    public function apply(Builder $query): Builder
    {
        if (isset($this->min) && isset($this->max) && $this->min == $this->max) {
            $value = $this->min;

            $query->where(function ($q) use ($value) {
                $q->where(function ($q2) use ($value) {
                    $q2->whereRaw('(SELECT MIN(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) = ?', [$value])
                    ->whereRaw('(SELECT MAX(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) = ?', [$value]);
                })->orWhere(function ($q2) use ($value) {
                    $q2->whereRaw('CAST(SUBSTRING_INDEX(hotels.bedrooms, "-", 1) AS DECIMAL(5,1)) <= ?', [$value])
                        ->whereRaw('CAST(SUBSTRING_INDEX(hotels.bedrooms, "-", -1) AS DECIMAL(5,1)) >= ?', [$value]);
                });
            });
        } else {
            if (isset($this->min)) {
                $query->where(function ($q) {
                    $q->whereRaw(
                        '(SELECT MIN(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) >= ?',
                        [$this->min]
                    )->orWhereRaw(
                        'CAST(SUBSTRING_INDEX(bedrooms, "-", -1) AS DECIMAL(5,1)) >= ?',
                        [$this->min]
                    );
                });
            }

            if (isset($this->max)) {
                $query->where(function ($q) {
                    $q->whereRaw(
                        '(SELECT MAX(floors.bedrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) <= ?',
                        [$this->max]
                    )->orWhereRaw(
                        'CAST(SUBSTRING_INDEX(bedrooms, "-", 1) AS DECIMAL(5,1)) <= ?',
                        [$this->max]
                    );
                });
            }
        }

        return $query;
    }
}
