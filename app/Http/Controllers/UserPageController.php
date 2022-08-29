<?php

namespace App\Http\Controllers;

class UserPageController extends Controller
{
    public function indexAction()
    {
        return view('userPage');
    }
}
