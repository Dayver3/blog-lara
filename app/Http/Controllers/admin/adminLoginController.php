<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminLoginController
{
    public function adminLoginAction(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            $user_id = User::getUserId($request->only(['email']));
            $request->session()->put('user_id', $user_id[0]->user_id,);
            //$user = auth()->guard('admin')->user();
            echo 'admin';
            return view('adminMainMenu');
        } else {
            echo 'non-admin';
            return view('adminLogin');
        }
    }

    public function indexAdminAction(Request $request)
    {

        return view('adminLogin');
    }

}
