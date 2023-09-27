@extends('layouts.login')

@section('content')
<div class="post-form">
  <img src="{{ asset('storage/'.Auth::user()->images) }}" width="30" height="30" class="icon form-icon">
  <div class="create">
    <!-- ここから投稿フォーム作成 -->
    <form action="/post/create" method="post">
    @csrf
      <textarea name="newPost" class="new-post" value="null" cols="50" rows="6" maxlength="150" placeholder="投稿内容を入力してください"></textarea>
      <input type="image" src="images/post.png" width="30" height="30" class="post-btn">
    </form>
  </div>
</div>
<div class="table">
  <table class='table table-hover'>
    @foreach($posts as $post)
    <tr class="post-container">
      <td class="post-img"><img src="{{ asset('storage/'.$post->user->images) }}" width="40" height="40" class="icon post-icon"></td>
      <td class="post-name">{{ $post->user->username }}</td>
      <td class="post-time">{{ $post->updated_at }}</td>
      <td class="user-post">{{ $post->post }}</td>

      @isset($post->post)
        @if(Auth::id() === $post->user_id)
          <!-- モーダル機能 -->
          <td class="post-up"><a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" width="30" height="30" class="up-btn" alt="更新"></a></td>
          <!-- 削除機能 -->
          <td class="post-del"><a class="btn-primary" href="/post/{{ $post->id }}/delete"><img src="images/trash.png" width="30" height="30" class="del-btn" alt="削除"><img src="images/trash-h.png" width="30" height="30" class="trash-btn" alt="削除"></a></td><br>

          <!-- モーダルの中身 -->
          <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
              <form action="/post/{{ $post->id }}/update" method="post">
                <textarea name="upPost" class="modal_post"></textarea>
                <input type="hidden" name="id" class="modal_id" >
                <!-- class="js-modal-close"を記入した事によりデータを押し上げる前に閉じる処理が行われている -->
                <!-- js-modal-closeを記入しなくても閉じる処理が行われた -->
                <div class="up-img">
                  <input type="image" src="images/edit.png" width="30" height="30" alt="更新">
                </div>
                {{ csrf_field() }}
              </form>
            </div>
          </div>
        @endif
      @endisset
    </tr>
    @endforeach
  </table>
</div>
@endsection
