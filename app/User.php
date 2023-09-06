<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
// use App\Http\Contorollers\FollowController;

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
        // ddd(isFollowing);
    }

    // フォローしているか判断
    public function isFollowing(Int $user_id){
        // $thisでfollowsメソッドを呼び出し、メソッド内で作った中間テーブルの中で条件指定
        // where()引数に注目　ログインユーザーではなく$user_idさんが何をされているのか
        //exists()でデータを返す
        return (bool) $this->follows()->where('followed_id',$user_id)->exists();
    }
    //フォローされているか判断
    public function isFollowed(Int $user_id){
        // $thisでfollowsメソッドを呼び出し、メソッド内で作った中間テーブルの中で条件指定
        // where()引数に注目　ログインユーザーではなく$user_idさんが何をされているのか
        //exists()でデータを返す
        return (boolean) $this->followers()->where('following_id', $user_id)->exists();
    }

    //フォローしている数をカウント
    public function getFollowCount($user_id){
    // 引数で渡された$user_idがfollowing_id内に居たらカウント
        return $this->where('following_id',$user_id)->count () ;
    }
    // フォローされている数をカウント
    public function getFollowerCount($user_id){
    // 引数で渡された$user_idがfollowed_id内に居たらカウント
        return $this->where('followed_id',$user_id)->count ();
    }

    //フォロー機能メソッド
    public function follow(Int $user_id){
        // dd(follow);
        return $this->follows()->attach($user_id);
    }

    //フォロー解除機能メソッド
    public function unfollow(Int $user_id){
        return $this->follows()->detach($user_id);
        // dd($user_id);
    }


}
