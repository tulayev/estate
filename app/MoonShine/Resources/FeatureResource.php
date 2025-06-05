<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;
use MoonShine\Attributes\Icon;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;

/**
 * @extends ModelResource<Feature>
 */
#[Icon('heroicons.circle-stack')]
class FeatureResource extends ModelResource
{
    protected string $model = Feature::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Features/Features.Features');
    }

    public function indexFields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Features/FeatureResource.name'), 'name')->required(),
            ]),
        ];
    }

    public function detailFields(): array
    {
        return [
            ID::make(),

            Text::make(__('Moonshine/Features/FeatureResource.name'), 'name'),
        ];
    }

    public function formFields(): array
    {
        return [
            ID::make()->sortable(),

            Text::make(__('Moonshine/Features/FeatureResource.name'), 'name')->required(),
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
        return url('/admin/resource/feature-resource/index-page');
    }
}
