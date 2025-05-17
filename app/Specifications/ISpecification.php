<?php

namespace App\Specifications;

use Illuminate\Database\Eloquent\Builder;

interface ISpecification
{
    public function apply(Builder $query): Builder;
}
