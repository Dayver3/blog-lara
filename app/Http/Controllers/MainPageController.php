<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class MainPageController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function indexAction()
    {
        if (!Auth::check()) {
            $datum = Post::getPostData();

            return view('mainPage', compact('datum'))->render();
        } 
        else 
        {
            
            echo'plz login';
            return view('login');
        }
    }
}
