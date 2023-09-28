<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
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
        $request->validate([
            'upUsername' => 'required|min:2|max:10',
            'upMail' => 'required|unique:users,mail->ignore(Auth::id()|min:5|max:40|email',
            'Password' => 'required|alpha_num|min:8|max:20|confirmed',
            'Password_confirmation' => 'required|alpha_num|min:8|max:20|',
            'upBio' => 'max:150',
            'images' => 'mimes:jpg,png,bmp,gif,svg',

        ]);
        // 1つ目の処理
        $id = Auth::id();
        $up_username = $request->input('upUsername');
        $up_mail = $request->input('upMail');
        $up_password =$request->input('Password');
        $up_bio = $request->input('upBio');
        $icon = $request->file('images');
        // dd($icon);
        if($icon){
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
              'password' => bcrypt($up_password),
              'bio' => $up_bio,
        ]);
        // 3つ目の処理
        return redirect('/top');
    }

    // リンクを押してget送信 searchページの画面表示
    public function search(){
        $users = User::where('id', '<>', Auth::id())->get();
        // dd($users);
        return view('users.search',['users'=>$users]);
    }

    // searchページの検索内容を送る　post送信
    public function searching(Request $request){
        $search = $request->input('searchUsers');
        $username = Auth::user()->username;

        if (!empty($search) && $search != $username){
            $users=User::where('username', 'LIKE', '%'.$search.'%')->get();
            return view('users.search',['users'=>$users, 'search'=>$search]);
            }else{
            return $this->search();
        }
    }
 }
