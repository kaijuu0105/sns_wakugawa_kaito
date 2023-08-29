<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follows(){
    //belongsToManyはリレーションの多対多を使用
        return $this->belongsToMany (User::class, 'follows','following id', 'followed id');
    }
    //リレーションの相方
    public function followers(){
        return $this->belongsToMany (User::class, 'followers', 'following_id', 'followed_id');
    }

    // フォローしているか判断
    public function isFollowing($user_id){
        return (boolean) $this->follows()->where('followed id',$user_id)->first();
    }
    //フォローされているか判断
    public function isFollowed ($user_id){
        return (boolean) $this->followers()->where('following_id', $user_id)->first(['follows.id']);
    }
}
