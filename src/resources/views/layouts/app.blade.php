<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rese</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/menu.js') }}" defer></script>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>

<body>
    <header class="header">
        <div class="header-logo">
            <div class="menu">
                <div class="menu_button"><span></span></div>
                <div class="menu_close"></div>
            </div>
            <h1 class="header-title">Rese</h1>
        </div>
        @yield('header')
    </header>
    <nav class="sample_menu">
            <ul>
                <li><a href="/">Home</a></li>
                @if(Auth::check())
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="logout">Logout</button>
                    </form>
                </li>
                <li><a href="/mypage">Mypage</a></li>
                @can('representative')
                <li><a href="/shop/index">Shop</a></li>
                @endcan
                @can('admin')
                <li><a href="/admin">Admin</a></li>
                @endcan
                @else
                <li><a href="{{ route('register') }}">Registration</a></li>
                <li><a href="{{ route('login') }}">Login</a></li>
                @endif
            </ul>
        </nav>
    <main class="main">
        <div class="alert">
            @if(session('message'))
            <div class="alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if($errors->any())
            <div class="alert-error">
                <p class="error-text">エラーが発生しました</p>
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        @yield('main')
    </main>
</body>

</html>