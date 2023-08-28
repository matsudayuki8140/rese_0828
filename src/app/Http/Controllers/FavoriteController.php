<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function favorite(Request $request) {
        $userId = Auth::id();
        $shopId = $request->shop_id;
        $already = Favorite::where('user_id', $userId)
        ->where('shop_id' $shopId)
        ->first();

        if(!$already) {
            $favorite = [
                'user_id' => $userId,
                'shop_id' => $shopId,
            ];
            Favorite::create($favorite);
        } else {
            Favorite::where('user_id', $userId)
            ->where('shop_id' $shopId)
            ->delete();
        }

        return response()->json(['success' => true]);
    }
}
