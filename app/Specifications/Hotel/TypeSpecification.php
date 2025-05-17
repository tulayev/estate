<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class TypeSpecification implements ISpecification
{
    private readonly array $typeIds;

    public function __construct(string $types = null)
    {
        $this->typeIds = $types ? explode(',', $types) : [];
    }

    public function apply(Builder $query): Builder
    {
        if (!empty($this->typeIds)) {
            $query->whereHas('types', fn($q) => $q->whereIn('types.id', $this->typeIds));
        }

        return $query;
    }
}
