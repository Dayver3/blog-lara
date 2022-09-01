<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomePageController extends Controller
{
    public function indexAction()
    {
        if (!Auth::check()) {
            return view('homePage');

        } else {
            echo 'plz login';
            return view('login');
        }

    }
}
