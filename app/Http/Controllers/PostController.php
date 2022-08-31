<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class PostController extends Controller
{
    public function indexAction()
    {
        return view('post');

    }

    public function postAction(Request $request)
    {
        var_dump($data = $request->only(['postTitle', 'postText']));
        $data = $request->only(['postTitle', 'postText']);
        $data['user_id'] = session('user_id');
        var_dump(session('user_id'));
        Post::create($data);
        var_dump(session()->all());
        return view('mainMenu');
    }
}
