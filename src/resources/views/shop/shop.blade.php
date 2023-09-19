@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative.css') }}">
@endsection

@section('main')
<div class="content-inner">
    <h2 class="page-title">店舗情報作成</h2>
    <div class="content-table">
        <form action="/shop/store" method="post">
        @csrf
            <table>
                <tr>
                    <th><label for="name">店名</label></th>
                    <td><input type="text" id="name"></td>
                </tr>
                <tr>
                    <th><label for="image">画像</label></th>
                    <td><input type="file" name="image" id="image" accept="image/jpeg, image/png"></td>
                </tr>
                <tr>
                    <th><label for="area">地域</label></th>
                    <td>
                        <select name="area" id="area">
                            <option value="東京都">東京都</option>
                            <option value="大阪府">大阪府</option>
                            <option value="福岡県">福岡県</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="genre">ジャンル</label></th>
                    <td>
                        <select name="genre" id="genre" class="search-select">
                            <option value="寿司">寿司</option>
                            <option value="焼肉">焼肉</option>
                            <option value="居酒屋">居酒屋</option>
                            <option value="イタリアン">イタリアン</option>
                            <option value="ラーメン">ラーメン</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="description">説明</label></th>
                    <td><textarea name="description" id="description" cols="30" rows="10"></textarea></td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection