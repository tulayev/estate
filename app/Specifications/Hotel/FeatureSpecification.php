<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class FeatureSpecification implements ISpecification
{
    private readonly array $featureIds;

    public function __construct(string $features = null)
    {
        $this->featureIds = $features ? explode(',', $features) : [];
    }

    public function apply(Builder $query): Builder
    {
        if (!empty($this->featureIds)) {
            $count = count($this->featureIds);

            $query->whereHas(
                'features',
                fn($q) => $q->whereIn('features.id', $this->featureIds),
                '=',
                $count
            );
        }

        return $query;
    }
}
