<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
class ThemeController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|string
     */
    public function indexAction(Request $request)
    {
        if (!Auth::check()) {
            $post_id = $request->only(['id']);
            $comDatum = Comment::getComments($post_id);
            $datum = Post::getPostById($post_id);
            Comment::$datum = Comment::getCommentArray($post_id);
            Comment::getComment(0, 0);
            $comDatum = Comment::$finalArr;
            return view('theme', ['datum' => $datum, 'comDatum' => $comDatum])->render();
            //var_dump(['datum' => $datum]);
        } 
        else 
        {
            
            
            echo 'Пожалуйста залогинтесь';
            return view('login');
        }
    }

}
