<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use App\Helpers\Enums\TopicType;
use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use App\Services\IFileUploadService;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;
use Illuminate\Http\UploadedFile;
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
        if (Helper::isUserInRole(UserRole::Admin)) {
            return strval(Topic::where('active', false)->count());
        }

        return '';
    }

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

            Image::make(__('Moonshine/Topics/TopicResource.image'), 'image'),

            Image::make(__('Moonshine/Topics/TopicResource.logo'), 'logo'),

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

                TinyMce::make('Main Ideas', 'main_ideas'),

                $this->getPublishedField(),

                Enum::make(__('Moonshine/Topics/TopicResource.type'), 'type')
                    ->attach(TopicType::class),

                Image::make(__('Moonshine/Topics/TopicResource.image'), 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::TOPICS_UPLOAD_PATH)
                    ->customName(fn(UploadedFile $file, Field $field) =>
                        Helper::generateFileNameForUploadedFile($file))
                    ->allowedExtensions(['jpg', 'jpeg', 'png'])
                    ->removable(),
            ]),

            Block::make(__('Moonshine/Topics/TopicResource.awards'), [
                Image::make(__('Moonshine/Topics/TopicResource.logo'), 'logo')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::TOPICS_UPLOAD_PATH)
                    ->customName(fn(UploadedFile $file, Field $field) =>
                        Helper::generateFileNameForUploadedFile($file))
                    ->allowedExtensions(['jpg', 'jpeg', 'png', 'svg'])
                    ->removable(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
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

    protected function afterCreated(Model $item): Model
    {
        app(IFileUploadService::class)->move($item, Constants::TOPICS_UPLOAD_PATH, 'image');
        app(IFileUploadService::class)->move($item, Constants::TOPICS_UPLOAD_PATH, 'logo');

        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {
        app(IFileUploadService::class)->move($item, Constants::TOPICS_UPLOAD_PATH, 'image');
        app(IFileUploadService::class)->move($item, Constants::TOPICS_UPLOAD_PATH, 'logo');

        return $item;
    }

    private function getPublishedField(): Switcher | null
    {
        return Helper::isUserInRole(UserRole::Admin)
            ? Switcher::make(__('Moonshine/Topics/TopicResource.published'), 'active')
                ->default(true)
            : null;
    }
}
