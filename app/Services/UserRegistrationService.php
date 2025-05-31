<?php

namespace App\Services;

use App\DTOs\UserData;
use App\Models\User;

class UserRegistrationService
{
    const GENDER_CONFIDENCE_THRESHOLD = 70;

    public function __construct(
        protected CountryService $countryService,
        protected GenderService $genderService
    ) {}

    public function register(UserData $data): array
    {
        $countryCode = $this->countryService->getCountryCode();

        $genderInfo = $this->genderService->detectGender($data->firstName, $countryCode);
        $gender     = $genderInfo['gender'];
        $accuracy   = $genderInfo['accuracy'];

        if ($accuracy < self::GENDER_CONFIDENCE_THRESHOLD && !$data->manualGender) {
            return ['require_gender' => true];
        }

        if ($data->manualGender) {
            $gender = $data->manualGender;
        }

        User::create([
            'first_name' => $data->firstName,
            'last_name' => $data->lastName,
            'email' => $data->email,
            'gender' => $gender,
            'country' => $countryCode,
        ]);

        return ['success' => true];
    }
}
