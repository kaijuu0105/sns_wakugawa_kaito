@extends('layouts.login')

@section('content')
<div class="search-form">
  {!! Form::open(['url' => '/search']) !!}
  <!-- 検索フォーム作成 -->
  {{ Form::input('text', 'searchUsers', '', ['require', 'class'=>'search', 'placeholder'=>'ユーザー名' ])}}
  <button type="submit" class="s-btn"><img src="images/search.png" width="30" height="30" class="search-img"></button>

  <!-- 検索ワードが入力されていたら表示 -->
  @if(!empty($search))
  <div class="search-users">
    <p class="p-search">検索ワード:{{ $search }}</p>
  </div>
  @endif
  {!! Form::close() !!}
</div>
<!-- ログインユーザー以外のユーザー一覧 -->
<!-- ($users as $users)で記述　配列の分解を出来ていなかった -->
<div class="search-list">
<table class='search-list'>
  @foreach($users as $user)
      <tr class="search-search">
        <td class="search-icon"><img src="{{ asset('storage/'.$user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon"></td>
        <td class="search-name">{{ $user->username }}</td>
        <!-- フォローボタン・アンフォローボタン -->
        <td class="search-follows">
          <!-- ($users->id)で記述　配列の分解を出来ていなかった -->
          <!-- isFollowingメソッドがボタンの切り替えとフォロー機能に作用する -->
          @if(auth()->user()->isFollowing($user->id))
          <form action="/unfollow/{{ $user->id }}" method="POST">
            @csrf
            <button type="submit" class="unf-btn">フォロー解除</button>
          </form>
          @else
          <form action="/follow/{{ $user->id }}" method="POST">
            @csrf
            <button type="submit" class="f-btn">フォローする</button>
          </form>
          @endif
        </td>
      </tr>
  @endforeach
</table>
</div>

@endsection
