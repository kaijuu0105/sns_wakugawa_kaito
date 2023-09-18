@extends('layouts.login')

@section('content')

@foreach($icons as $icon)
  <tr>
    <td>
      <a href="/another/{{ $icon->id }}" ><img src="{{ asset('storage/'.$icon->images) }}" width="40" height="40" ></a>
    </td>
  </tr>
@endforeach

@foreach($users as $user)
  <tr>
    <div class="">
      <td><img src="{{ asset('storage/'.$user->user->images) }}" width="40" height="40" alt="ユーザーアイコン"></td>
      <td>{{ $user->username }}</td>
      <td>{{ $user->post}}</td>
    </div>
  </tr>
@endforeach

@endsection
