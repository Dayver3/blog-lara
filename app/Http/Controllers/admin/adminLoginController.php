<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class adminLoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function adminLoginAction(Request $request)
    {
        if (Auth::guard('admin')->attempt($request->only(['email', 'password']))) {
            $user_id = User::getUserId($request->only(['email']));
            $request->session()->put('user_id', $user_id[0]->user_id,);
            //$user = auth()->guard('admin')->user();
            return view('adminMainMenu');
        } else {
            echo 'non-admin';
            return view('login');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexAdminAction(Request $request)
    {

        return view('adminLogin');
    }

}
