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
use MoonShine\Fields\Color;
use App\Helpers\Constants;

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

                Text::make(__('Moonshine/Tags/TagResource.name'), 'name')
                    ->required()
                    ->disabled(function($item = null) {
                        return $item && $item->id && in_array($item->id, array_values(Constants::SYSTEM_TAG_IDS));
                    })
                    ->hint(__('Moonshine/Tags/TagResource.system_tag_hint')),

                Color::make(__('Moonshine/Tags/TagResource.color_ui_tag'), 'color_ui_tag')
                    ->nullable()
                    ->default('#FFFFFF')
                    ->hint(__('Moonshine/Tags/TagResource.color_hint')),
                
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        $rules = [
            'color_ui_tag' => 'nullable|string|max:50',
        ];
        
        // For system tags, add a custom validation rule for the name field
        // that ensures the name hasn't changed from its original value
        if ($item->exists && in_array($item->id, array_values(Constants::SYSTEM_TAG_IDS))) {
            $originalTag = Tag::find($item->id);
            
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($originalTag) {
                    if ($value !== $originalTag->name) {
                        $fail('The name of system tags cannot be changed.');
                    }
                }
            ];
        } else {
            $rules['name'] = 'required|string|max:255';
        }
        
        return $rules;
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/tag-resource/index-page');
    }
    
    public function beforeSave(Model $item): Model
    {
        // If this is an update to a system tag, preserve the original name
        if ($item->exists && in_array($item->id, array_values(Constants::SYSTEM_TAG_IDS))) {
            // Force-reload the original tag from the database (without any cached values)
            $originalTag = Tag::where('id', $item->id)->first();
            if ($originalTag) {
                // Reset the name back to the original, ensuring it can't be changed
                $item->name = $originalTag->name;
                
                // If using translatable package, make sure to preserve all translations too
                if (method_exists($item, 'getTranslations')) {
                    $item->setTranslations('name', $originalTag->getTranslations('name'));
                }
            }
        }
        
        return $item;
    }
}
