<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;


class UsersController extends Controller
{
    //

    public function profile(){
        return view('users.profile');
    }

    // リンクを押してget送信 searchページの画面表示
    public function index(){
        $users = User::where('id', '<>', Auth::user()->id)->get();
        // dd(Auth::id());
        return view('users.search',['users'=>$users]);
    }

    // searchページの検索内容を送る　post送信
     public function search(){
        return view('users.search');
    }
}
