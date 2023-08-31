<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Follow extends Model
{
     //フォローしている数をカウント
     public function getFollowCount ($user_id){
     // 引数で渡された$user_idがfollowing_id内に居たらカウント
         return $this->where('following_id',$user_id)->count () ;
    }
     // フォローされている数をカウント
     public function getFollowerCount ($user_id){
     // 引数で渡された$user_idがfollowed_id内に居たらカウント
         return $this->where('followed_id',$user_id)->count ();
    }
}
