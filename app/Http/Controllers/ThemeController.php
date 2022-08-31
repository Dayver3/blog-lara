<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
class ThemeController extends Controller
{
public function indexAction(Request $request){
    $post_id=$request->only(['id']);
    $datum =Post::getPostById($post_id);
   return view('theme',compact('datum'))->render();
}
}
