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
    // 第一引数は同一テーブルで自身のテーブルの為(self::class)
    // 第二引数は中間テーブル
    // 第三引数は自分の(following_id)外部キー
    // 第四引数は相手の(followed _id)外部キー
        return $this->belongsToMany(self::class, 'follows','following_id','followed_id');
    }
    //リレーションの相方
    // 第一引数は同一テーブルで自身のテーブルの為(self::class)
    // 第二引数は中間テーブル
    // 第三引数は相手の(followed _id)外部キー
    // 第四引数は自分の(following_id)外部キー
    public function followers(){
        return $this->belongsToMany(self::class, 'follows', 'followed_id','following_id');
    }

    // // フォローしているか判断
    // public function isFollowing($user_id){
    //     return (boolean) $this->follows()->where('followeing_id',$user_id)->first();
    // }
    // //フォローされているか判断
    // public function isFollowed ($user_id){
    //     return (boolean) $this->followers()->where('followed_id', $user_id)->first(['follows.id']);
    // }
}
