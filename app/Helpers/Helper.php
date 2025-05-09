<?php

namespace App\Helpers;

use App\Services\ICurrencyConversionService;

class Helper
{
    public static function splitString($value, $separator = ','): array | null
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

    public static function getClientCurrency(): string
    {
        $service = app(ICurrencyConversionService::class);

        return $service->getClientCurrency();
    }
}
