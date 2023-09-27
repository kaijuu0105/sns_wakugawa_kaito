@extends('layouts.login')

@section('content')

@foreach($profiles as $profile)
<div class="follows-list">
  <div class="icon-list">
    <div class="another-hicon">
      <img src="{{ asset('storage/'.$profile->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon">
    </div>
    <div class="another-another">
      <div class="another-ano">
        <div class="another-prof">
          <p class="another-namep">name</p><span class="pro-span">{{ $profile->username}}</span>
        </div>
        <div class="another-prof">
          <p class="another-biop">bio</p><span class="pro-span">{{ $profile->bio}}</span>
          <div class="follow-btn">
            @if(auth()->user()->isFollowing($profile->id))
              <form action="/unfollow/{{ $profile->id }}" method="POST">
                @csrf
                <button type="submit" class="following-btn unf-btn">フォロー解除くん</button>
              </form>
              @else
              <form action="/follow/{{ $profile->id }}" method="POST">
              @csrf
              <button type="submit" class="following-btn f-btn">フォローちゃん</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
<table class='another-table table-hover'>
  @foreach($users as $user)
    <tr class="post-container">
      <td class="post-img"><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon post-icon"></td>
      <td class="post-name">{{ $user->user->username }}</td>
      <td class="post-time">{{ $user->created_at }}</td>
      <td class="user-post">{{ $user->post}}</td>
    </tr>
  @endforeach
</table>


@endsection
