<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

use MoonShine\Attributes\Icon;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Contact>
 */
#[Icon('heroicons.phone')]
class ContactResource extends ModelResource
{
    protected string $model = Contact::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return 'Contacts';
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Role', 'role'),
                Text::make('Full name', 'full_name'),
                Text::make('Phone', 'phone'),
                Text::make('Email', 'email'),
            ]),
        ];
    }

    /**
     * @param Contact $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [
            'role' => 'required|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20|regex:/^\+?[0-9\-\(\)\s]+$/',
            'email' => 'nullable|email|max:255',
        ];
    }
}
