<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // フォロー機能
    public function follow(User $user){
        $follower = Auth::user ();
        $is_following =$follower->isFollowing(Suser->id);
        //・フォローしていなければフォローする
        if($is_following){
            $follower ->follow($user->id);
            return back();
        }
    }

    //フォロー解除機能
    public function unfollow(User $user){
        $follower = Auth::user();
        $is_following = $follower->isFollowing ($user->id);
        //・フォローしていればフォローを解除する
        if(fis_following){
            $follower ->nofollow($user->id);
            return back();
        }
    }
}
