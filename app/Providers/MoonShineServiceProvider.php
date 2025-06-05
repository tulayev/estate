<?php

declare(strict_types=1);

namespace App\Providers;


use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use App\MoonShine\Resources\ContactResource;
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

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

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
                    return Helper::isUserInRole(UserRole::Admin);
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
                    return Helper::isUserInRole(UserRole::Admin);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Tags/Tags.Tags'),
                new TagResource()
            )
                ->canSee(function (Request $request) {
                    return Helper::isUserInRole(UserRole::Admin);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Features/Features.Features'),
                new FeatureResource()
            )
                ->canSee(function (Request $request) {
                    return Helper::isUserInRole(UserRole::Admin);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Locations/Locations.Locations'),
                new LocationResource()
            )
                ->canSee(function (Request $request) {
                    return Helper::isUserInRole(UserRole::Admin);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Topics/Topics.Topics'),
                new TopicResource()
            )
                ->canSee(function (Request $request) {
                    return !Helper::isUserInRole(UserRole::Developer);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/TopicCategories/TopicCategories.TopicCategories'),
                new TopicCategoryResource()
            )
                ->canSee(function (Request $request) {
                    return Helper::isUserInRole(UserRole::Admin);
                }),

            MenuItem::make(
                static fn() => __('Moonshine/Contacts/Contacts.contacts_list'),
                new ContactResource()
            )
                ->canSee(function (Request $request) {
                    return !Helper::isUserInRole(UserRole::Developer);
                }),
        ];
    }

    protected function theme(): array
    {
        return [];
    }
}
