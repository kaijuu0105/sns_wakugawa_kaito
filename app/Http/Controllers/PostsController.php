<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Auth;

class PostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    //
    public function index(){
        // Postテーブルからデータを取らないと求めている表示にならない
        $user_id = Auth::id();
        // followテーブルから該当するレコードを取得、該当するレコードからpluckで欲しいカラム情報を取得
        $following_id = Follow::where('following_id',$user_id)->pluck('followed_id');
        // dd($following_id);
        // $suuji = '4,7';
        // whereInはこの例だと、idがフォローしているidもしくは、ログインユーザーの中で該当するidをUserテーブルから抽出
        $posts = Post::whereIn('user_id',$following_id)->orWhere('user_id',$user_id )->get();
        // dd($posts);
        return view('posts.index',['posts'=>$posts,]);
    }

    public function postCreate(Request $request){

        $request->validate([
            'newPost' => 'required|min:1|max:150',
        ]);
        $post = $request->input('newPost');
        // dd($post);
        $user_id = Auth::id();
        Post::create(
            [
            'post' => $post,
            'user_id' => $user_id
        ]);
        return redirect('/top');
    }

    public function update(Request $request){
        // 1つ目の処理
        $id = $request->input('id');
        $up_post = $request->input('upPost');
        // dd($up_post);
        // 2つ目の処理
        Post::where('id', $id)->update([
              'post' => $up_post
        ]);
        // 3つ目の処理
        return back();
    }

    // 削除メソッド
    public function delete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
