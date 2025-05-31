<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class CountryService
{
    public function getCountryCode()
    {
        try {
            $response = Http::get("https://freeipapi.com/api/json/");
            if ($response->ok()) {
                return $response->json('countryCode') ?? 'N/A';
            }
        } catch (\Throwable $e) {
            Log::error('Erro ao obter país: ' . $e->getMessage());
        }

        return 'N/A';

    }

}
