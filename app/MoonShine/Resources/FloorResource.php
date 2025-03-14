<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Floor;

use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Floor>
 */
#[Icon('heroicons.outline.home')]
class FloorResource extends ModelResource
{
    protected string $model = Floor::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Floors/Floors.Floors');
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $hotels = auth()->user()->moonshine_user_role_id === Constants::ROLES['Developer']
            ? BelongsTo::make(__('Moonshine/Floors/FloorResources.object'), 'hotel', 'title', resource: new HotelResource())
                ->valuesQuery(fn (Builder $query, Field $field) => $query->where('created_by', auth()->user()->id))
            : BelongsTo::make(__('Moonshine/Floors/FloorResources.object'), 'hotel', 'title', resource: new HotelResource());

        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Floors/FloorResources.floor'), 'floor')
                    ->required(),

                $hotels
                    ->searchable()
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.bedrooms'), 'bedrooms')
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.bathrooms'), 'bathrooms')
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.area'), 'area')
                    ->step(0.01)
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.price'), 'price')
                    ->step(0.01)
                    ->required(),

                Image::make(__('Moonshine/Floors/FloorResources.image'), 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable(),

                Text::make(__('Moonshine/Floors/FloorResources.image'), 'image_url'),
            ])
        ];
    }

    /**
     * @param Floor $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'floor' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'image_url' => 'nullable|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'hotel_id' => 'required|exists:hotels,id',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/floor-resource/index-page');
    }
}
