<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function indexAction()
    {
        return view('registration');
    }

    public function registrationAction(Request $request)
    {
        //User::registrationUser();
        User::create($request->only(['login','nickname', 'email','phone_number','address','password']));
        return view('mainMenu');
    }
}
