@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('main')
<div class="auth-card">
    <div class="auth-card__top">
        <p class="auth-card__title">店舗代表者用アカウント作成</p>
    </div>
    <div class="auth-card__bottom">
        <form action="/admin/register" method="post">
            @csrf
            <div class="auth-card__row">
                <img src="{{ asset('storage/icon/username.svg') }}" alt="username.svg" class="auth-card__icon" width="20" height="20">
                <input type="text" class="auth-card__input" placeholder="Username" name="name" value="{{ old('name') }}">
            </div>
            <div class="auth-card__row">
                <img src="{{ asset('storage/icon/email.svg') }}" alt="username.svg" class="auth-card__icon" width="20" height="20">
                <input type="text" class="auth-card__input" placeholder="Email" name="email" value="{{ old('email') }}">
            </div>
            <div class="auth-card__row">
                <img src="{{ asset('storage/icon/password.svg') }}" alt="username.svg" class="auth-card__icon" width="20" height="20">
                <input type="password" class="auth-card__input" placeholder="Password" name="password">
            </div>
            <div class="auth-card__button-container">
                <button class="auth-card__button">作成</button>
            </div>
        </form>
    </div>
</div>
@endsection