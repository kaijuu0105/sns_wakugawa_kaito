@extends('layouts.login')

@section('content')

@foreach($icons as $icon)
  <tr>
    <td>
      <!-- GET送信で次の画面遷移をしないとretuen back()で元の画面に戻ってこれなくなる -->
      <a href="/another/{{ $icon->id }}" ><img src="{{ asset('storage/'.$icon->images) }}" width="40" height="40" ></a>
    </td>
  </tr>
@endforeach

@foreach($users as $user)
  <tr>
    <div class="">
      <!-- <td><img src="image" alt="ユーザーアイコン"></td> -->
      <td><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン"></td>
      <td>{{ $user->user->username }}</td>
      <td>{{ $user->post}}</td>
    </div>
  </tr>
@endforeach

@endsection
