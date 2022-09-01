<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function indexAction()
    {
        if (!Auth::check()) {
            return view('post');
        } else {
            echo 'plz login';
            return view('login');
        }
    }


    public
    function postAction(Request $request)
    {

        $data = $request->only(['postTitle', 'postText']);
        $data['user_id'] = session('user_id');
        Post::create($data);
        return view('mainMenu');

    }
}
