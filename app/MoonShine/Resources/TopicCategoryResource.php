<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\TopicCategory;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Color;

/**
 * @extends ModelResource<TopicCategory>
 */
#[Icon('heroicons.list-bullet')]
class TopicCategoryResource extends ModelResource
{
    protected string $model = TopicCategory::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/TopicCategories/TopicCategories.TopicCategories');
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make('Title', 'title')
                    ->required(),

                Color::make(__('Moonshine/TopicCategories/TopicCategoryResource.color_ui_tag'), 'color_ui_tag')
                    ->nullable()
                    ->default('#FFFFFF')
                    ->hint(__('Moonshine/TopicCategories/TopicCategoryResource.color_hint')),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'title' => 'required|string|max:255',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/topic-category-resource/index-page');
    }
}
