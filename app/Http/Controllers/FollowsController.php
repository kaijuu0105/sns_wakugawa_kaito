<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){
        return view('follows.followList');
    }
    public function followerList(){
        return view('follows.followerList');
    }

    // 一旦コメントアウト
    // // フォロー機能
    // public function follow(User $user){

    //     $follower = Auth::user ();
    //     $is_following = $follower->isFollowing($user->id);
    //     //・フォローしていなければフォローする
    //     if($is_following){
    //         $follower ->follow($user->id);
    //         return back();
    //     }
    // }
    // //フォロー解除機能
    // public function unfollow(User $user){
    //     $follower = Auth::user();
    //     $is_following = $follower->isFollowing ($user->id);
    //     //・フォローしていればフォローを解除する
    //     if(fis_following){
    //         $follower ->unfollow($user->id);
    //         return back();
    //     }
    // }

    // フォロー機能
    //
    public function follow(User $user) {
        $follow = FollowUser::create([
            'following_user_id' => \Auth::user()->id,
            'followed_user_id' => $user->id,
        ]);
    }

    //フォロー解除機能
    public function unfollow(User $user) {
        $follow = FollowUser::where('following_user_id', \Auth::user()->id)->where('followed_user_id', $user->id)->first();
        $follow->delete();
    }
}
