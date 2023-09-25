@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main')
<div class="thanks-card">
    <p class="thanks-text">
        会員登録ありがとうございます
    </p>
    <a href="/"><span class="thanks-button">ログインする</span></a>
</div>
@endsection