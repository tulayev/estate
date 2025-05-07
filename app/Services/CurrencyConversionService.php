<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

interface ICurrencyConversionService
{
    public function convertWithSymbol(float $amount): array;
}

class CurrencyConversionService implements ICurrencyConversionService
{
    public function convertWithSymbol(float $amount): array
    {
        $country = $this->getUserCountry();
        $currency = $this->getCurrencyCode($country);
        $symbol = $this->getCurrencySymbol($currency);
        $converted = $this->convert($amount, 'THB', $currency);

        return [
            'value' => $converted,
            'symbol' => $symbol,
            'currency' => $currency,
        ];
    }

    private function getUserCountry(): string
    {
        $ip = request()->ip();
        $country = Cache::remember("geo_country_{$ip}", 3600, function () use ($ip) {
            $response = Http::get("http://ip-api.com/json/{$ip}?fields=countryCode");
            return $response->json('countryCode') ?? 'TH';
        });

        return $country;
    }

    private function getCurrencyCode(string $countryCode): string
    {
        return config("currencies.{$countryCode}.code", 'THB');
    }

    private function getCurrencySymbol(string $currencyCode): string
    {
        $currencies = config('currencies');

        foreach ($currencies as $data) {
            if ($data['code'] === $currencyCode) {
                return $data['symbol'];
            }
        }
        return '฿'; // fallback to THB
    }

    private function convert(float $amount, string $from = 'THB', string $to = null): float
    {
        $to = $to ?? $this->getCurrencyCode($this->getUserCountry());

        if ($from === $to) {
            return round($amount, 2);
        }

        $rates = Cache::remember("exchange_rates_{$from}", 3600, function () use ($from) {
            $apiKey = env('EXCHANGE_RATE_API_KEY');
            $url = "https://v6.exchangerate-api.com/v6/{$apiKey}/latest/{$from}";
            $response = Http::get($url);
            return $response->json('conversion_rates');
        });

        return $amount * ($rates[$to] ?? 1);
    }
}
