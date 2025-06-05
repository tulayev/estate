<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

use MoonShine\Attributes\Icon;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Tag>
 */
#[Icon('heroicons.tag')]
class TagResource extends ModelResource
{
    protected string $model = Tag::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Tags/Tags.Tags');
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Tags/TagResource.name'), 'name')->required(),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/tag-resource/index-page');
    }
}
