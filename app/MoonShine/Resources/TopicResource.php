<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use App\Helpers\Enums\TopicType;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Enum;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\TinyMce;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Topic>
 */

#[Icon('heroicons.newspaper')]
class TopicResource extends ModelResource
{
    protected string $model = Topic::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Topics/Topics.Topics');
    }

    public function getBadge(): string
    {
        if (auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return strval(Topic::where('active', false)->count());
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

            Text::make(__('Moonshine/Topics/TopicResource.title'), 'title')->sortable(),

            Image::make(__('Moonshine/Topics/TopicResource.image'), 'image'),

            $this->getPublishedField()?->sortable(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make(__('Moonshine/Topics/TopicResource.title'), 'title'),

            BelongsTo::make(__('Moonshine/Topics/TopicResource.category'), 'category', 'title', resource: new TopicCategoryResource()),

            Text::make(__('Moonshine/Topics/TopicResource.body'), 'body'),

            Image::make(__('Moonshine/Topics/TopicResource.image'), 'image'),

            $this->getPublishedField(),
        ];
    }

    public function formFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Topics/TopicResource.title'), 'title')
                    ->required(),

                Slug::make(__('Moonshine/Topics/TopicResource.slug'), 'slug')
                    ->from('title')
                    ->unique()
                    ->readonly(),

                BelongsTo::make(__('Moonshine/Topics/TopicResource.category'), 'category', 'title', resource: new TopicCategoryResource())
                    ->searchable()
                    ->required(),

                TinyMce::make(__('Moonshine/Topics/TopicResource.body'), 'body')
                    ->required(),

                Image::make(__('Moonshine/Topics/TopicResource.image'), 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['jpg', 'jpeg', 'png'])
                    ->removable(),

                $this->getPublishedField(),

                Enum::make(__('Moonshine/Topics/TopicResource.type'), 'type')
                    ->attach(TopicType::class),
            ])
        ];
    }

    /**
     * @param Topic $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'type' => 'required',
        ];
    }

    public function search(): array
    {
        return ['title', 'category.title'];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/topic-resource/index-page');
    }

    private function isUserInRole($role): bool
    {
        return auth()->user()->moonshine_user_role_id === $role;
    }

    private function getPublishedField(): Switcher | null
    {
        return $this->isUserInRole(Constants::ROLES['Admin'])
            ? Switcher::make(__('Moonshine/Topics/TopicResource.published'), 'active')
                ->default(true)
            : null;
    }
}
