<?php

namespace App\Helpers;

use App\Helpers\Enums\UserRole;
use App\Services\ICurrencyConversionService;
use Illuminate\Http\UploadedFile;

class Helper
{
    public static function splitString(string $value, string $separator = ','): ?array
    {
        if ($value) {
            return explode($separator, $value);
        }

        return  null;
    }

    public static function getCurrencyConvertedValue(float $value): array
    {
        $service = app(ICurrencyConversionService::class);

        return $service->convertWithSymbol($value);
    }

    public static function getClientCurrency(?string $currency): string
    {
        $service = app(ICurrencyConversionService::class);

        return $service->getClientCurrency($currency);
    }

    public static function maskEmail(string $email): string
    {
        [$name, $domain] = explode('@', $email);

        $visible = strlen($name) >= 3 ? 3 : 1;
        $masked = substr($name, 0, $visible) . str_repeat('*', max(0, strlen($name) - $visible));

        return $masked . '@' . $domain;
    }

    public static function removeHtmlTags(string $html): string
    {
        return html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }

    public static function generateFileNameForUploadedFile(UploadedFile $file): string
    {
        return pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . now()->format('YmdHis') . '.' . $file->extension();
    }

    public static function isUserInRole(UserRole $role): bool
    {
        return auth()->check() && auth()->user()->moonshine_user_role_id === $role->value;
    }

    public static function resolveImagePath(string | null $imagePath): ?string
    {
        if ($imagePath === null) {
            return null;
        }

        return asset('storage/' . $imagePath);
    }
}
