<?php

namespace App\Http\Controllers;


use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


/**
 *
 */
class PostController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexAction()
    {
        if (!Auth::check()) 
        {
            return view('post');
        } 
        else 
        {  
            
            echo 'plz login';
            return view('login');
        }
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public
    function postAction(Request $request)
    {

        $data = $request->only(['postTitle', 'postText']);
        $data['user_id'] = session('user_id');
        Post::create($data);
        return view('mainMenu');

    }
}
