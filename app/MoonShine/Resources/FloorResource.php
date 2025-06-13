<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Helpers\Constants;
use App\Helpers\Enums\UserRole;
use App\Helpers\Helper;
use App\Services\IFileUploadService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Floor;
use Illuminate\Http\UploadedFile;
use MoonShine\Attributes\Icon;
use MoonShine\Decorations\Block;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Text;
use MoonShine\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;

/**
 * @extends ModelResource<Floor>
 */
#[Icon('heroicons.outline.home')]
class FloorResource extends ModelResource
{
    protected string $model = Floor::class;
    protected bool $withPolicy = true;

    public function title(): string
    {
        return __('Moonshine/Floors/Floors.Floors');
    }

    public function query(): \Illuminate\Contracts\Database\Eloquent\Builder
    {
        if (Helper::isUserInRole(UserRole::Developer)) {
            return parent::query()
                ->whereHas('hotel', fn($q) =>
                    $q->where('created_by', auth()->user()->id));
        }

        return parent::query();
    }

    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),

                Text::make(__('Moonshine/Floors/FloorResources.floor'), 'floor')
                    ->required(),

                $this->getHotelsDropdown()
                    ->searchable()
                    ->required()
                    ->sortable(),

                Number::make(__('Moonshine/Floors/FloorResources.bedrooms'), 'bedrooms')
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.bathrooms'), 'bathrooms')
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.area'), 'area')
                    ->step(0.01)
                    ->required(),

                Number::make(__('Moonshine/Floors/FloorResources.price'), 'price')
                    ->required()
                    ->min(0)
                    ->step(0.001),

                Image::make(__('Moonshine/Floors/FloorResources.image'), 'image')
                    ->disk(Constants::PUBLIC_DISK)
                    ->dir(Constants::HOTELS_UPLOAD_PATH)
                    ->customName(fn(UploadedFile $file, Field $field) =>
                        Helper::generateFileNameForUploadedFile($file))
                    ->allowedExtensions(['png', 'jpg', 'jpeg'])
                    ->removable(),

                Text::make(__('Moonshine/Floors/FloorResources.image'), 'image_url'),
            ])
        ];
    }

    public function rules(Model $item): array
    {
        return [
            'floor' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'image_url' => 'nullable|string',
            'bedrooms' => 'required|integer|min:0',
            'bathrooms' => 'required|integer|min:0',
            'area' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'price' => 'required|numeric|min:0|max:9999999999.999|regex:/^\d+(\.\d{1,3})?$/',
            'hotel_id' => 'required|exists:hotels,id',
        ];
    }

    public function redirectAfterSave(): string
    {
        return url('/admin/resource/floor-resource/index-page');
    }

    protected function afterCreated(Model $item): Model
    {
        $basePath = Constants::HOTELS_UPLOAD_PATH . '/' . $item->hotel_id;
        app(IFileUploadService::class)->move($item, $basePath, 'image', null, 'floors');

        return $item;
    }

    protected function afterUpdated(Model $item): Model
    {
        $basePath = Constants::HOTELS_UPLOAD_PATH . '/' . $item->hotel_id;
        app(IFileUploadService::class)->move($item, $basePath, 'image', null, 'floors');

        return $item;
    }

    private function getHotelsDropdown(): BelongsTo
    {
        $hotelsDropdown = BelongsTo::make(__('Moonshine/Floors/FloorResources.object'), 'hotel', 'title', resource: new HotelResource());

        return Helper::isUserInRole(UserRole::Developer)
            ? $hotelsDropdown->valuesQuery(fn (Builder $query, Field $field) => $query->where('created_by', auth()->user()->id))
            : $hotelsDropdown;
    }
}
