<?php

declare(strict_types=1);

namespace App\Providers;


use App\Helpers\Constants;
use App\Models\Hotel;
use App\MoonShine\Resources\FeatureResource;
use App\MoonShine\Resources\FloorResource;
use App\MoonShine\Resources\HotelResource;
use App\MoonShine\Resources\MoonshineUserResource;
use App\MoonShine\Resources\TagResource;
use App\MoonShine\Resources\TopicResource;
use Illuminate\Http\Request;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
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
            ])
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => 'Hotels',
                new HotelResource()
            ),

            MenuItem::make(
                static fn() => 'Floors',
                new FloorResource()
            ),

            MenuItem::make(
                static fn() => 'Tags',
                new TagResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => 'Features',
                new FeatureResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => 'Topics',
                new TopicResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id !== Constants::ROLES['Developer'];
                }),
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
