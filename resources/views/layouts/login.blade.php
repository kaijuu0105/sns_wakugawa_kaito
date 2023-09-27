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
            <a href="/top" class="logo"><img src="{{asset('images/atlas.png')}}" alt="Atlasロゴ" class="logo"></a>
            <p class="username">{{Auth::user()->username}}<span class="name">さん</span></p>
            <!-- アコーディオンメニュー -->
            <button type="button" class="menu-btn">
                <span class="inn"></span>
            </button>
                <nav class="menu">
                    <ul class="menu-list">
                        <div class="menu-box">
                            <li class="menu-home"><a href="/top" class="a-gray">ホーム</a></li>
                        </div>
                        <div class="profile-box">
                            <li class="menu-profile"><a href="/profile" class="a-white">プロフィール編集</a></li>
                        </div>
                        <!-- ログアウト成功 -->
                        <div class="menu-box">
                            <li class="menu-home"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="a-gray">ログアウト</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </ul>
                </nav>
            <img src="{{ asset('storage/'.Auth::user()->images) }}" class="header-icon icon">
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side-name">{{ Auth::user()->username }}さんの</p>
                <div class="side-list">
                    <p>フォロー数</p>
                    <p class="count">{{ Auth::user()->follows()->count() }}名</p>
                </div>
                <p class="list-btn"><a href="/follow-list" class="follow-list">フォローリスト</a></p>
                <div class="side-list">
                    <p >フォロワー数</p>
                    <p class="count">{{ Auth::user()->followers()->count() }}名</p>
                </div>
                <p class="list-btn"><a href="/follower-list" class="follower-list">フォロワーリスト</a></p>
            </div>
            <p class="search-btn"><a href="/search" class="search-list">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('js/script.js') }} "></script>
</body>
</html>
