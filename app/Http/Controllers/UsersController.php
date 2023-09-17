<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Auth;


class UsersController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function profile(){
        return view('users.profile');
    }

    public function profileUpdate(Request $request){
        // 1つ目の処理
        $id = Auth::id();
        $up_username = $request->input('upUsername');
        $up_mail = $request->input('upMail');
        // $up_password =$request->input('upPassword');
        $up_bio = $request->input('upBio');

        if(($request->file('image'))){
            $icon_name = $request->file('images')->getClientOriginalName();
            // dd($icon_name);
            $images = $request->file('images')->storeAs('public',$icon_name);

             User::where('id', $id)->update([
                'images' => $icon_name,
            ]);
        }
        // 2つ目の処理 Userテーブルに指定したidをupdate
        // Userテーブルにあるカラムに新しい数値を入れる
        User::where('id', $id)->update([
              'username' => $up_username,
              'mail' => $up_mail,
            //   'password' => $up_password,
              'bio' => $up_bio,
        ]);
        // 3つ目の処理
        return redirect('/top');
    }

    // リンクを押してget送信 searchページの画面表示
    public function search(){
        $users = User::where('id', '<>', Auth::id())->get();
        // dd(Auth::id());
        return view('users.search',['users'=>$users]);
    }

    // searchページの検索内容を送る　post送信
    public function searching(Request $request){
        $search = $request->input('searchUsers');

        if (!empty($search)){
            $users=User::where('username', 'LIKE', '%'.$search.'%')->get();
            return view('users.search',['users'=>$users]);
            }else{
            return $this->search();
        }
    }
 }
