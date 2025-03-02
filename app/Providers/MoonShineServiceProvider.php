<?php

declare(strict_types=1);

namespace App\Providers;


use App\Helpers\Constants;
use App\MoonShine\Resources\FeatureResource;
use App\MoonShine\Resources\FloorResource;
use App\MoonShine\Resources\HotelResource;
use App\MoonShine\Resources\LocationResource;
use App\MoonShine\Resources\MoonshineUserResource;
use App\MoonShine\Resources\TagResource;
use App\MoonShine\Resources\TopicCategoryResource;
use App\MoonShine\Resources\TopicResource;
use App\MoonShine\Resources\TypeResource;
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
                static fn() => __('Moonshine/Objects/Objects.Objects'),
                new HotelResource()
            ),

            MenuItem::make(
                static fn() => __('Moonshine/Floors/Floors.Floors'),
                new FloorResource()
            ),

            MenuItem::make(
                static fn() => __('Moonshine/Types/Types.Types'),
                new TypeResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Tags/Tags.Tags'),
                new TagResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Features/Features.Features'),
                new FeatureResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => 'Locations',
                new LocationResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Topics/Topics.Topics'),
                new TopicResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id !== Constants::ROLES['Developer'];
                }),

            MenuItem::make(
                static fn() => __('Moonshine/TopicCategories/TopicCategories.TopicCategories'),
                new TopicCategoryResource()
            )
                ->canSee(function (Request $request) {
                    return $request->user('moonshine')?->moonshine_user_role_id === Constants::ROLES['Admin'];
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
