<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Auth;

class FollowsController extends Controller
{
    // フォローリストの表示
    public function followList(){
        $user_id = Auth::id();
        // dd($user_id);
        $following_id = Follow::where('following_id',$user_id)->pluck('followed_id');
        // dd($following_id);
        $users = Post::whereIn('user_id',$following_id)->get();
        // dd($users);
        $icons = User::whereIn('id',$following_id)->get();
        //dd($icons);
        return view('follows.followList',['users'=>$users,'icons'=>$icons]);
    }

    // フォロワーリストの表示
    public function followerList(){
        $user_id = Auth::id();
        $followed_id = Follow::where('followed_id',$user_id)->pluck('following_id');
        // dd($followed_id);
        $users = Post::whereIn('user_id',$followed_id)->get();
        // dd($users);
        $icons = User::whereIn('id',$followed_id)->get();
        return view('follows.followerList',['users'=>$users,'icons'=>$icons]);
        // $users = Auth::user()->followers()->get();
        // // dd($users);
        // return view('follows.followerList',['users'=>$users]);
    }

    // フォロー、フォロワーの個人ページ
    public function another($user_id){
        $profiles = User::where('id',$user_id)->get();
        $users = Post::where('user_id',$user_id)->get();
        // dd($users);
        return view('follows.anotherUser',['users'=>$users,'profiles'=>$profiles]);
    }

    // フォロー機能
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
