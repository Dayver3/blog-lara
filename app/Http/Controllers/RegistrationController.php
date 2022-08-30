<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function indexAction()
    {
        return view('registration');
    }

    public function registrationAction(RegistrationRequest $registrationRequest)
    {
        //User::registrationUser();
        $data = $registrationRequest->only(['login', 'nickname', 'email', 'phone_number', 'address']);
        $data['password'] = $registrationRequest->getPasswordHash();
        $check = User::checkUser($data);
        if ($check === "email") {
            echo ' Введите другой email';
            return view('registration');
        } elseif ($check === "phone_number") {
            echo ' Введите другой phone_number';
            return view('registration');
        } elseif ($check === "nickname") {
            echo ' Введите другой nickname';
            return view('registration');
        } else {
            User::create($data);
            return view('mainMenu');
        }
    }
}
