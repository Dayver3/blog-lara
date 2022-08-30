<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
class Post extends Model
{
    protected $fillable = [
        'postTitle',
        'postText',
        'user_id'
    ];


}
