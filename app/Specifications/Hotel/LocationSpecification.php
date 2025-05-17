<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class LocationSpecification implements ISpecification
{
    protected readonly array $locationIds;

    public function __construct(string $locations = null)
    {
        $this->locationIds = $locations ? explode(',', $locations) : [];
    }

    public function apply(Builder $query): Builder
    {
        if (!empty($this->locationIds)) {
            $query->whereHas('locations', fn($q) => $q->whereIn('locations.id', $this->locationIds));
        }

        return $query;
    }
}
