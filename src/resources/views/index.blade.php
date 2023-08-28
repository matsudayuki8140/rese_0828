@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('header')
<form action="/search" method="get">
    @csrf
    <div class="search">
        <select name="area" id="area" class="search-select">
            <option value="" selected>All area</option>
            <option value="東京都">東京都</option>
            <option value="大阪府">大阪府</option>
            <option value="福岡県">福岡県</option>
        </select>
        <div class="search-deco"></div>
        <select name="genre" id="genre" class="search-select">
            <option value="" selected>All genre</option>
            <option value="寿司">寿司</option>
            <option value="焼肉">焼肉</option>
            <option value="居酒屋">居酒屋</option>
            <option value="イタリアン">イタリアン</option>
            <option value="ラーメン">ラーメン</option>
        </select>
        <div class="search-deco"></div>
        <input type="image" src="{{ asset('storage/icon/search.svg') }}" alt="検索" class="search-icon" width=20 height=20>
        <input type="search" name="name" class="search-keyword" value="{{ old('name') }}" placeholder="Search ...">
    </div>
</form>
@endsection

@section('main')
<div class="container">
    @foreach($shops as $shop)
    <div class="card">
        <div class="card-top">
            <img src="{{ asset('storage/images/' . $shop['imageURL'] ) }}" alt="{{ $shop['imageURL'] }}" class="card-image">
        </div>
        <div class="card-bottom">
            <h3 class="card-title">{{ $shop['name'] }}</h3>
            <span class="card-tag">#{{ $shop['area'] }}</span>
            <span class="card-tag">#{{ $shop['genre'] }}</span>
            <div class="card-button">
                <span class="card-detail"><a href="/detail/{{ $shop['id'] }}">詳しく見る</a></span>
                @auth
                @if(!$shop->isFavoritedBy(Auth::id()))
                <img src="{{ asset('storage/icon/unfavorite.svg') }}" alt="お気に入り" class="card-favo favorite" data-shop-id="{{ $shop['id'] }}">
                @else
                <img src="{{ asset('storage/icon/favorite.svg') }}" alt="お気に入り解除" class="card-favo favorite favorited" data-shop-id="{{ $shop['id'] }}">
                @endif
                @endauth
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection