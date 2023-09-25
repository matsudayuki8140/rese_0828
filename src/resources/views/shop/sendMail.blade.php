<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese Email</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mail.css') }}">

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <span class="logo">Rese</span>
    <div class="container">
        <p class="shop-name">{{ $name }}</p>
        <h1 class="greet">{{ $greet }}</h1>
        <div class="text"><p>{{ $text }}</p></div>
        <a href="http://localhost/" class="button">Reseを開く</a>
        <div class="text sub-text">
            <div class="line"></div>
            <p>「Reseを開く」ボタンがクリックできない場合、こちらのURLをブラウザに貼り付けてください：<a href="{{ $url }}" class="mail-link">{{ $url }}</a></p>
        </div>
    </div>
    <small class="copy-right">© 2023 Rese. All rights reserved.</small>
</body>
</html>