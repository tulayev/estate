<?php

declare(strict_types=1);

namespace App\Providers;


use App\MoonShine\Resources\HotelResource;
use App\MoonShine\Resources\MoonshineUserResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonshineUserResource()
                ),
//                MenuItem::make(
//                    static fn() => __('moonshine::ui.resource.role_title'),
//                    new MoonShineUserRoleResource()
//                ),
            ]),

            MenuItem::make(
                static fn() => 'Hotels',
                new HotelResource()
            ),
//            MenuItem::make('Documentation', 'https://moonshine-laravel.com/docs')
//                ->badge(fn() => 'Check')
//                ->blank(),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
