@extends('layouts.login')

@section('content')
<div class="follows-list">
  <div class="list-title">
    <h1>Follow List</h1>
  </div>
  <div class="icon-list">
    <div class="follow-icon">
      @foreach($icons as $icon)
        <tr>
          <td>
            <!-- GET送信で次の画面遷移をしないとretuen back()で元の画面に戻ってこれなくなる -->
            <a href="/another/{{ $icon->id }}" ><img src="{{ asset('storage/'.$icon->images) }}" width="40" height="40" class="icon follow-icons"></a>
          </td>
        </tr>
      @endforeach
    </div>
  </div>
</div>

<table class='follow-table table-hover'>
  @foreach($users as $user)
    <tr class="post-container">
      <td class="follow-img">
        <a href="/another/{{ $icon->id }}" class="a-follow">
          <img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon follows-icon">
        </a>
      </td>
      <td class="post-name">{{ $user->user->username }}</td>
      <td class="post-time">{{ $user->updated_at->format('Y-m-d H:i') }}</td>
      <td class="follow-post">{{ $user->post}}</td>
    </tr>
  @endforeach
</table>


@endsection
