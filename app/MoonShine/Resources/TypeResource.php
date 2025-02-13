<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Type;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Type>
 */
#[Icon('heroicons.list-bullet')]
class TypeResource extends ModelResource
{
    protected string $model = Type::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Types/Types.Types');
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make(__('Moonshine/Types/TypeResource.name'), 'name')->required(),
            ]),
        ];
    }

    /**
     * @param Type $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/type-resource/index-page');
    }
}
