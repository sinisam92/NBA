<?php

namespace App;

use App\News;
use App\Comment;
use App\VerifyUser;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    const VALIDATION_RULES = [
        'name' => 'required | min:3 | max:50',
        'email' => 'required | email | max:100',
        'password' => 'required | min:8 | confirmed'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function verifyUser()
    {
        return $this->hasOne(VerifyUser::class);
    }
    public function news()
    {
        return $this->hasMany(News::class, 'user_id');
    }
}
