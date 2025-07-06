<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class BathroomSpecification implements ISpecification
{
    private readonly ?int $min;
    private readonly ?int $max;

    public function __construct(?int $min = null, ?int $max = null)
    {
        $this->min = is_numeric($min) ? (int)$min : null;
        $this->max = is_numeric($max) ? (int)$max : null;
    }

    public function apply(Builder $query): Builder
    {
        if (is_null($this->min) && is_null($this->max)) {
            return $query;
        }

        if (!is_null($this->min) && !is_null($this->max) && $this->min == $this->max) {
            $value = $this->min;

            $query->where(function ($q) use ($value) {
                $q->where(function ($q2) use ($value) {
                    $q2->whereRaw('(SELECT MIN(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) = ?', [$value])
                        ->whereRaw('(SELECT MAX(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) = ?', [$value]);
                })->orWhere(function ($q2) use ($value) {
                    $q2->whereRaw('CAST(SUBSTRING_INDEX(hotels.bathrooms, "-", 1) AS UNSIGNED) <= ?', [$value])
                        ->whereRaw('CAST(SUBSTRING_INDEX(hotels.bathrooms, "-", -1) AS UNSIGNED) >= ?', [$value]);
                });
            });
        } else {
            if (!is_null($this->min)) {
                $query->where(function ($q) {
                    $q->whereRaw(
                        '(SELECT MIN(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) >= ?',
                        [$this->min]
                    )->orWhereRaw(
                        'CAST(SUBSTRING_INDEX(bathrooms, "-", -1) AS UNSIGNED) >= ?',
                        [$this->min]
                    );
                });
            }

            if (!is_null($this->max)) {
                $query->where(function ($q) {
                    $q->whereRaw(
                        '(SELECT MAX(floors.bathrooms) FROM floors WHERE floors.hotel_id = hotels.id GROUP BY floors.hotel_id) <= ?',
                        [$this->max]
                    )->orWhereRaw(
                        'CAST(SUBSTRING_INDEX(bathrooms, "-", 1) AS UNSIGNED) <= ?',
                        [$this->max]
                    );
                });
            }
        }

        return $query;
    }
}
