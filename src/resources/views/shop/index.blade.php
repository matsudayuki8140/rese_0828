@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<h3 class="mypage-title">
    @if($user->isHadShop(Auth::id()))
    {{ $representative->shop->name }}：
    @endif
    {{ Auth::user()->name }}さん、お疲れ様です！
</h3>
<div class="mypage-content">

    @if($user->isHadShop(Auth::id()))
    <a href="" class="menu-button">
        <div class="menu-button__label">
            <p>予約一覧</p>
            <p>本日：{{ $representative->shop->name }}件</p>
        </div>
    </a>
    @else
    <div class="invalid-button">
        <p>予約一覧</p>
    </div>
    @endif

    @if($user->isHadShop(Auth::id()))
    <a href="" class="menu-button">
        <div class="menu-button__label">
            <p>評価一覧</p>
        </div>
    </a>
    @else
    <div class="invalid-button">
        <p>評価一覧</p>
    </div>
    @endif

</div>
<div class="mypage-content">

    @if($user->isHadShop(Auth::id()))
    <a href="" class="menu-button">
        <div class="menu-button__label">
            <p>お知らせメール</p>
        </div>
    </a>
    @else
    <div class="invalid-button">
        <p>お知らせメール</p>
    </div>
    @endif

    @if($user->isHadShop(Auth::id()))
    <a href="" class="menu-button">
        <div class="menu-button__label">
            <p>店舗情報変更</p>
        </div>
    </a>
    @else
    <a href="/shop" class="menu-button">
        <div class="menu-button__label">
            <p>店舗情報作成</p>
        </div>
    </a>
    @endif

</div>
@endsection