<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use MoonShine\Attributes\Icon;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;

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
        return __('Moonshine/Contacts/Contacts.contacts_list');
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Text::make('Role', 'role'),
                Text::make('Full name', 'full_name'),
                Text::make('Phone', 'phone'),
                Text::make('Email', 'email'),
                Text::make('Note', 'note'),
                BelongsToMany::make('Objects', 'hotels', 'title', resource: new HotelResource())
                    ->selectMode()
                    ->inLine('|'),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'role' => 'required|string|max:255',
            'full_name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20|regex:/^\+?[0-9\-\(\)\s]+$/',
            'email' => 'nullable|email|max:255',
            'note' => 'nullable|string|max:1000',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/contact-resource/index-page');
    }

    public function search(): array
    {
        return ['full_name', 'phone', 'email'];
    }
}
