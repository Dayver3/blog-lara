<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentChangeController extends Controller
{
    public function indexAction(Request $request)
    {

        $data['parents_com_id'] = 0;
        if(key_exists('parents_com_id',$request->all())){
            $data = $request->only(['comment_id', 'parents_com_id']);
        }else{
            $data = $request->only(['comment_id']);
            $data['parents_com_id']=0;
        }
        return view('commentChange', compact('data'));
    }


    public function commentChangeAction(Request $request)
    {
        $data = $request->only(['commentText', 'comment_id']);
        var_dump($data);
        Comment::updateComment($data);
        return view('adminMainMenu');
    }
    public function commentDeleteAction(Request $request)
    {
        //dd(1);
        $data = $request->only(['comment_id']);
        Comment::deleteComment($data);
        return \Response::redirectTo('/mainMenu');
    }
}
