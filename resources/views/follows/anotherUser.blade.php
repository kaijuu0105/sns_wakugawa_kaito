@extends('layouts.login')

@section('content')

@foreach($profiles as $profile)
<div class="another-pro">
  <div class="pro-container">
    <div class="another-hicon">
      <img src="images/icon1.png">
    </div>
    <div class="another-hname">
      <p>name</p>{{ $profile->username}}
    </div>
    <div class="another-bio">
      <p>bio</p>{{ $profile->bio}}
    </div>
  </div>
  <div class="follow-btn">
    @if(auth()->user()->isFollowing($profile->id))
      <form action="/unfollow/{{ $profile->id }}" method="POST">
        @csrf
        <button type="submit" class="unf-btn">フォロー解除くん</button>
      </form>
      @else
      <form action="/follow/{{ $profile->id }}" method="POST">
      @csrf
        <button type="submit" class="f-btn">フォローちゃん</button>
      </form>
    @endif
  </div>
</div>
@endforeach

@foreach($users as $user)
  <tr>
    <div class="another-bicon">
      <td>{{ $user->user->images }}</td>
    </div>
    <div class="another-bname">
      <td>{{ $user->user->username }}</td>
    </div>
    <div class="another-post">
      <td>{{ $user->post }}</td>
    </div>
    <div class="another-time">
      <td>{{ $user->created_at }}</td>
    </div>
  </tr>
@endforeach

@endsection
