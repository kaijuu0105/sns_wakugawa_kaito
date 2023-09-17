@extends('layouts.login')

@section('content')
<div class="post-form">
  <!-- アイコンを登録してないから表示不可 -->
  <p class="form-icon"><img src="images/icon1.png"></p>
  <!-- ここから投稿フォーム作成 -->
  <form action="/post/create" method="post">
  @csrf
    <textarea name="newPost" class="new-post" value="null" cols="50" rows="6" maxlength="150" placeholder="投稿内容を入力してください"></textarea>
    <button type="submit" class="post-btn"><img src="images/post.png" width="20" height="20"></button>
  </form>
</div>

  <table class='table table-hover'>
    @foreach($posts as $post)
    <tr class=post>
      <td>{{ $post->user->images }}</td>
      <td>{{ $post->user->username }}</td>
      <td>{{ $post->post }}</td>
      <td>{{ $post->created_at }}</td>

      @if(Auth::id() === $post->user_id)
      <!-- モーダル機能 -->
      <td><a class="js-modal-open" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" width="20" height="20" alt="更新"></a></td>
      <!-- モーダルの中身 -->
      <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/{{ $post->id }}/update" method="post">
            <textarea name="upPost" class="modal_post"></textarea>
            <input type="hidden" name="id" class="modal_id" >
            <!-- class="js-modal-close"を記入した事によりデータを押し上げる前に閉じる処理が行われている -->
            <!-- js-modal-closeを記入しなくても閉じる処理が行われた -->
            <input type="image" src="images/edit.png" width="20" height="20" alt="更新">
            {{ csrf_field() }}
          </form>
        </div>
      </div>
      <!-- 削除機能 -->
      <td><a class="btn-primary" href="/post/{{ $post->id }}/delete"><img src="images/trash.png" width="20" height="20" alt="削除"></a></td><br>
      @else
      <br>
    </tr>
    @endif
    @endforeach
  </table>
<!-- モーダルの中身 -->
    <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
          <form action="/post/{{ $post->id }}/update" method="post">
            <textarea name="upPost" class="modal_post"></textarea>
            <input type="hidden" name="id" class="modal_id" >
            <!-- class="js-modal-close"を記入した事によりデータを押し上げる前に閉じる処理が行われている -->
            <!-- js-modal-closeを記入しなくても閉じる処理が行われた -->
            <input type="image" src="images/edit.png" width="20" height="20" alt="更新">
            {{ csrf_field() }}
          </form>
        </div>
    </div>
@endsection
