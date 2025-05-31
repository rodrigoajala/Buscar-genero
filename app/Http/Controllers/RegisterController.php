<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Services\UserRegistrationService;
use App\DTOs\UserData;

class RegisterController extends Controller
{
    protected UserRegistrationService $userService;

    public function __construct(UserRegistrationService $userService)
    {
        $this->userService = $userService;
    }

    public function showForm()
    {
        return view('register');
    }

    public function submit(UserRequest $request)
    {
        $dto = new UserData(
            name: $request->input('name'),
            email: $request->input('email'),
            manualGender: $request->input('manual_gender')
        );

        $result = $this->userService->register($dto);


        if (!empty($result['require_gender'])) {
            return view('register-gender', [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
            ]);
        }

        return "Usuário registrado com sucesso!";
    }
}
