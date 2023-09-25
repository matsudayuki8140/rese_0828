@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<div class="page-title">
    <a class="arrow" href="{!! '/shop/rese/?num=' . ($num - 1) !!}">&lt;</a>
    <h2 class="mypage-title">{{ $fixed_date }}</h2>
    <a class="arrow" href="{!! '/shop/rese/?num=' . ($num + 1) !!}">&gt;</a>
</div>
<div class="mypage-content">
    <div class="mypage-rese">
        @foreach($reservations as $reservation)
        <div class="rese-card">
            <div class="rese-card__header">
                <div class="rese-header__left">
                    <img src="{{ asset('storage/icon/reservation.svg') }}" alt="" width=20 height=20 class="rese-icon">
                    <span class="rese-title">予約{{ $loop->index + 1 }}</span>
                </div>
            </div>
            <div class="rese-card__table">
                <table>
                    <tr>
                        <th class="rese-table__header">Name</th>
                        <td class="rese-table__data">
                            {{ $reservation->user->name }}
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
        </div>
        @endforeach
    </div>
</div>
@endsection