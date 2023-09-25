@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main')
<div class="thanks-card">
    <p class="thanks-text">
        ご予約ありがとうございます
    </p>
    <a href="/"><span class="thanks-button">戻る</span></a>
</div>
@endsection