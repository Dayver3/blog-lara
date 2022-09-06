<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeleteThemeRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminThemeController extends Controller
{
    public function indexAction(Request $request)
    {
        if (!Auth::check()) {
            $post_id = $request->only(['id']);
            $comDatum = Comment::getComments($post_id);
            $datum = Post::getPostById($post_id);
            Comment::$datum = Comment::getCommentArray($post_id);
            Comment::getComment(0, 0);
            $comDatum = Comment::$finalArr;
            //var_dump($comDatum);
            //return view('theme')->with('datum','commentDatum');

            return view('adminTheme', ['datum' => $datum, 'comDatum' => $comDatum])->render();
        }
    }
    public function deleteAction(Request $request)
    {
        var_dump($request);
        echo '1';
        $post_id = $request->only('post_id');
        Post::deletePost($post_id);
        return view('adminMainMenu');
    }


}
