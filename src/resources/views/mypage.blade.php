@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
<script src="{{ asset('js/reseUpdate.js') }}" defer></script>
@endsection

@section('main')
<div class="page-title">
    <h2 class="mypage-title">{{ Auth::user()->name }}さん</h2>
</div>
<div class="mypage-content">
    <div class="mypage-rese">
        <h3 class="mypage-content__title">予約状況</h3>
        @foreach($reservations as $reservation)
        <div class="rese-card">
            <div class="rese-card__header">
                <div class="rese-header__left">
                    <img src="{{ asset('storage/icon/reservation.svg') }}" alt="" width=20 height=20 class="rese-icon">
                    <span class="rese-title">予約{{ $loop->index + 1 }}</span>
                </div>
                <div class="rese-header__right">
                    <img src="{{ asset('storage/icon/update.svg') }}" alt="変更" class="rese-header__update switch" width=20 height=20 title="変更">
                    <div class="rese-header__delete">
                        <form action="/reservation/delete" method="post">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" name="id" value="{{ $reservation->id }}">
                            <input type="image" src="{{ asset('storage/icon/delete.svg') }}" alt="削除" class="rese-delete" width=20 height=20 title="削除">
                        </form>
                    </div>
                </div>
            </div>
            <div class="rese-card__table">
                <table>
                    <tr>
                        <th class="rese-table__header">Shop</th>
                        <td class="rese-table__data">
                            {{ $reservation->shop->name }}
                        </td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Date</th>
                        <td class="rese-table__data">
                            {{ $reservation->date }}
                        </td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Time</th>
                        <td class="rese-table__data">
                            {{ $reservation['time']->format('H:i') }}
                        </td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Number</th>
                        <td class="rese-table__data">
                            {{ $reservation->number }}人
                        </td>
                    </tr>
                </table>
            </div>
            <form action="/reservation/update" method="post">
                @method('PATCH')
                @csrf
                <div class="rese-card__update invalid">
                    <input type="hidden" name="id" value="{{ $reservation->id }}">
                    <input type="date" name="date" class="rese-update" value="{{ $reservation->date }}">
                    <select name="time" class="rese-update rese-update__select">
                        @for($num = 12; $num <= 22; $num++)
                        <option value="{{ $num }}:00" @if(strcmp($num . ":00", $reservation['time']->format('H:i')) === 0) selected @endif>{{ $num }}:00</option>
                        @if($num == 22)
                            @break
                        @endif
                        <option value="{{ $num }}:30" @if(strcmp($num . ":30", $reservation['time']->format('H:i')) === 0) selected @endif>{{ $num }}:30</option>
                        @endfor
                    </select>
                    <select name="number" class="rese-update rese-update__select">
                        @for($num = 1; $num <= 10; $num++)
                        <option value="{{ $num }}" @if($num === $reservation['number']) selected @endif>{{ $num }}人</option>
                        @endfor
                    </select>
                    <button class="rese-update__button">変更</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
    <div class="mypage-favo">
        <h3 class="mypage-content__title">お気に入り店舗</h3>
        <div class="container">
            @foreach($favorites as $favorite)
            <div class="card">
                <div class="card-top">
                    <img src="{{ asset('storage/images/' . $favorite->shop->imageURL ) }}" alt="sushi.jpg" class="card-image">
                </div>
                <div class="card-bottom">
                    <h3 class="card-title">{{ $favorite->shop->name }}</h3>
                    <span class="card-tag">#{{ $favorite->shop->area }}</span>
                    <span class="card-tag">#{{ $favorite->shop->genre }}</span>
                    <div class="card-button">
                        <span class="card-detail"><a href="/detail/{{ $favorite->shop->id }}">詳しく見る</a></span>
                        <form action="/favorite" method="post">
                            @csrf
                            <input type="hidden" name="shop_id" value="{{ $favorite->shop->id }}">
                            <input type="image" src="{{ asset('storage/icon/favorite.svg') }}" alt="お気に入り解除" class="card-favo favorite favorited">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection