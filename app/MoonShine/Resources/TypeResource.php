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
use MoonShine\Fields\Color;
use App\Helpers\Constants;

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

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Types/TypeResource.name'), 'name')
                    ->required()
                    ->disabled(function($item = null) {
                        return $item && $item->id && in_array($item->id, array_values(Constants::SYSTEM_TYPE_IDS));
                    })
                    ->hint(__('Moonshine/Types/TypeResource.system_type_hint')),

                Color::make(__('Moonshine/Types/TypeResource.color_ui_tag'), 'color_ui_tag')
                    ->nullable()
                    ->default('#FFFFFF')
                    ->hint(__('Moonshine/Types/TypeResource.color_hint')),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        $rules = [
            'color_ui_tag' => 'nullable|string|max:50',
        ];
        
        // For system types, add a custom validation rule for the name field
        // that ensures the name hasn't changed from its original value
        if ($item->exists && in_array($item->id, array_values(Constants::SYSTEM_TYPE_IDS))) {
            $originalType = Type::find($item->id);
            
            $rules['name'] = [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) use ($originalType) {
                    if ($value !== $originalType->name) {
                        $fail('The name of system types cannot be changed.');
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
        return url('/admin/resource/type-resource/index-page');
    }
    
    public function beforeSave(Model $item): Model
    {
        // If this is an update to a system type, preserve the original name
        if ($item->exists && in_array($item->id, array_values(Constants::SYSTEM_TYPE_IDS))) {
            // Force-reload the original type from the database (without any cached values)
            $originalType = Type::where('id', $item->id)->first();
            if ($originalType) {
                // For translatable fields (using Spatie's HasTranslations trait)
                if (method_exists($item, 'getTranslations') && method_exists($originalType, 'getTranslations')) {
                    // Get all translations from the original type
                    $originalTranslations = $originalType->getTranslations('name');
                    
                    // Set all translations back to the original values
                    $item->setTranslations('name', $originalTranslations);
                } else {
                    // For non-translatable setup, just set the name directly
                    $item->name = $originalType->name;
                }
            }
        }
        
        return $item;
    }
}
