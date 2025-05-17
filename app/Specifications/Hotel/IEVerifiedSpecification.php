<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class IEVerifiedSpecification implements ISpecification
{
    private readonly ?bool $value;

    public function __construct($ieVerified = null)
    {
        // normalize to boolean or null
        $this->value = is_null($ieVerified)
            ? null
            : filter_var($ieVerified, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }

    public function apply(Builder $query): Builder
    {
        if (!is_null($this->value)) {
            $query->where('ie_verified', $this->value);
        }

        return $query;
    }
}
