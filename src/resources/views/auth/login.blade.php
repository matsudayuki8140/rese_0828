@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('main')
<div class="auth-card">
    <div class="auth-card__top">
        <p class="auth-card__title">Login</p>
    </div>
    <div class="auth-card__bottom">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="auth-card__row">
                <img src="{{ asset('storage/icon/email.svg') }}" alt="username.svg" class="auth-card__icon" width="20" height="20">
                <input type="text" class="auth-card__input" placeholder="Email" name="email" value="{{ old('email') }}">
            </div>
            <div class="auth-card__row">
                <img src="{{ asset('storage/icon/password.svg') }}" alt="username.svg" class="auth-card__icon" width="20" height="20">
                <input type="password" class="auth-card__input" placeholder="Password" name="password">
            </div>
            <div class="auth-card__button-container">
                <button class="auth-card__button">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection