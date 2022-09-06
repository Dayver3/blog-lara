<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

/**
 *
 */
class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexAction(Request $request)
    {

        $data['parents_com_id'] = 0;
        if(key_exists('parents_com_id',$request->all())){
            $data = $request->only(['post_id', 'parents_com_id']);
        }else{
            $data = $request->only(['post_id']);
            $data['parents_com_id']=0;
        }
        return view('comment', compact('data'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function commentAction(Request $request)
    {
        $data = $request->only(['commentText', 'post_id', 'parents_com_id']);
        $data['user_id'] = session('user_id');
        Comment::create($data);
        return view('mainMenu');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function reFactorAction(Request $request){

    }
}
