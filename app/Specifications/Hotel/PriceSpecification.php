<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class PriceSpecification implements ISpecification
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
        if (!empty($this->min)) {
            $query->where('price', '>=', $this->min);
        }
        if (!empty($this->max)) {
            $query->where('price', '<=', $this->max);
        }

        return $query;
    }
}
