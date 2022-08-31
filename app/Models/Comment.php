<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment_id ',
        'user_id',
        'commentText',
        'parents_com_id'
    ];

}
