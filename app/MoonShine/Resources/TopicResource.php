<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
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

    protected string $title = 'Topics';

    public function getBadge(): string
    {
        if (auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']) {
            return strval(Topic::where('active', false)->count());
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

            Image::make('Image', 'image'),

            $this->getPublishedField()?->sortable(),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make('Title', 'title'),

            BelongsTo::make('Category', 'category', 'title', resource: new TopicCategoryResource()),

            Text::make('Body', 'body'),

            Image::make('Image', 'image'),

            $this->getPublishedField(),
        ];
    }

    public function formFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make('Title', 'title')
                    ->required(),

                Slug::make('Slug', 'slug')
                    ->from('title')
                    ->unique()
                    ->readonly(),

                BelongsTo::make('Category', 'category', 'title', resource: new TopicCategoryResource())
                    ->searchable()
                    ->required(),

                TinyMce::make('Body', 'body')
                    ->required(),

                Image::make('Image', 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['jpg', 'jpeg', 'png'])
                    ->removable(),

                $this->getPublishedField(),
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
        ];
    }

    public function search(): array
    {
        return ['title', 'category.title'];
    }
}
