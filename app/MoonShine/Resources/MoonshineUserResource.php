<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;


use MoonShine\Attributes\Icon;
use MoonShine\Models\MoonshineUser;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<MoonshineUser>
 */
#[Icon('heroicons.outline.users')]
class MoonshineUserResource extends \MoonShine\Resources\MoonShineUserResource
{
    protected bool $withPolicy = true;
}
