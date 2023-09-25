@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative.css') }}">
@endsection

@section('main')
<div class="content-inner">
    <h2 class="page-title">お知らせメール作成</h2>
    <div class="content-table">
        <form method="post" action="/shop/sendMail">
        @csrf
            <table>
                <tr>
                    <th><label for="greet">見出し</label></th>
                    <td><input type="text" id="greet" name="greet"></td>
                </tr>
                <tr>
                    <th><label for="message">本文</label></th>
                    <td><textarea name="message" id="message" cols="30" rows="10"></textarea></td>
                </tr>
            </table>
            <input type="hidden" name="name" value="{{ $representative->shop->name }}">
            <button class="button">送信</button>
        </form>
    </div>
</div>
@endsection