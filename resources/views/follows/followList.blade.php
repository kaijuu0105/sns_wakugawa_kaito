@extends('layouts.login')

@section('content')

@foreach($icons as $icon)
  <tr>
    <td>
      <!-- GET送信で次の画面遷移をしないとretuen back()で元の画面に戻ってこれなくなる -->
      <form action="/another/{{ $icon->id }}" method="GET">
      @csrf
      <input type="image" src="{{ $icon->images }}" alt="ユーザーアイコン">
      </form>
    </td>
  </tr>
@endforeach

@foreach($users as $user)
  <tr>
    <div class="">
      <!-- <td><img src="image" alt="ユーザーアイコン"></td> -->
      <td>{{ $user->user->username }}</td>
      <td>{{ $user->post}}</td>
    </div>
  </tr>
@endforeach

@endsection
