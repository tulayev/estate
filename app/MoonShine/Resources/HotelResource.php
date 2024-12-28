<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
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

    public function query(): Builder
    {
        if (auth()->user()->moonshine_user_role_id === Constants::ROLES['Developer']) {
            return parent::query()
                ->where('created_by', '=', auth()->user()->id);
        }

        return parent::query();
    }

    public function getBadge(): string
    {
        if (auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return strval(Hotel::where('active', false)->count());
        }

        return '';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $activeField = auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']
            ? Switcher::make('Published', 'active')
                ->default(true)
                ->sortable(function (Builder $query) {
                    $query->orderBy('created_at', 'desc');
                })
            : null;

        return [
            Block::make('General Information', [
                ID::make()->sortable(),

                $activeField,

                Text::make('Title', 'title')
                    ->required()
                    ->sortable(),

                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->unique(),

                TinyMce::make('Description', 'description')
                    ->required(),

                Text::make('Code Name', 'codename'),

                Text::make('Category', 'category'),

                Number::make('Latitude', 'latitude')
                    ->step(0.000001),

                Number::make('Longitude', 'longitude')
                    ->step(0.000001),

                Number::make('Price', 'price')
                    ->required()
                    ->min(0)
                    ->step(0.001),

                BelongsToMany::make('Tags', 'tags', 'name', resource: new TagResource()),

                BelongsToMany::make('Features', 'features', 'name', resource: new FeatureResource()),
            ]),

            Block::make('Media', [
                Image::make('Main Image', 'main_image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable(),

                Image::make('Gallery', 'gallery')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable()
                    ->multiple(),
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
            'codename' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'price' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,3})?$/',
            'main_image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
        ];
    }

    public function search(): array
    {
        return ['title', 'description'];
    }
}
