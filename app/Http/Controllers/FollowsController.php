<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Auth;

class FollowsController extends Controller
{
    public function followList(){
        // ユーザーテーブルからアイコンを抽出
        // 条件追加　その中でフォローIDとユーザーIDが一致してる人
        $follow_icon = User::get('images')->where('following_id',$user_id);
        $follow_user = User::get()->where('following_id',$user_id);
        return view('follows.followList',['follow_icon'=>$follow_icon, 'follow_user'=>$follow_user]);
    }
    public function followerList(){
        // ユーザーテーブルからアイコンを抽出
        // 条件追加　その中でフォローIDとユーザーIDが一致してる人
        $followed_icon = User::get('images')->where('followed_id',$user_id);
        return view('follows.followerList',['followed_icon'=>$followed_icon]);
    }

    // // フォロー機能
    public function follow($user_id){
        // dd($user_id);
        $follower = Auth::user();
        // フォローしてるか判断 (していますか？　はい、もしくはいいえ)
        $is_following = $follower->isFollowing($user_id);
        // dd($is_following);
        //　フォローしていなければフォローする
        // if文の解釈 if(!$is_following)(もしフォローしていればの意味)　!を使い否定形にしてフォローしていなければの意味にする
        if(!$is_following){
            // dd($is_following);
            $follower->follow($user_id);
            return back();
        }
    }
    //フォロー解除機能
    public function unfollow($user_id){
        // dd($user_id);
        $follower = Auth::user();
        // フォローしてるか判断
        $is_following = $follower->isFollowing($user_id);
        //　if文の解釈 $is_following(フォローしていればの意味)なのでフォローしていればフォローを解除する
        if($is_following){
            // dd($is_following);
            $follower->unfollow($user_id);
            return back();
        }
    }

}
