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
            $user_id=User::getUserId($request->only(['email']));
            $request->session()->put('user_id',$user_id[0]->user_id,);
//            if(User::userAccess($request->only('email'))) {
//                Auth::guard('admin')->login($user);
//            }
            return view('mainMenu');
        } else {
            echo 'Введите правильный логин и пароль';
            return view('login');
        }

    }
}
