<?php

namespace App\Filters;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Hotel;
use App\Specifications\ISpecification;
use App\Specifications\Hotel\{
    PriceSpecification,
    BedroomSpecification,
    BathroomSpecification,
    TypeSpecification,
    TagSpecification,
    LocationSpecification,
    FeatureSpecification,
    IEVerifiedSpecification};

class HotelQueryBuilder
{
    private Builder $query;
    /** @var ISpecification[] */
    private array $specs = [];

    public static function for(Request $request): self
    {
        $builder = new self;
        $builder->query = Hotel::query()
            ->with(['floors','types','tags','features','locations'])
            ->fullSearch($request->input('title'))
            ->active();

        return $builder;
    }

    public function withPrice($min = null, $max = null): self
    {
        $this->specs[] = new PriceSpecification($min, $max);
        return $this;
    }

    public function withBedrooms($min = null, $max = null): self
    {
        $this->specs[] = new BedroomSpecification($min, $max);
        return $this;
    }

    public function withBathrooms($min = null, $max = null): self
    {
        $this->specs[] = new BathroomSpecification($min, $max);
        return $this;
    }

    public function withTypes(string $csv = null): self
    {
        $this->specs[] = new TypeSpecification($csv);
        return $this;
    }

    public function withTags(string $csv = null): self
    {
        $this->specs[] = new TagSpecification($csv);
        return $this;
    }

    public function withLocations(string $csv = null): self
    {
        $this->specs[] = new LocationSpecification($csv);
        return $this;
    }

    public function withFeatures(string $csv = null): self
    {
        $this->specs[] = new FeatureSpecification($csv);
        return $this;
    }

    public function withIEVerified($flag = null): self
    {
        $this->specs[] = new IeVerifiedSpecification($flag);
        return $this;
    }

    public function build(): Builder
    {
        foreach ($this->specs as $spec) {
            $this->query = $spec->apply($this->query);
        }

        return $this->query;
    }
}
