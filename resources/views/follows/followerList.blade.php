@extends('layouts.login')

@section('content')
<div class="follows-list">
  <div class="list-title">
    <h1>Follower List</h1>
  </div>
  <div class="icon-list">
    <div class="follow-icon">
      @foreach($icons as $icon)
        <tr>
          <td>
            <a href="/another/{{ $icon->id }}" ><img src="{{ asset('storage/'.$icon->images) }}" width="40" height="40" class="icon follow-img"></a>
          </td>
        </tr>
      @endforeach
    </div>
  </div>
</div>

<table class='follow-table table-hover'>
  @foreach($users as $user)
    <tr class="post-container">
        <td class="post-img"><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon post-icon"></td>
        <td class="post-name">{{ $user->user->username }}</td>
        <td class="post-time">{{ $user->created_at }}</td>
        <td class="user-post">{{ $user->post}}</td>
      </div>
    </tr>
  @endforeach
</table>

@endsection
