@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/representative.css') }}">
<script src="{{ asset('js/imagePreview.js') }}" defer></script>
@endsection

@section('main')
<div class="content-inner">
    <h2 class="page-title">店舗情報作成</h2>
    <div class="content-table">
        <form method="post" enctype="multipart/form-data" @if($user->isHadShop(Auth::id())) action="/shop/update" @else action="/shop/store" @endif>
        @if($user->isHadShop(Auth::id()))
            @method('PATCH')
        @endif
        @csrf
            <table>
                <tr>
                    <th><label for="name">名前</label></th>
                    <td><input type="text" id="name" name="name" @if($user->isHadShop(Auth::id())) value="{{ $shop->name }}" @endif></td>
                </tr>
                <tr>
                    <th><label for="area">地域</label></th>
                    <td>
                        <select name="area" id="area">
                            <option value="東京都" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "東京都") === 0) selected @endif @endif>東京都</option>
                            <option value="大阪府" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "大阪府") === 0) selected @endif @endif>大阪府</option>
                            <option value="福岡県" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "福岡県") === 0) selected @endif @endif>福岡県</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="genre">ジャンル</label></th>
                    <td>
                        <select name="genre" id="genre" class="search-select">
                            <option value="寿司" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "寿司") === 0) selected @endif @endif>寿司</option>
                            <option value="焼肉" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "焼肉") === 0) selected @endif @endif>焼肉</option>
                            <option value="居酒屋" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "居酒屋") === 0) selected @endif @endif>居酒屋</option>
                            <option value="イタリアン" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "イタリアン") === 0) selected @endif @endif>イタリアン</option>
                            <option value="ラーメン" @if($user->isHadShop(Auth::id())) @if(strcmp($shop->area, "ラーメン") === 0) selected @endif @endif>ラーメン</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><label for="description">説明</label></th>
                    <td><textarea name="description" id="description" cols="30" rows="10">@if($user->isHadShop(Auth::id())) {{ $shop->description }} @endif</textarea></td>
                </tr>
                <tr>
                    <th><label for="imageURL">画像</label></th>
                    <td><input type="file" name="imageURL" id="imageURL" accept="image/jpg, image/jpeg, image/png" @if($user->isHadShop(Auth::id())) value="{{ asset('storage/images/' . $shop->imageURL ) }}" @endif></td>
                </tr>
            </table>
            <img alt="画像を選択してください" id="imagePreview" class="image-preview" @if($user->isHadShop(Auth::id())) src="{{ asset('storage/images/' . $shop->imageURL ) }}" @else src="#" @endif>
            @if($user->isHadShop(Auth::id()))
            <input type="hidden" name="shop_id" value="{{ $shop->id }}">
            @endif
            <button class="button">送信</button>
        </form>
    </div>
</div>
@endsection