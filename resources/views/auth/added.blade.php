@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-title">
    <p>{{session('username')}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="added-p">
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
  </div>
  <p class="added-btn"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
