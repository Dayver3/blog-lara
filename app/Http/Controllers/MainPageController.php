<?php

namespace App\Http\Controllers;

use App\Models\Post;

class MainPageController extends Controller
{
    public function indexAction()
    {
        $datum=Post::getPostData();
        var_dump($datum);
       // return view('mainMenu');
       return view('mainPage',compact('datum'))->render();
    }
}
