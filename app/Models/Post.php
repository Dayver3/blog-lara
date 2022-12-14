<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

/**
 *
 */
class Post extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'postTitle',
        'postText',
        'user_id'
    ];

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getPostData()
    {
        //$dat::Db::table('posts');
        $datum = DB::table('posts')->select('postTitle', 'post_id')->get();
        return $datum;
    }

    /**
     * @param $post_id
     * @return \Illuminate\Support\Collection
     */
    public static function getPostById($post_id)
    {
        $datum = DB::table('posts')->select('postText', 'postTitle', 'created_at', 'post_id')->where('post_id', $post_id)->get();
        return $datum;

    }

    public static function deletePost($post_id){
        echo 1;
        $res=DB::table('posts')->where('post_id',$post_id)->delete();
        return 1;
    }

}
