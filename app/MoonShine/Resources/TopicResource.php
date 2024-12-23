<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Topic;

use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Image;
use MoonShine\Fields\Relationships\BelongsTo;
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

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        $activeField = auth()->user()->moonshine_user_role_id === Constants::ROLES['Admin']
            ? Switcher::make('Published', 'active')
                ->default(true)
                ->sortable(function (Builder $query) {
                    $query->orderBy('created_at', 'desc');
                })
            : null;

        return [
            Block::make([
                ID::make()->sortable(),

                $activeField,

                Text::make('Title', 'title')
                    ->required(),

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
}