<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use App\Rules\GalleryUrl;
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
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Objects/Objects.Objects');
    }

    public function query(): Builder
    {
        if ($this->isUserInRole(Constants::ROLES['Developer'])) {
            return parent::query()
                ->where('created_by', '=', auth()->user()->id);
        }

        return parent::query();
    }

    public function getBadge(): string
    {
        if ($this->isUserInRole(Constants::ROLES['Admin'])) {
            return strval(Hotel::where('active', false)->count());
        }

        return '';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Moonshine/Objects/HotelResources.title'), 'title')->sortable(),

            Image::make(__('Moonshine/Objects/HotelResources.main_image'), 'main_image'),

            BelongsToMany::make(__('Moonshine/Objects/HotelResources.tags'), 'tags', 'name', resource: new TagResource())
                ->inLine('|'),

            $this->getIeScoreField(),

            $this->getPublishedField()?->sortable(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make(__('Moonshine/Objects/HotelResources.title'), 'title'),

            Slug::make('Slug', 'slug'),

            Text::make(__('Moonshine/Objects/HotelResources.description'), 'description'),

            Text::make(__('Moonshine/Objects/HotelResources.code_name'), 'codename'),

            Text::make(__('Moonshine/Objects/HotelResources.location_description'), 'location_description'),

            Number::make(__('Moonshine/Objects/HotelResources.latitude'), 'latitude'),

            Number::make(__('Moonshine/Objects/HotelResources.longitude'), 'longitude'),

            Number::make(__('Moonshine/Objects/HotelResources.price'), 'price'),

            BelongsToMany::make(__('Moonshine/Objects/HotelResources.types'), 'types', 'name', resource: new TypeResource()),

            BelongsToMany::make(__('Moonshine/Objects/HotelResources.tags'), 'tags', 'name', resource: new TagResource()),

            BelongsToMany::make(__('Moonshine/Objects/HotelResources.features'), 'features', 'name', resource: new FeatureResource()),

            BelongsToMany::make(__('Moonshine/Objects/HotelResources.locations'), 'locations', 'name', resource: new LocationResource()),

            Image::make(__('Moonshine/Objects/HotelResources.main_image'), 'main_image'),

            Image::make(__('Moonshine/Objects/HotelResources.gallery'), 'gallery')
                ->multiple(),

            $this->getPublishedField(),
        ];
    }

    public function formFields(): array
    {
        return [
            Block::make(__('Moonshine/Objects/HotelResources.general_information'), [
                ID::make()->sortable(),

                Text::make(__('Moonshine/Objects/HotelResources.title'), 'title')
                    ->required()
                    ->sortable(),

                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->unique()
                    ->readonly(),

                TinyMce::make(__('Moonshine/Objects/HotelResources.description'), 'description')
                    ->required(),

                Text::make(__('Moonshine/Objects/HotelResources.code_name'), 'codename'),

                Number::make(__('Moonshine/Objects/HotelResources.latitude'), 'latitude')
                    ->step(0.000001),

                Number::make(__('Moonshine/Objects/HotelResources.longitude'), 'longitude')
                    ->step(0.000001),

                Number::make(__('Moonshine/Objects/HotelResources.price'), 'price')
                    ->required()
                    ->min(0)
                    ->step(0.001),

                BelongsToMany::make(__('Moonshine/Objects/HotelResources.types'), 'types', 'name', resource: new TypeResource())
                    ->selectMode(),

                BelongsToMany::make(__('Moonshine/Objects/HotelResources.tags'), 'tags', 'name', resource: new TagResource())
                    ->selectMode(),

                BelongsToMany::make(__('Moonshine/Objects/HotelResources.features'), 'features', 'name', resource: new FeatureResource())
                    ->selectMode(),

                BelongsToMany::make(__('Moonshine/Objects/HotelResources.locations'), 'locations', 'name', resource: new LocationResource())
                    ->selectMode(),

                $this->getPublishedField(),

                $this->getIeVerifiedField(),

                $this->getIeScoreField(),
            ]),

            Block::make(__('Moonshine/Objects/HotelResources.media'), [
                Image::make(__('Moonshine/Objects/HotelResources.main_image'), 'main_image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable(),

                Image::make(__('Moonshine/Objects/HotelResources.gallery'), 'gallery')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable()
                    ->multiple(),

                Text::make(__('Moonshine/Objects/HotelResources.main_image_url'), 'main_image_url'),

                Textarea::make(__('Moonshine/Objects/HotelResources.gallery_urls'), 'gallery_url'),
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
            'latitude' => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
            'price' => 'required|numeric|min:0|max:9999999999.999|regex:/^\d+(\.\d{1,3})?$/',
            'main_image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'main_image_url' => 'nullable|url',
            'gallery_url' => ['nullable', 'string', new GalleryUrl()],
            'ie_score' => 'nullable|numeric|min:0|max:100',
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

    private function isUserInRole($role): bool
    {
        return auth()->user()->moonshine_user_role_id === $role;
    }

    private function getPublishedField(): Switcher | null
    {
        return $this->isUserInRole(Constants::ROLES['Admin'])
            ? Switcher::make('Published', 'active')
                ->default(true)
            : null;
    }

    private function getIeVerifiedField(): Switcher | null
    {
        return $this->isUserInRole(Constants::ROLES['Admin'])
            ? Switcher::make('IE Verified', 'ie_verified')
                ->default(true)
            : null;
    }

    private function getIeScoreField(): Number | null
    {
        return $this->isUserInRole(Constants::ROLES['Admin'])
            ? Number::make('IE Score', 'ie_score')
                ->buttons()
                ->stars()
                ->min(0)
                ->max(100)
            : null;
    }
}
