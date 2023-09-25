@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<script src="{{ asset('js/detail.js') }}" defer></script>
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
        <a href="/rating/{{ $shop['id'] }}" class="rating-button">評価する</a>
    </div>
    <div class="content-rese">
        <form action="/reservation" method="post" id="rese">
            @csrf
            <div class="rese-form">
                @if(Auth::check())
                <div class="rese-top">
                    <h2 class="rese-title">予約</h2>
                    <input type="date" name="date" class="rese-input__date">
                    <select name="time" id="time" class="rese-input">
                        @for($num = 12; $num <= 22; $num++)
                        <option value="{{ $num }}:00">{{ $num }}:00</option>
                        @if($num == 22)
                            @break
                        @endif
                        <option value="{{ $num }}:30">{{ $num }}:30</option>
                        @endfor
                    </select>
                    <select name="number" class="rese-input">
                        @for($num = 1; $num <= 10; $num++)
                        <option value="{{ $num }}">{{ $num }}人</option>
                        @endfor
                    </select>
                    <input type="hidden" name="shop_id" value="{{ $shop['id'] }}">
                    <div class="rese-table">
                        <table>
                            <tr>
                                <th class="rese-table__header">Shop</th>
                                <td class="rese-table__data">{{ $shop['name'] }}</td>
                            </tr>
                            <tr>
                                <th class="rese-table__header">Date</th>
                                <td id="date_box" class="rese-table__data">
                                    @error('date')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="rese-table__header">Time</th>
                                <td id="time_box" class="rese-table__data">
                                    12:00
                                    @error('time')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <th class="rese-table__header">Number</th>
                                <td class="rese-table__data">
                                    <span id="number_box">1</span>
                                    <span>人</span>
                                    @error('number')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="rese-button">予約する</button>
                @else
                <div class="rese-top">
                    <h2 class="rese-title">予約</h2>
                    <div class="rese-message">
                        予約フォームを利用するには、メニューからログインしてください。
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection