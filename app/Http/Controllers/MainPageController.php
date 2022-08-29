<?php

namespace App\Http\Controllers;

class MainPageController extends Controller
{
    public function indexAction()
    {
        return view('mainMenu');
    }
}
