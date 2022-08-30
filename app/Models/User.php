<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Barryvdh\LaravelIdeHelper\Eloquent;
use http\Env\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

/**
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'nickname',
        'email',
        'phone_number',
        'address',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkUser($user)
    {
        $exists = User::orWhere(['nickname' => $user['nickname'], 'email' => $user['email'], 'phone_number' => $user['phone_number']])->exists();
        return $exists;
    }


    public
    static function getUserId($user)
    {
        $result = DB::select('select user_id from users where  email=:email  ', ['email' => $user['email']]);
        return $result;
    }

}
