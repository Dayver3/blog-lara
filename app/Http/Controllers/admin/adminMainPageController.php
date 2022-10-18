<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 *
 */
class adminMainPageController extends Controller
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        $datum = Post::getPostData();
        return view('adminMainPage', ['datum' => $datum])->render();

    }
    public function deleteAction(Request $request)
    {
        $post_id = $request->only('post_id');
        Post::deletePost($post_id);
        return view('adminMainMenu');
    }
}
