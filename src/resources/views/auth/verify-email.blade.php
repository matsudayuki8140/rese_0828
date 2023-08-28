@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main')
<div class="thanks-card">
    <p class="thanks-text">
        認証用メールを送信しました<br>
        届いたメールに記載されたリンクをクリックして、会員登録を完了してください。<br>
        ※メールが届かない場合は、入力したアドレスに間違いがあるか、あるいは迷惑メールフォルダに入っている可能性がありますのでご確認ください。
    </p>
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button class="thanks-button">再送信</button>
    </form>
</div>
@endsection