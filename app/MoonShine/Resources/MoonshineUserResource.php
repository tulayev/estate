<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use App\Helpers\Constants;
use App\Helpers\Enums\UserRole;
use Illuminate\Database\Eloquent\Builder;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Date;
use MoonShine\Fields\Email;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Password;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Models\MoonshineUser;
use MoonShine\Resources\ModelResource;
use MoonShine\Resources\MoonShineUserRoleResource;

/**
 * @extends ModelResource<MoonshineUser>
 */
#[Icon('heroicons.outline.users')]
class MoonshineUserResource extends \MoonShine\Resources\MoonShineUserResource
{
    protected bool $withPolicy = true;

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make(__('moonshine::ui.resource.main_information'), [
                        ID::make()
                            ->sortable()
                            ->showOnExport(),

                        BelongsTo::make(
                            __('moonshine::ui.resource.role'),
                            'moonshineUserRole',
                            resource: new MoonShineUserRoleResource(),
                        )->valuesQuery(fn (Builder $query, Field $field) => $query->where('id', '<>', UserRole::Admin->value))
                            ->badge('purple')
                            ->required(),

                        Text::make(__('moonshine::ui.resource.name'), 'name')
                            ->required()
                            ->showOnExport(),

                        Image::make(__('moonshine::ui.resource.avatar'), 'avatar')
                            ->showOnExport()
                            ->disk(config('moonshine.disk', 'public'))
                            ->dir('moonshine_users')
                            ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif']),

                        Date::make(__('moonshine::ui.resource.created_at'), 'created_at')
                            ->format("d.m.Y")
                            ->default(now()->toDateTimeString())
                            ->sortable()
                            ->hideOnForm()
                            ->showOnExport(),

                        Email::make(__('moonshine::ui.resource.email'), 'email')
                            ->sortable()
                            ->showOnExport()
                            ->required(),
                    ]),

                    Tab::make(__('moonshine::ui.resource.password'), [
                        Heading::make(__('moonshine::ui.resource.change_password')),

                        Password::make(__('moonshine::ui.resource.password'), 'password')
                            ->customAttributes(['autocomplete' => 'new-password'])
                            ->hideOnIndex()
                            ->hideOnDetail()
                            ->eye(),

                        PasswordRepeat::make(__('moonshine::ui.resource.repeat_password'), 'password_repeat')
                            ->customAttributes(['autocomplete' => 'confirm-password'])
                            ->hideOnIndex()
                            ->hideOnDetail()
                            ->eye(),
                    ]),
                ]),
            ]),
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/moonshine-user-resource/index-page');
    }
}
