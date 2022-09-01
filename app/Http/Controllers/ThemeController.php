<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThemeController extends Controller
{
    public function indexAction(Request $request)
    {
        var_dump($request->session());
        if (!Auth::check()) {
            $post_id = $request->only(['id']);
            $comDatum = Comment::getComments($post_id);
            $datum = Post::getPostById($post_id);
            Comment::$datum = Comment::getCommentArray($post_id);
            Comment::getComment(0, 0);
            $comDatum = Comment::$finalArr;
            //var_dump($comDatum);
            //return view('theme')->with('datum','commentDatum');
            return view('theme', ['datum' => $datum, 'comDatum' => $comDatum])->render();
            //var_dump(['datum' => $datum]);
        }else{
            echo'Пожалуйста залогинтесь';
            return view('login');
        }
    }

}
