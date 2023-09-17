@extends('layouts.login')

@section('content')
<div class=container>
  <div class=user-icon>
    <img src="{{ asset('storage/'.Auth::user()->images) }}" width="40" height="40" >
  </div>
  <div class="profile-up">
    <form action="/profile-up" method="post" enctype="multipart/form-data">
    @csrf
      <div class="ct-block">
        <label class="ct-label">user name</label>
        <input type="text" name="upUsername" value="{{ Auth::user()->username }}" class="up-profile">
      </div>
      <div class="ct-block">
        <label class="ct-label">mail address</address></label>
        <input type="email" name="upMail" value="{{ Auth::user()->mail }}" class="up-profile">
      </div>
      <!-- <div class="ct-block">
        <label class="ct-label">password</label>
        <input type="password" name="upPassword" class="up-profile">
      </div>
      <div class="ct-block">
        <label class="ct-label">password comfirm</label>
        <input type="password" name="upPassword-comfirm" class="up-profile">
      </div> -->
      <div class="ct-block">
        <label class="ct-label">bio</label>
        <input type="text" name="upBio" value="{{ Auth::user()->bio }}" class="up-profile">
      </div>
      <div class="ct-block">
        <label class="ct-label">icon image</label>
        <input type="file" name="images" class="up-icon">
      </div>
      <button type="submit" class="up-btn">更新</button>
    </form>
  </div>
</div>


@endsection
