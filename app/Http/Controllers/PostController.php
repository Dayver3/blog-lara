<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class PostController extends Controller
{
    public function indexAction()
    {
        return view('post');

    }

    public function postAction(Request $request)
    {
        var_dump($data = $request->only(['postTitle', 'postText']));
        $ID = $request->session()->getId();
        var_dump($ID);
        return view('mainMenu');
    }
}
