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
        $result=null;
        $result = DB::select('select * from users where nickname=:nickname or email=:email or phone_number=:phone_number ', ['nickname' => $user['nickname'], 'email' => $user['email'], 'phone_number' => $user['phone_number']]);
        if ($result==true) {
            if ($user['nickname'] === $result[0]->nickname) {
                return 'nickname';
            } elseif ($user['email'] === $result[0]->email) {
                return 'email';
            } elseif ($user['phone_number'] === $result[0]->phone_number) {
                return 'phone_number';
            } else {
                return 1;
            }
        }
    }

    public static function registrationUser()
    {

    }
}
