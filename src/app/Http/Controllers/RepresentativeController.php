<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use App\Models\Representative;

class RepresentativeController extends Controller
{
    public function index() {
        $user = Auth::user();

        if($user->isHadShop($user['id'])) {
            $representative = Representative::find('user_id', $user['id'])
            ->with('shop')
            ->get();
        } else {
            // kari
            $representative = null;
        }

        return view('shop.index', compact('user', 'representative'));
    }

    public function create() {
        return view('shop.shop');
    }
}
