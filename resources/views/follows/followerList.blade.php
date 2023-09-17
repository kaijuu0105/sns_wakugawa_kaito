@extends('layouts.login')

@section('content')

@foreach($icons as $icon)
  <tr>
    <td>
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
      <td><img src="{{ $user->images }}" alt="ユーザーアイコン"></td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->post}}</td>
    </div>
  </tr>
@endforeach

@endsection
