<?php

namespace App\DTOs;

class UserData
{ public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $manualGender;

    public function __construct(string $name, string $email, ?string $manualGender = null)
    {
        $names              = explode(' ', trim($name));
        $this->firstName    = $names[0];
        $this->lastName     = implode(' ', array_slice($names, 1));
        $this->email        = $email;
        $this->manualGender = $manualGender;
    }
}
