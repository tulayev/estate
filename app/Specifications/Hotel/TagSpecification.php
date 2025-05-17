<?php

namespace App\Specifications\Hotel;

use App\Specifications\ISpecification;
use Illuminate\Database\Eloquent\Builder;

class TagSpecification implements ISpecification
{
    protected readonly array $tagIds;

    public function __construct(string $tags = null)
    {
        $this->tagIds = $tags ? explode(',', $tags) : [];
    }

    public function apply(Builder $query): Builder
    {
        if (!empty($this->tagIds)) {
            $query->whereHas('tags', fn($q) => $q->whereIn('tags.id', $this->tagIds));
        }

        return $query;
    }
}
