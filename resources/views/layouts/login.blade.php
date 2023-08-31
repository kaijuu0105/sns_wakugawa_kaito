<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
        <h1><a><img src="images/atlas.png"></a></h1>
            <div id="">
                <div id="">
                    <p>{{Auth::user()->username}}さん<img src="images/icon1.png"></p>
                </div>
                <button type="button" class="menu-btn">
                    <span class="inn"></span>
                </button>
                <nav class="menu">
                    <ul>
                      <li><a href="/top">ホーム</a></li>
                      <li><a href="/profile">プロフィール</a></li>
                      <!-- {!! Form::open(['url' => '/logout']) !!} -->
                      <!-- 保険で残し -->
                      <!-- {{ Form::hidden('logout') }} -->
                      <!-- <li><a href="/logout">ログアウト</a></li> -->
                       <!-- @csrf
                      {!! Form::close() !!} -->
                      <!-- 失敗 -->
                      <!-- <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form> -->

                      <!-- ログアウト成功 -->
                      <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <li><a href="/logout">ログアウト</a></li>
                      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{Auth::user()->username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{Auth::user()->getFollowCount}}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{Auth::user()->getFollowerCount}}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="./js/script.js"></script>
</body>
</html>
