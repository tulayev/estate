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

    protected string $title = 'Floors';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $hotels = auth()->user()->moonshine_user_role_id === Constants::ROLES['Developer']
            ? BelongsTo::make('Hotel', 'hotel', 'title', resource: new HotelResource())
                ->valuesQuery(fn (Builder $query, Field $field) => $query->where('created_by', auth()->user()->id))
            : BelongsTo::make('Hotel', 'hotel', 'title', resource: new HotelResource());

        return [
            Block::make([
                ID::make()->sortable(),

                Text::make('Description', 'description')
                    ->required(),

                $hotels
                    ->searchable()
                    ->required(),

                Number::make('Beds', 'beds')
                    ->required(),

                Number::make('Baths', 'baths')
                    ->required(),

                Number::make('Square', 'square')
                    ->step(0.01)
                    ->required(),

                Image::make('Image', 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable(),
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
            'hotel_id' => 'required|exists:hotels,id',
            'image' => 'nullable|image|max:2048',
            'beds' => 'required|integer|min:0',
            'baths' => 'required|integer|min:0',
            'square' => 'required|numeric|min:0',
            'description' => 'required|string',
        ];
    }
}
