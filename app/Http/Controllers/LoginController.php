<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function indexAction()
    {
        return view('login');

    }

    public function loginAction(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return view('mainMenu');
        } else {
            echo 'Введите правильный логин и пароль';
            return view('login');
        }

    }
}
