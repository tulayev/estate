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
use MoonShine\Fields\Textarea;
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

    protected string $title = 'Objects';

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

    public function getPublishedField(): Switcher | null
    {
        return auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']
            ? Switcher::make('Published', 'active')
                ->default(true)
            : null;
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make('Title', 'title')->sortable(),

            Image::make('Main Image', 'main_image'),

            $this->getPublishedField()?->sortable(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make('Title', 'title'),

            Slug::make('Slug', 'slug'),

            Text::make('Description', 'description'),

            Text::make('Code Name', 'codename'),

            Text::make('Location', 'location'),

            Number::make('Latitude', 'latitude'),

            Number::make('Longitude', 'longitude'),

            Number::make('Price', 'price'),

            BelongsToMany::make('Types', 'types', 'name', resource: new TypeResource()),

            BelongsToMany::make('Tags', 'tags', 'name', resource: new TagResource()),

            BelongsToMany::make('Features', 'features', 'name', resource: new FeatureResource()),

            Image::make('Main Image', 'main_image'),

            Image::make('Gallery', 'gallery')
                ->multiple(),

            $this->getPublishedField(),
        ];
    }

    public function formFields(): array
    {
        return [
            Block::make('General Information', [
                ID::make()->sortable(),

                Text::make('Title', 'title')
                    ->required()
                    ->sortable(),

                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->unique()
                    ->readonly(),

                TinyMce::make('Description', 'description')
                    ->required(),

                Text::make('Code Name', 'codename'),

                Text::make('Location', 'location')
                    ->required(),

                Number::make('Latitude', 'latitude')
                    ->step(0.000001),

                Number::make('Longitude', 'longitude')
                    ->step(0.000001),

                Number::make('Price', 'price')
                    ->required()
                    ->min(0)
                    ->step(0.001),

                BelongsToMany::make('Types', 'types', 'name', resource: new TypeResource()),

                BelongsToMany::make('Tags', 'tags', 'name', resource: new TagResource()),

                BelongsToMany::make('Features', 'features', 'name', resource: new FeatureResource()),

                $this->getPublishedField(),

                Switcher::make('IE Verified', 'ie_verified')
                    ->default(false),

                Number::make('IE Score', 'ie_score')
                    ->required(),
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

                Text::make('Main Image URL', 'main_image_url'),

                Textarea::make('Gallery URLs (separate by semicolon \';\')', 'gallery_url'),
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
            'location' => 'required|string',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
            'price' => 'required|numeric|min:0|max:9999999999.999|regex:/^\d+(\.\d{1,3})?$/',
            'main_image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'main_image_url' => 'nullable|string',
            'gallery_url' => 'nullable|string',
            'ie_verified' => 'required',
            'ie_score' => 'required|numeric|min:0|max:100',
        ];
    }

    public function search(): array
    {
        return ['title', 'description'];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/hotel-resource/index-page');
    }
}
