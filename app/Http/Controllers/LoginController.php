<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class LoginController extends Controller
{
    /**
     *
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexAction()
    {
        return view('login');

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function loginAction(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            $user_id = User::getUserId($request->only(['email']));
            $request->session()->put('user_id', $user_id[0]->user_id,);
//            if(User::userAccess($request->only('email'))) {
//                Auth::guard('user');
//                echo ' 4545454';
//            }
            if (Auth::guard('web')) {
            }
            return view('mainMenu');
        } else {
            echo 'plz login';
            return view('login');}

    }




}
