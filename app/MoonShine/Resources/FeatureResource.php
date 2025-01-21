<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Database\Eloquent\Model;
use App\Models\Feature;

use MoonShine\Attributes\Icon;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Feature>
 */
#[Icon('heroicons.circle-stack')]
class FeatureResource extends ModelResource
{
    protected string $model = Feature::class;

    protected string $title = 'Features';

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make('Name', 'name')->required(),

                Image::make('Icon', 'icon')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::UPLOAD_PATH)
                    ->allowedExtensions(['png', 'jpg', 'jpeg', 'svg'])
                    ->removable(),
            ]),
        ];
    }

    /**
     * @param Feature $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'icon' => 'nullable|image|max:2048',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/feature-resource/index-page');
    }
}
