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
            <a href="/another/{{ $icon->id }}" ><img src="{{ asset('storage/'.$icon->images) }}" width="40" height="40" class="icon follow-img"></a>
          </td>
        </tr>
      @endforeach
    </div>
  </div>
</div>
<<<<<<< HEAD

<table class='follow-table table-hover'>
  @foreach($users as $user)
    <tr class="post-container">
      <td class="post-img"><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon post-icon"></td>
      <td class="post-name">{{ $user->user->username }}</td>
      <td class="post-time">{{ $user->created_at }}</td>
      <td class="user-post">{{ $user->post}}</td>
    </tr>
  @endforeach
</table>

=======
<div class="table">
  <table class='table table-hover'>
    @foreach($users as $user)
      <tr class="post-container">
        <td class="post-img"><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン" class="icon post-icon"></td>
        <td class="post-name">{{ $user->user->username }}</td>
        <td class="post-time">{{ $user->created_at }}</td>
        <td class="user-post">{{ $user->post}}</td>
      </tr>
    @endforeach
  </table>
</div>
>>>>>>> 714f5a9e0e0bc38a1f9ccfd9b6a1ad1d71bd30f3

@endsection
