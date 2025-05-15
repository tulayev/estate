<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Location;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Location>
 */
#[Icon('heroicons.map-pin')]
class LocationResource extends ModelResource
{
    protected string $model = Location::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Locations/Locations.Locations');
    }
    /**
     * @return list<MoonShineComponent|Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name', 'name')->sortable(),

            BelongsToMany::make('Objects', 'hotels', 'title', resource: new HotelResource())
                ->inLine('|'),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make('Name', 'name'),

            Text::make('Description', 'description'),

            Number::make('Latitude', 'latitude'),

            Number::make('Longitude', 'longitude'),
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Name', 'name')
                ->required()
                ->sortable(),

            TinyMce::make('Description', 'description')
                ->required(),

            Number::make('Latitude', 'latitude')
                ->step(0.000001)
                ->required(),

            Number::make('Longitude', 'longitude')
                ->step(0.000001)
                ->required(),
        ];
    }

    /**
     * @param Location $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ];
    }
}
