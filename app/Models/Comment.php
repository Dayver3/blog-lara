<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    static public $datum;
    static public $finalArr=[];

    protected $fillable = [
        'comment_id ',
        'user_id',
        'post_id',
        'commentText',
        'parents_com_id'
    ];
public static function getComments($post_id){
    $data=DB::table('comments')->select('comment_id','post_id','parents_com_id','commentText','created_at')->where('post_id',$post_id)->get();
return $data;
}
    static function getCommentArray($post_id)
    {
        $post_id = $_GET['id'];
        $datum = DB::table('comments')->where('post_id',$post_id)->get();
        $data = [];
        foreach ($datum as $value) {
            $data[$value->parents_com_id][] = $value;
        }
        return $data;

    }
    static function getComment($parents_id, $level)
    {
        //var_dump(self::$datum[$parents_id]);
        if (isset(self::$datum[$parents_id]))
            foreach (self::$datum[$parents_id] as $value) {
                // echo "<form action='/comment/index/?id='.$data->post_id.'&parents_com_id='.'$datum->parents_com_id' method='post'>";
                $value->level = $level;
                self::$finalArr[] = $value;
                $level++;
                self::getComment($value->comment_id, $level);
                $level--;

            }
        return self::$finalArr;
    }
}
