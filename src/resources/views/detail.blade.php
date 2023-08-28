@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('main')
<div class="content-inner">
    <div class="content-shop">
        <div class="shop-title">
            <a href="/" onclick="history.back(-1);return false;" class="shop-return"><span>＜</span></a>
            <h2 class="shop-name">{{ $shop['name'] }}</h2>
        </div>
        <img src="{{ asset('storage/images/' . $shop['imageURL'] ) }}" alt="{{ $shop['imageURL'] }}" class="shop-image">
        <div class="shop-tag">
            <span>#{{ $shop['area'] }}</span>
            <span>#{{ $shop['genre'] }}</span>
        </div>
        <p class="shop-text">
            {{ $shop['description'] }}
        </p>
    </div>
    <div class="content-rese">
        <form action="post">
            <div class="rese-form">
                <div class="rese-top">
                    <h2 class="rese-title">予約</h2>
                    <input type="date" class="rese-input__date">
                    <input type="time" class="rese-input">
                    <input type="number" class="rese-input">
                    <div class="rese-table">
                        <table>
                            <tr>
                                <th class="rese-table__header">Shop</th>
                                <td class="rese-table__data">{{ $shop['name'] }}</td>
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
                <button class="rese-button">予約する</button>
            </div>
        </form>
    </div>
</div>
@endsection