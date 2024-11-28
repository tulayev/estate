<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Hotel>
 */
#[Icon('heroicons.outline.home-modern')]
class HotelResource extends ModelResource
{
    protected string $model = Hotel::class;

    protected string $title = 'Hotels';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make('General Information', [
                ID::make()->sortable(), // ID Field with sorting

                Text::make('Title')
                    ->required()
                    ->sortable(), // Title Field

                Textarea::make('Description')
                    ->required(), // Description Field

                Number::make('Price')
                    ->required()
                    ->min(0)
                    ->step(0.001), // Price Field
            ]),

            Block::make('Media', [
                Image::make('Main Image', 'main_image')
                    ->dir(Constants::UPLOAD_PATH)
                    ->disk('public')
                    ->removable()
                    ->required(), // Main Image Field

                Image::make('Gallery', 'gallery')
                    ->dir(Constants::UPLOAD_PATH)
                    ->disk('public')
                    ->removable()
                    ->multiple(), // Gallery
            ]),
        ];
    }

    /**
     * @param Hotel $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,3})?$/',
            'main_image' => 'required|image|max:2048',
            'gallery' => 'required|array',
            'gallery.*' => 'image|max:2048',
        ];
    }

    public function search(): array
    {
        return ['title', 'description'];
    }
}
