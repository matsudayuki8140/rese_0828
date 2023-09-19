<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Rating;
use App\Http\Requests\RatingRequest;

class RatingController extends Controller
{
    public function create($shopId) {
        $shop = Shop::find($shopId);
        return view('rating', compact('shop'));
    }

    public function store(RatingRequest $request) {
        $userId = Auth::id();
        $rating = [
            'user_id' => $userId,
            'shop_id' => $request->shop_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ];
        Rating::create($rating);

        return redirect('/')->with('message', '評価を送信しました');
    }
}
