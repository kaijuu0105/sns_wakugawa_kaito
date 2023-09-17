@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/search']) !!}
<!-- 検索フォーム作成 -->
{{ Form::input('text', 'searchUsers', '', ['require', 'class'=>'search', 'placeholder'=>'ユーザー名' ])}}
<button type="submit" class="s-btn"><img src="images/search.png" width="20" height="20"></button>

<!-- 検索ワードが入力されていたら表示 -->
@if(!empty($searchUsers))
<div class="search-users">
  <p>検索ワード:{{ $searchUsers }}</p>
</div>
@endif
{!! Form::close() !!}

<!-- ログインユーザー以外のユーザー一覧 -->
<!-- ($users as $users)で記述　配列の分解を出来ていなかった -->
@foreach($users as $user)
<div>
  <tr>
    <td><img src="{{ $user->images }}" alt="ユーザーアイコン"></td>
    <td>{{ $user->username }}</td>

    <!-- フォローボタン・アンフォローボタン -->
    <td>
      <!-- ($users->id)で記述　配列の分解を出来ていなかった -->
      <!-- isFollowingメソッドがボタンの切り替えとフォロー機能に作用する -->
      @if(auth()->user()->isFollowing($user->id))
      <form action="/unfollow/{{ $user->id }}" method="POST">
        @csrf
        <button type="submit" class="unf-btn">フォロー解除くん</button>
      </form>
      @else
      <form action="/follow/{{ $user->id }}" method="POST">
        @csrf
        <button type="submit" class="f-btn">フォローちゃん</button>
      </form>
      @endif
    </td>
  </tr>
</div>
@endforeach

@endsection
