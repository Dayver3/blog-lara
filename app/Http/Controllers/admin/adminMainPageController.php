<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class adminMainPageController
{
    public function indexAction(Request $request)
    {
        var_dump($request->all());
        if(Auth::guard('admin')){
            echo'your adm';
            return view('adminMainMenu');
        }
        echo'your not adm';
        return view('adminMainMenu');
        if (Auth::check()) {
            $datum = Post::getPostData();
var_dump($datum);
            return view('mainPage', compact('datum'))->render();
        } else {
            echo'plz login';
            return view('login');
        }
    }
}
