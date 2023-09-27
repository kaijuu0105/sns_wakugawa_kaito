
@extends('layouts.logout')

@push('register')
<link rel="stylesheet" href="{{ asset('css/register.css') }} ">
@endpush

@section('content')


<!-- 適切なURLを入力してください -->
{!! Form::open(['url' => '/register']) !!}
<div class="register-container">
  <div class="register-register">
    <h2 class="title">新規ユーザー登録</h2>
    <div class="login-form">
      {{ Form::label("user name") }}
      {{ Form::text('username',null,['class' => 'input']) }}

      {{ Form::label('mail adress') }}
      {{ Form::text('mail',null,['class' => 'input']) }}

      {{ Form::label('password') }}
      {{ Form::password('password',null,['class' => 'input']) }}

      {{ Form::label('pass comfirm') }}
      {{ Form::password('password_confirmation',null,['class' => 'input']) }}
    </div>
    <div class="register-btn">
      {{ Form::submit('REGISTER',['class'=>'btn']) }}
    </div>
    <p class="register-a"><a href="/login">ログイン画面へ戻る</a></p>
  </div>
</div>

  {!! Form::close() !!}

    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

@endsection
