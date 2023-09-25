<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index() {
        $shops = Shop::all();
        return view('index', compact('shops'));
    }

    public function detail($shopId) {
        $shop = Shop::find($shopId);
        return view('detail', compact('shop'));
    }

    public function search(Request $request) {
        $shops = Shop::AreaSearch($request->area)
        ->GenreSearch($request->genre)
        ->NameSearch($request->name)
        ->get();
        return view('index', compact('shops'));
    }
}
