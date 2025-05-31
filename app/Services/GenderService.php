<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;

class GenderService
{
    public function detectGender(string $firstName, ?string $countryCode = null): array
    {
        $params = [
            'name' => $firstName,
            'key' => env('GENDER_API_KEY'),
        ];

        if ($countryCode) {
            $params['country'] = $countryCode;
        }

        $response = Http::get('https://gender-api.com/get', $params);

        if ($response->ok()) {
            $responseData = $response->json();


            return [
                'gender' => $responseData['gender'] ?? null,
                'accuracy' => $responseData['accuracy'] ?? 0,
            ];
        }

        return [
            'gender' => null,
            'accuracy' => 0,
        ];
    }

}
