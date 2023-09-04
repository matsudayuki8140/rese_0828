@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('main')
<h2>評価にご協力をお願いします</h2>
<form action="" method="post">
    @csrf
    <input type="text">
</form>
@endsection