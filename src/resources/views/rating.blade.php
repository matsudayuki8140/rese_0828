@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main')
<div class="rating-container">
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
                <form action="/favorite" method="post">
                @csrf
                    <input type="hidden" name="shop_id" value="{{ $shop['id'] }}">
                    @if(!$shop->isFavoritedBy(Auth::id()))
                    <input type="image" src="{{ asset('storage/icon/unfavorite.svg') }}" alt="お気に入り" class="card-favo favorite">
                    @else
                    <input type="image" src="{{ asset('storage/icon/favorite.svg') }}" alt="お気に入り解除" class="card-favo favorite favorited">
                    @endif
                </form>
                @endauth
            </div>
        </div>
    </div>
    <div class="thanks-card">
        <p class="thanks-text">評価にご協力をお願いします</p>
        <form action="/rating" method="post">
            @csrf
            <div class="rating-star">
                <input type="radio" name="rating" id="star5" value="5">
                <label for="star5">★</label>
                <input type="radio" name="rating" id="star4" value="4">
                <label for="star4">★</label>
                <input type="radio" name="rating" id="star3" value="3">
                <label for="star3">★</label>
                <input type="radio" name="rating" id="star2" value="2">
                <label for="star2">★</label>
                <input type="radio" name="rating" id="star1" value="1">
                <label for="star1">★</label>
            </div>
            <textarea name="comment" id="comment" placeholder="何かご要望があれば記入してください" cols="30" rows="10">{{ old('comment') }}</textarea>
            <input type="hidden" name="shop_id" value="{{ $shop['id'] }}">
            <button class="thanks-button">送信</button>
        </form>
    </div>
</div>
@endsection