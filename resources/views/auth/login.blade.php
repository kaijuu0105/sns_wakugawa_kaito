@extends('layouts.logout')
<div class="login">
  @section('content')

  <!-- 適切なURLを入力してください -->
  {!! Form::open(['url' => '/login']) !!}
  <div class="login-container">
    <div class="login-login">
      <p class="title">AtlasSNSへようこそ</p>

      <div class="login-form">
        {{ Form::label('mail adress') }}
        {{ Form::text('mail',null,['class' => 'input']) }}
        {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'input']) }}
      </div>
      <div class="login-btn">
        {{ Form::submit('LOGIN',['class'=>'btn']) }}
      </div>
      <p class="user-create"><a href="/register">新規ユーザーの方はこちら</a></p>

      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection
