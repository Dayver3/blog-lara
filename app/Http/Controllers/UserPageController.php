<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserPageController extends Controller
{
    public function indexAction()
    {
        return view('userPage');
    }
}
