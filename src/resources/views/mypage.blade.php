@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
<link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('main')
<div class="page-title">
    <h2 class="mypage-title">testさん</h2>
</div>
<div class="mypage-content">
    <div class="mypage-rese">
        <h3 class="mypage-content__title">予約状況</h3>
        <div class="rese-card">
            <div class="rese-card__header">
                <img src="{{ asset('storage/icon/reservation.svg') }}" alt="" width=20 height=20 class="rese-icon">
                <span class="rese-title">予約1</span>
                <img src="{{ asset('storage/icon/delete.svg') }}" alt="" width=20 height=20 class="rese-delete">
            </div>
            <div class="rese-card__table">
                <table>
                    <tr>
                        <th class="rese-table__header">Shop</th>
                        <td class="rese-table__data">仙人</td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Date</th>
                        <td class="rese-table__data">2021-04-01</td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Time</th>
                        <td class="rese-table__data">17:00</td>
                    </tr>
                    <tr>
                        <th class="rese-table__header">Number</th>
                        <td class="rese-table__data">1人</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="mypage-favo">
        <h3 class="mypage-content__title">お気に入り店舗</h3>
        <div class="container">
            @for($a = 1; $a <= 5; $a++)
            <div class="card">
                <div class="card-top">
                    <img src="{{ asset('storage/images/sushi.jpg') }}" alt="sushi.jpg" class="card-image">
                </div>
                <div class="card-bottom">
                    <h3 class="card-title">仙人</h3>
                    <span class="card-tag">#東京都</span>
                    <span class="card-tag">#寿司</span>
                    <div class="card-button">
                        <span class="card-detail">詳しく見る</span>
                        <img src="{{ asset('storage/icon/unfavorite.svg') }}" alt="favorite.svg" class="card-favo">
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
@endsection