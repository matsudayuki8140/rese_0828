@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('main')
<div class="page-title">
    <h2 class="mypage-title">評価一覧</h2>
</div>
<div class="mypage-content">
    <div class="mypage-rese">
        @foreach($ratings as $rating)
        <div class="rese-card">
            <div class="rese-card__header">
                <div class="rese-header__left">
                    <img src="{{ asset('storage/icon/star.svg') }}" alt="" width=20 height=20 class="rese-icon">
                    <span class="rese-title">評価{{ $loop->index + 1 }}</span>
                </div>
            </div>
            <div class="rese-card__table">
                <table>
                    <tr>
                        <th class="rese-table__header">Rating</th>
                        <td class="rese-table__data">
                            @for($star = 1; $star <= $rating['rating']; $star ++)
                            ★
                            @endfor
                        </td>
                    </tr>
                    @if(!empty($rating['comment']))
                    <tr>
                        <th class="rese-table__header">Comment</th>
                        <td class="rese-table__data">
                            {{ $rating->comment }}
                        </td>
                    </tr>
                    @endif
                </table>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection