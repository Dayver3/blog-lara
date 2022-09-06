<?php

namespace App\Http\Controllers\admin;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/**
 *
 */
class adminMainPageController
{
    /**
     * @param Request $request
     * @return string
     */
    public function indexAction(Request $request)
    {
        var_dump($request->all());
        $datum = Post::getPostData();
        return view('adminMainPage', ['datum' => $datum])->render();

    }
}
